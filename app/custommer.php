<?php

namespace App;


use Illuminate\Notifications\Notifiable; 
use Illuminate\Foundation\Auth\User as Authenticatable;
class custommer extends  Authenticatable
{   use Notifiable;
 
    protected $guard = 'userclient';
    protected $table='custommer';
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
