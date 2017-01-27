<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\Article;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct()
    {
        $navs=Category::where('parent_id',0)->get();
//        dd($navs);
        $new=Article::orderBy('updated_at','desc')->take(5)->get();
//        dd($new);
        View::share('navs',$navs);
        View::share('new',$new);
    }
}
