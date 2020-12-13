<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name','price','brand', 'metatitle','categoryID','code', 'image','detail','discount','decription','keyword','promotionPrice'
    ];

    public function productImgag(){
        return $this->hasMany(productImgage::class,'productID','id');
    }
    public function productstatus(){
        return $this->hasMany(category::class,'id','categoryID')->where('status',1);
    }
}
