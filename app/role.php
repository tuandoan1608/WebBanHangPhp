<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table='roles';
    protected $fillable=['name','display_name'];
    public function permissions(){
        return $this->belongsToMany(permission::class,'permission_role','role_id','permission_id');
    }
}
