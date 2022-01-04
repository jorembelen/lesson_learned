<?php

namespace App\Traits;

use App\Models\Lesson;
use Intervention\Image\Facades\Image;


trait LessonLearnTraits {

    public function addLessonLearn($request)
    {
        $data = $request->validated();

        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){

                    // for saving original image
                $ImageUpload = Image::make($file);
                $originalPath = 'uploads/images/';
                $name = $file->hashName();
                $ImageUpload->save($originalPath .$name);

                // for saving thumnail image
                $thumbnailPath = 'uploads/thumbnails/';
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

        Lesson::create($data);


    }

}


