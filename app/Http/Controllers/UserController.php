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

            // $id = rand();
			$id = DB::table('gyms')->insertGetId(
                array(
                      'name' => $request->get('gymName'),
                    'price' => 0
                )
            );

        } else {
            return response()->json(['Bad request'], 400);
        }

        if($request->get('name')) {

            $user = new User;
            $user->name = $request->get('name');
            $user->phone = $request->get('phone');
            $user->address = $request->get('address');
            $user->email = $request->get('email');
            $user->password = $request->get('password');
            // $user->id = rand();
            $user->gym_id = $id;
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

    public function enter(Request $request)
    {	
    	// $users = new User;
    	$mail= $request->email;
    	// $data = $users::where('Name1','jhonathan');
    	$users= User::where('Name1','jhonathan')->get();

		return response()->json($users);

		// return $mail;
    }
}
