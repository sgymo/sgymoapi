<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Length extends Model
{
    protected $primaryKey = 'id';

     protected $fillable = [
        'id', 'gym_id', 'customer_id','date','record_status'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function gym()
    {
        return $this->belongsTo('App\Gym');
    }
}
