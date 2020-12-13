<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class permission extends Model
{
    protected $fillable=[];
    protected $table='permission';
    public  function permissionParent()
    {
        return $this->hasMany(permission::class,'parentID');
    }
}
