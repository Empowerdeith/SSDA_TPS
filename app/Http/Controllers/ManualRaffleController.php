<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManualRaffleController extends Controller
{
    public function show(){
        return view('raffle.Manual_raffle');
    }
}
