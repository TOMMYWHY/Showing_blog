<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table='images';

    public function article()
    {
        return $this->belongsTo('App\Http\Model\Article');
    }
}
