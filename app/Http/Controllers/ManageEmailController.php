<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageEmailController extends Controller
{
    public function show(){
        return view('add_emails.add_email');
    }
}
