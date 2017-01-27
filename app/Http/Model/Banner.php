<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $table='banners';
    protected $guarded=['_token'];
}
