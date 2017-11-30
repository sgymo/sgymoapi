<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gym;
use DB;

class UserController extends Controller
{

	public function index() {
		$users = User::all()->toArray();
		return response()->json($users);
	}

    public function show($id){
    	return User::find($id);
    }  

    public function store(Request $request){
        
        if($request->get('gymName')){

            $id = rand();

            DB::table('gyms')->insertGetId(
                array(
                    'Name' => $request->get('gymName'),
                    'Code' => $id,
                    'Price' => 50000
                    )
            );

        } else {
            return response()->json(['Bad request'], 400);
        }

        if($request->get('name')) {

            $user = new User;
            $user->Name = $request->get('name');
            $user->Phone = $request->get('phone');
            $user->Address = $request->get('address');
            $user->Email = $request->get('email');
            $user->Password = $request->get('password');
            $user->Code = rand();
            $user->GymCode = $id;
            $user->save();

            return response()->json([''], 204);
        } else {
            badRequest();
        }
    	//User::create($request->all());
    }  

    public function badRequest(){
        return response()->json(['Bad request'], 400);
    }
}
