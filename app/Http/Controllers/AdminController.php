<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\ProjectLocation;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function createUser()
    {
        $location = ProjectLocation::latest()->get();

        return view('users.create', compact('location'));
    }

    public function addUser(UserStoreRequest $request)
    {
        User::create($request->all());
        Alert::success('Success', $request->name .' was  successfully added!');

        return redirect()->route('users.list');

        return view('users.create', compact('location'));
    }

    public function editUser(User $user)
    {
        $location = ProjectLocation::latest()->get();

        return view('users.edit', compact('user', 'location'));
    }

    public function updateUser(User $user, UserUpdateRequest $request)
    {
        if(trim($request->password) == '') {
            $data = $request->except('password');

        }else{

         $data['password'] = bcrypt($request->password);

        }

        $user->update($data);
        Alert::success('Success', $user->name .' was  successfully updated!');

        return redirect()->route('users.list');
    }
    public function deleteUser(User $user)
    {
        return $user->lesson();
        // if($user->)
        $user->delete();
        Alert::success('Success', $user->name .' was  successfully deleted!');

        return redirect()->back();
    }


}
