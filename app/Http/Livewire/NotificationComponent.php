<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{
    protected $listeners = ['refreshNavbar' => '$refresh'];

    public function read($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);
        if($notification) {
            $notification->markAsRead();
        }
        $this->emit('refreshNavbar');
    }

    public function clear()
    {
        $notifications = auth()->user()->notifications()->get();
            foreach($notifications as $notification) {
                $notification->markAsRead();
            }
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Your notification was successfully cleared!', 'success',
            'text' => '',
            ]);
        return redirect()->back();
    }

    public function render()
    {
        $notifications = auth()->user()->unreadNotifications()->take(5)->get();
        $unreadNotifications = auth()->user()->unreadNotifications()->get()->count();

        return view('livewire.notification-component', compact('notifications', 'unreadNotifications'));
    }
}
