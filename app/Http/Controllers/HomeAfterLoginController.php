<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAfterLoginController extends Controller
{
    public function index(){
        return view('homeafterlogin',[
            'title' => 'Home'
        ]);
    }
}
