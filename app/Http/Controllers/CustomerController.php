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
}
