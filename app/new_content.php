<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class new_content extends Model
{
    protected $table='news_content';
    protected $fillable=['name','content','slug','new_id','image','descript'];
}
