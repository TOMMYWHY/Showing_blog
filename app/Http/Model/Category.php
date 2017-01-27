<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $guarded=['_token'];

    public function user()
    {
        return $this->belongsTo('App\Http\Model\User');
    }

    public function articles()
    {
        return $this->hasMany('App\Http\Model\Article');
    }

    public function images()
    {
        return $this->hasManyThrough('App\Http\Model\Article', 'App\Http\Model\Image');
        
    }
    
    public function show_all_categories()
    {
        $categories=$this->orderBy('order_by','asc')->get();
        $data=$this->get_cate_tree($categories,'id','parent_id','name','level');
        return $data;
    }

    public function get_cate_tree($data,$id='id',$parent_id='parent_id',$name='name',$level='level')
    {
        $arr=array();
        /*
         *

        foreach ($data as $key=>$value){
            if($value->$level==1){
//                echo $value->name;
                $arr[]=$data[$key];
                foreach ($data as $k=>$v){
                    if($value->$level==$v->parent_id){
                        $data[$k][$name]='└─>  '.$data[$k][$name];
                        $arr[]=$data[$k];
                    }
                }
            }
        }
        */

        foreach($data as $key=>$value){
            if($value->$parent_id==0){
//                echo $value->name;
                $arr[]=$data[$key];
                foreach ($data as $k=>$v){
                    if($v->$parent_id==$value->$id){
                        $data[$k][$name]='└─>  '.$data[$k][$name];
                        $arr[]=$data[$k];
                    }
                }
            }
        }

        return $arr;
    }
}
