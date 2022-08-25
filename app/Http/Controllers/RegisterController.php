<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests\RegisterRequest;
use APP\Models\User;
class RegisterController extends Controller
{
    //
    public function show(){
        return view('auth.register');
    }
    public function register(RegisterRequest $request){
        $user = User::create($request->validated());


    }
}
