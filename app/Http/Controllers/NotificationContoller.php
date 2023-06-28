<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationContoller extends Controller
{
    
    public function index(){

    return view('front.notifications.index');
    }
    
}

