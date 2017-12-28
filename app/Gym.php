<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{

	protected $primary = 'id';

    protected $fillable = [
        'id', 'name', 'price',
    ];
    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function users()
    {
    	return $this->hasMany('App\Customer');
    }

    public function users()
    {
    	return $this->hasMany('App\Length');
    }
}
