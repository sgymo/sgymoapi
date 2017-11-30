<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{

	protected $primary = 'Code';
    
    protected $fillable = [
        'Code', 'Name', 'Price',
    ];

}
