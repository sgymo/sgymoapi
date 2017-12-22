<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Gym;
use DB;
use Validator;


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
        
        $valid = Validator::make($request->all(),[
        		'gymName' =>'required',
        		'name' => 'required',
	    		'email' => 'required',
	    		'password' => 'required',
	    		'phone' => 'required',
	    	]);
        if ($valid->fails()) {
    		return response()->json([
    			"code" => 400,
    			"error" => "badRequest",
    		],400);
    		exit();
	    }

        if($request->get('gymName')){

            // $id = rand();
			$id = DB::table('gyms')->insertGetId(
                array(
                      'name' => $request->get('gymName'),
                    'price' => 0
                )
            );

        } else {
            return response()->json(['Bad requet'], 400);
        }

        if($request->get('name')) {

            $user = new User;
            $user->name = $request->get('name');
            $user->phone = $request->get('phone');
            $user->address = $request->get('address');
            $user->email = $request->get('email');
            $user->password = ($request->get('password'));
            // $user->id = rand();
            $user->gym_id = $id;
            $user->save();

            return response()->json([
            	'code' => '201',
            	'response' => 'Create',
            ], 201);
        } else {
            badRequest();
        }
    	//User::create($request->all());
    }  
    public function login(Request $request)
    {	

    	$valid = Validator::make($request->all(),[
    		'email' => 'required',
    		'password' => 'required',
    	]);

    	if ($valid->fails()) {
    		return response()->json([
    			"code" => 400,
    			"error" => "badRequest",
    		],400);
    	}else{	
	    	if (Auth::attempt(["email" => $request->email, 'password' => $request->password])) {
	    		$user = Auth::user();
	    		$gym = $user->gym;
				return Response()->json( [$user],200
	            );
	        } else{
	        	return response()->json([
	        		"code" => 401,
	        		"error" => "Email or password incorrect",
	        ], 401);
	        }
	    }	    
    }
}
