<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class menu extends Model
{
    use Notifiable;
    protected $fillable = [
        'id','name', 'link','parentID', 'status',
    ];
}
