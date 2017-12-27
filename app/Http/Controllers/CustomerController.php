<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gym;
use App\Customer;
use DB;
use Validator;

class CustomerController extends Controller
{
   public function index($gym)
   {
   	$customers = Customer::where('gym_id',$gym)->get();
return response()->json($customers);
   }

   public function show($gym, $customer)
   {
   	$customers = Customer::where('gym_id',$gym)->where('id',$customer)->get();
return response()->json($customers);
   }

   public function store(Request $request, $gym)
   {
       $valid = Validator::make($request->all(),[
           'name1' => 'required',
           'last_name1' => 'required',
           'born' => 'required',
           'address' => 'required',
           'gender' => 'required',
           'email' => 'required',
           'phone' => 'required',
           ]);
       if ($valid->fails()) {
           return response()->json([
               "code" => 400,
               "error" => "badRequest",
           ],400);
           exit();
       }
       $customers = Customer::where('gym_id',$gym)->orderBy('id','desc')->first();
       if (count($customers)==0)
           $NextId = 1;
       else
           $NextId =($customers->id) + 1;

       $customer = new Customer;
       $customer->id = $NextId;
       $customer->gym_id = $gym;
       $customer->card_id = $request->get('card_id');
       $customer->finger = $request->get('finger');
       $customer->name1 = $request->get('name1');
       $customer->name2 = $request->get('name2');
       $customer->last_name1 = $request->get('last_name1');
       $customer->last_name2 = $request->get('last_name2');
       $customer->born = $request->get('born');
       $customer->address = $request->get('address');
       $customer->gender = $request->get('gender');
       $customer->email = $request->get('email');
       $customer->phone = $request->get('phone');
       $customer->user_login = $request->get('user_login');
       // $customer->id = rand();
       // $customer->gym_id = $id;
       $customer->save();

       return response()->json([
           'code' => '201',
           'response' => 'Create',
       ], 201);

       //customer::create($request->all());
   }

  public function update($gym, $customer, Request $request)
   {
      $valid = Validator::make($request->all(),[
           'name1' => 'required',
           'last_name1' => 'required',
           'born' => 'required',
           'address' => 'required',
           'gender' => 'required',
           'email' => 'required',
           'phone' => 'required',
           ]);
       if ($valid->fails()) {
           return response()->json([
               "code" => 400,
               "error" => "badRequest",
           ],400);
           exit();
       }
       

       $customer = Customer::where('gym_id',$gym)->where('id',$customer)->get();
       // $customer->gym_id = $gym;
       $customer->card_id = $request->get('card_id');
       $customer->finger = $request->get('finger');
       $customer->name1 = $request->get('name1');
       $customer->name2 = $request->get('name2');
       $customer->last_name1 = $request->get('last_name1');
       $customer->last_name2 = $request->get('last_name2');
       $customer->born = $request->get('born');
       $customer->address = $request->get('address');
       $customer->gender = $request->get('gender');
       $customer->email = $request->get('email');
       $customer->phone = $request->get('phone');
       $customer->user_login = $request->get('user_login');
       // $customer->id = rand();
       // $customer->gym_id = $id;
       $customer->save();

       return response()->json([
           'code' => '201',
           'response' => 'Create',
       ], 201);
   } 

}