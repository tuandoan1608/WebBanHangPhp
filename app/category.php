<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
class category extends Model
{
    use Notifiable;
    protected $fillable = [
        'id','name', 'link','parentID', 'status',
    ];
    public function categorychilrent(){
        return $this->hasMany(category::class,'parentID')->where('status',1);
    }

    public function querycategoryactive($query)
    {
        return $query->where('status',1);
    }
    public function productstatus(){
        return $this->hasMany(product::class,'categoryID','id');
    }
}
