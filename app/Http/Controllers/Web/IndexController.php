<?php

namespace App\Http\Controllers\Web;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Link;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{
    public function index()
    {
        $hot=Article::orderBy('count_views','desc')->take(6)->get();
        $data=Article::orderBy('updated_at','desc')->paginate(4);

        $link=Link::orderBy('order_by','asc')->get();
//            dd($new);
        return view('web.index',compact('hot','data','new','link'));
    }
    public function category($id)
    {
        $field=Category::find($id);
        $data=Article::where('cate_id',$id)->orderBy('updated_at','desc')->paginate(4);
        $submenu=Category::where('parent_id',$id)->get();
        return view('web.categories',compact('field','data','submenu'));
    }
    public function article($id)
    {
        $field=Article::findOrFail($id);
//        dd($field['cate_id']);
        $cate=Category::where('id',$field['cate_id'])->first();
        $article['pre']=Article::where('id','<',$id)
            ->orderBy('id','desc')
            ->first();
        $article['next']=Article::where('id','>',$id)
            ->orderBy('id','asc')
            ->first();
        return view('web.articles',compact('field','cate','article'));
    }
}
