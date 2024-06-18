<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function profileEdit(){
         $auth_user = Auth::user();
         return view('user.profile',compact('auth_user'));
    }
    public function profileUpdate(Request $request){
        
    }
}
