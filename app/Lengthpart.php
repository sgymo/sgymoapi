<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lengthpart extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'gym_id', 'length_id','customer_id','part_id','unit_id','value','date'
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
