<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table='orders';
    protected $fillable = [
        'status','userID','amount', 'lastname', 'firstname', 'email','phone','address','note',
    ];
    public function orderdetail(){
        return $this->hasMany(orderDetail::class,'orderID','id');
    }
    public function userorder(){
        return $this->hasOne(product::class, 'id', 'productID');
    }

    
}
