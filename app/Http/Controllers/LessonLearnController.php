<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LessonLearnNotification;

class LessonLearnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(in_array(auth()->user()->role, [0,1])){
            $projId = auth()->user()->project_location_id;
            $lessons = Lesson::with('location')->whereproject_location_id($projId)->latest()->get();
        }else{
            $lessons = Lesson::with('location')->latest()->get();
        }

        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role != 0){
            Alert::error('Failed', 'Your account is not allowed for this transaction!');
            return redirect()->back();
        }
        return view('lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lesson = new Lesson();

        DB::beginTransaction();
        if($lesson) {
            $lesson->addLessonLearn($request);

            DB::commit();
            Alert::success('Success', 'Data was added successfully!');

        }else{
            DB::rollBack();
            Alert::error('Failed', 'Please check your data and try again!');
            return redirect()->back();
        }

        return redirect()->route('lessons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $lesson = Lesson::findOrFail($id);
        if(in_array(auth()->user()->role, [0,1])){
           if(auth()->user()->project_location_id != $lesson->project_location_id){
            Alert::error('Failed', 'Your are not allowed to view this page!');
            return redirect()->route('lessons.index');
           }
        }
        $images = explode('|', $lesson->images);

        return view('lessons.view', compact('lesson',  'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        if(auth()->user()->project_location_id != $lesson->project_location_id){
            Alert::error('Failed', 'Your are not allowed to update this data!');
            return redirect()->back();
           }
        $lesson->update($request->all());
        Alert::success('Success', 'Data was successfully updated!');

        return redirect()->route('lessons.index');
    }

    public function approve(Request $request, Lesson $lesson)
    {
        if(auth()->user()->project_location_id != $lesson->project_location_id || auth()->user()->role != 1){
            Alert::error('Failed', 'Your are not allowed to approve this data!');
            return redirect()->back();
           }
        $lesson->update([
            'status' => $request->status,
            'comments' => $request->comments,
        ]);

        $email = User::find($lesson->user_id);
        $admin = User::whererole(5)->get();
        $url = route('lessons.show', $lesson->id);
        $details = [
            'title' => 'Lesson Learned Status Updated',
            'url' => $url,
            'data' => 'Click here to view information.',
            ];
        Notification::send($email, new LessonLearnNotification($details));
        Notification::send($admin, new LessonLearnNotification($details));

        Alert::success('Success', 'Status was successfully updated!');

        return redirect()->route('lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        if($lesson->status == 1) {
            Alert::error('Failed', 'This data cannot be deleted!');
            return redirect()->back();
        }else{
            // Delete old image from file
            if($lesson->attachment) {
                $docPath = public_path('uploads/documents/');
                \File::delete( $docPath .$lesson->attachment);
            }

            $photos1 = explode('|', $lesson->images);

            if($lesson->images) {
                foreach($photos1 as $img){
                    $path1 = public_path('uploads/images/');
                    $path2 = public_path('uploads/thumbnails/');
                    \File::delete($path1 .$img);
                    \File::delete($path2 .$img);
                }
            }
            $lesson->delete();
            Alert::success('Success', 'Data was successfully deleted!');
        }
        return redirect()->back();
    }
}
