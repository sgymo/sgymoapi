<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;


     protected $fillable = [
        'id', 'gym_id', 'card_id','finger','name1','name2','last_name1','last_name2', 'born','address','gender','email','phone'
    ];

    public function length()
    {
    	return $this->hasMany('App\Length');
    }}
