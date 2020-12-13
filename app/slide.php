<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
   protected $fillable=[
       'image','title','status','descript'
   ];
}
