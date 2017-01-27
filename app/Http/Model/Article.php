<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
//use App\Http\Model\Category;

class Article extends Model
{
    //
    protected $guarded=['_token'];

    public function category()
    {
        return $this->belongsTo('App\Http\Model\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Http\Model\Image');
    }

    public function relations()
    {
//        $article = Article::find(1);
//        $article=$this->find(3)->category()->with('name');
//        $article=$this->with('category')->get();
        $article=$this->with('category')->find(3);
//        echo $article;
//        $article=$article->toArray();
//        $article=$article['category']['name'];
        $article=$article->category->name;
        dd( $article);
    }
}

