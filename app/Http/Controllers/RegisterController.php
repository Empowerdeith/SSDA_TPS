<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }
    public function testing(){
        //$seleccionado = filter_input(INPUT_POST, 'opciones', FILTER_SANITIZE_STRING);
        /*$option = $_POST['opciones'];
        return $option;*/
        if(!empty($_POST['opciones'])) {
            $option = $_POST['opciones'];
            return $option;
        }
    }
    public function register(RegisterRequest $request){
        $user = User::create($request->validated())->assignRole($this->testing());
        //$user = User::create($request->validated())->assignRole('Admin');
        return redirect('/register');
    }
}
