<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
   protected $fillable=[
       'name','value','status','type'
   ];
}
