<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request){
    	$email = $request['email'];
    	$email = $request['password'];
    	if(Auth::attempt(['email' => $email, 'password' => $password])){
    		return ['response' => 'success'];
    	} else {
    		return ['response' => 'failed'];
    	}
    }
}
