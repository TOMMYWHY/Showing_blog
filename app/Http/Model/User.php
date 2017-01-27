<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='users';
    protected $primaryKey='id';
//    public $timestamps=false;

    public function categories()
    {
        return $this->hasMany('App\Http\Model\Category');
    }
}
