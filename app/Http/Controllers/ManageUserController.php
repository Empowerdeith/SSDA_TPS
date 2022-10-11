<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

class ManageUserController extends Controller
{
    public function showUsers(){

        $users = User::paginate(10);
        return view('manageUsers.showUsers', compact('users'));
    }


    public function updateUserView($id){

        $user = User::findOrFail($id);
        return view('manageUsers.updateUser', compact('user'));
    }

    public function updateUser(UpdateUserRequest $request, $id){

        $user = User::findOrFail($id);

        if ( ! ( $request->name == NULL )){
            $user -> name = $request->name;
        }
        if ( ! ( $request->username == NULL )){
            $user -> username = $request->username;
        }
        if ( ! ( $request->email == NULL )){
            $user -> email = $request->email;
        }
        if ( ! ( $request->password == NULL )){
            $user -> password = $request->password;
        }
        if ( ! ( $request->cargo == NULL )){
            $user -> cargo = $request->cargo;
        }

        $user -> save();

        return redirect()->back()->with('success', 'Usuario Actualizado exitosamente.');
    }

    public function deleteUser($id){

        $user = User::findOrFail($id);
        $user -> delete();
        return redirect('/showUsers');
    }

    public function faq(){
        return view('faq.faq');
    }
}
