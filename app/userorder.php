<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userorder extends Model
{
    protected $table='useroder';
    protected $fillable = [
        'lastname', 'firstname', 'email','phone','address','note',
    ];
    
}
