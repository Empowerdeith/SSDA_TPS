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
        

    public function updateUser($id){

        $user = User::findOrFail($id);      
        return view('manageUsers.updateUser', compact('user'));
    }

    public function updateUser2(UpdateUserRequest $request, $id){
        $user = User::findOrFail($id);
        
        $user -> name = $request->name;
        $user -> rut = $request->rut;
        $user -> username = $request->username;
        $user -> email = $request->email;
        $user -> password = $request->password;
        $user -> cargo = $request->cargo;

        $user -> save();

        return redirect()->back()->with('success', 'Usuario Actualizado');

    }

    public function deleteUser(Request $request, $id){

        $request->validate([
            'userID' => 'required',
        ]);

        if($id == $request->userID){
            $user = User::findOrFail($id);
            $user -> delete();
            return redirect('/showUsers');
        }
        return redirect()->back()->with('danger', 'ID incorrecto, usuario no eliminado');
    }
}