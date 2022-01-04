<?php

namespace App\Observers;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LessonLearnNotification;

class LessonLearnedObserver
{
    /**
     * Handle the Lesson "created" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function created(Lesson $lesson)
    {
        $email = User::whereproject_location_id($lesson->project_location_id)->whererole(1)->get();
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

    /**
     * Handle the Lesson "updated" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function updated(Lesson $lesson)
    {
        //
    }

    /**
     * Handle the Lesson "deleted" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function deleted(Lesson $lesson)
    {
        //
    }

    /**
     * Handle the Lesson "restored" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function restored(Lesson $lesson)
    {
        //
    }

    /**
     * Handle the Lesson "force deleted" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function forceDeleted(Lesson $lesson)
    {
        //
    }
}
