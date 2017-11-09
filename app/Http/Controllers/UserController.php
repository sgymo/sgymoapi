<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

	public function index() {
		$users = User::all()->toArray();

		return response()->json($users);
	}

    public function show($id){
    	return User::find($id);
    }    
}
