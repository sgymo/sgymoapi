<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $primaryKey = 'id';
    // protected $table = 'user';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'gym_id', 'Name', 'phone','mmail','address','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
    ];

    public function gym()
    {
        return $this->belongsTo('App\Gym');
    }
}
