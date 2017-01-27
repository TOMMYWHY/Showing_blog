<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;

class ArticleController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Article::with('category')->orderBy('id','desc')->paginate(4);
//        dd($data);
        return view('admin.article.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=new Category();
        $categories=$categories->show_all_categories();
        return view('admin.article.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $file=$request->file();
//        dd($file);
        $input=$request->except('_token');
//        dd($input);

        $rules=['name'=>'required','text_content'=>'required'];
        $message=[
            'name.required'=>'文章名称不能为空！',
            'text_content.required'=>'文章内容不能为空！',
        ];
        $validator=validator($input,$rules,$message);
        if($validator->fails()){
            return redirect()->route('admin.article.create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $re=Article::create([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'editor'=>$request->editor,
                'kewords'=>$request->kewords,
                'editor'=>$request->editor,
                'desc'=>$request->desc,
                'content'=>$request->text_content,
                'thumb'=>$request->thumb,
            ]);

            if($re){
                return redirect()->route('admin.article.index');
            }else{
                return back()->with('errors','添加数据错误！');
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $field=Article::find($id);
        $categories=new Category();
        $data=$categories->show_all_categories();
        return view('admin.article.edit',compact('data','field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $input= $request->except('_token', '_method');

        $re=Article::where('id','=',$id)->update($input);
        if ($re){
            return redirect()->route('admin.article.index');
        }else{
            return back()->with('errors','分类更新失败！');
        }


//        dd($input);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $re=Article::where('id','=',$id)->delete();
        if($re){
            $data=[
                'status'=>1,
                'msg'=>'删除成功！'
            ];
        }else{
            $data=[
                'status'=>0,
                'msg'=>'删除失败！'
            ];
        }
        return $data;
    }
}
