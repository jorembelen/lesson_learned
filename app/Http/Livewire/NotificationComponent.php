<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{
    protected $listeners = ['refresh' => '$refresh'];

    public function read($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);
        if($notification) {
            $notification->markAsRead();
        }
        $this->emit('refresh');
    }

    public function render()
    {
        $notifications = auth()->user()->unreadNotifications()->take(5)->get();
        $unreadNotifications = auth()->user()->unreadNotifications()->get()->count();

        return view('livewire.notification-component', compact('notifications', 'unreadNotifications'));
    }
}
