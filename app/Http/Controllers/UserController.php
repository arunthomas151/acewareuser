<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function setsession(Request $request){
        Session::put('userid', $request->userid);
    }

    public function userhome(){
        $userid =  Session::get('userid');
        return view('userhome')->with(['userid' => $userid]);
    }
}
