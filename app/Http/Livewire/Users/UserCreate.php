<?php

namespace App\Http\Livewire\Users;

use App\Models\ProjectLocation;
use App\Models\User;
use Livewire\Component;

class UserCreate extends Component
{
    public $name, $email, $role, $project_location_id, $password;

    public function hydrate()
    {
    $this->emit('select2');
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'role' => 'required',
        'project_location_id' => 'required_if:role,0,1',
    ];

    protected $messages = [
        'project_location_id.required_if' => 'Please select project location.',
    ];

    public function submit()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'project_location_id' => $this->project_location_id,
        ]);
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Data was successfully submitted!',
            'text' => '',
            ]);
            return redirect()->route('users.list');
    }

    public function render()
    {
        $location = ProjectLocation::latest()->get();

        return view('livewire.users.user-create', compact('location'))->extends('layouts.master');
    }
}
