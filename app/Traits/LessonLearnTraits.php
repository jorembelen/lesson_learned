<?php

namespace App\Traits;

use App\Models\Lesson;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LessonLearnNotification;

trait LessonLearnTraits {

    public function addLessonLearn($request)
    {
        $data = $request->all();

        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){

                    // for saving original image
                $ImageUpload = Image::make($file);
                $originalPath = public_path('uploads/images/');
                $name = $file->hashName();
                $ImageUpload->save($originalPath .$name);

                // for saving thumnail image
                $thumbnailPath = public_path('uploads/thumbnails/');
                $ImageUpload->resize(300,200);
                $ImageUpload = $ImageUpload->save($thumbnailPath .$name);

                // for saving to database
                $images[]=$name;
                $data['images'] = implode("|",$images);
            }
        }
        if($request->hasfile('attachment')){
            $doc = $request->file('attachment');

            // get the name of the image
            $docName = $doc->hashName();
            $doc->move('uploads/documents',$docName);
            $data['attachment'] = $docName;
        }

        $lesson = Lesson::create($data);

        $email = User::whereproject_location_id($request->project_location_id)->whererole(1)->get();
        $admin = User::whererole(5)->get();
        $url = route('lessons.show', $lesson->id);
        $details = [
            'title' => 'New Lesson Learned Submitted',
            'url' => $url,
            'data' => 'Click here to view information.',
            ];
        Notification::send($email, new LessonLearnNotification($details));
        Notification::send($admin, new LessonLearnNotification($details));


    }

}


