<?php

namespace App\Http\Livewire\Users;

use App\Models\ProjectLocation;
use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    protected $listeners = ['remove'];

    public function confirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this file!',
            'id' => $id
            ]);
    }

    public function remove($userId)
    {
        $user = User::find($userId);

        if($user->lesson()->count() > 0 || $user->id == auth()->id()) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'message' => 'Failed',
                'text' => $user->name .' cannot be deleted!'
            ]);
            return redirect()->back();
        }else{
            $user->delete();
            $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'success',
                    'message' => 'Success',
                    'text' => $user->name .' was Deleted Successfully!'
                ]);
                return redirect()->back();
        }
    }

    public function render()
    {
        $users = User::latest()->get();
        $location = ProjectLocation::latest()->get();

        return view('livewire.users.user-list', compact('users', 'location'))->extends('layouts.master');
    }
}
