<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddEmailRequest;
use App\Models\Recipients;
use Redirect;

class ManageEmailController extends Controller
{
    public function show(){
        $recipients = Recipients::paginate(10);
        return view('add_emails.add_email', compact('recipients'));
    }

    public function add_email(AddEmailRequest $request){

        $input = $request->all();
        Recipients::create($input);

        return Redirect::route('recipients.showEmail')->with(['success' => 'Se ha añadido el ql']);
    }
}
