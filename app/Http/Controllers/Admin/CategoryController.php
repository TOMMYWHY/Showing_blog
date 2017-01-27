<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
//use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{

    public function change_order(Request $request)
    {
//        $input=$request->all();
//        $category=Category::find($input['id']);
        $category=Category::find($request->id);
        $category->order_by=$request->order;
        $re=$category->update();
        if($re){
            $data=['status'=>1,'msg'=>'更新成功！'];
        }else{
            $data=['status'=>0,'msg'=>'更新失败！'];
        }
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=new Category();
        $data=$categories->show_all_categories();
//        dd($data);
        return view('admin.category.index')->with('data',$data);
    }
        /*
    public function getTree($data,$id='id',$parent_id='parent_id',$name='name')
    {
        $arr=array();
        foreach($data as $key=>$value){
            if($value->$parent_id==0){
                $arr[]=$data[$key];
                foreach ($data as $k=>$v){
                    if($v->$parent_id==$value->$id){
                        $data[$k][$name]='└─  '.$data[$k][$name];
                        $arr[]=$data[$k];
                    }
                }
            }
        }
        return $arr;
    }
        */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories=Category::where('parent_id','=',0)->get();
        return view('admin/category/add',compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->except('_token');
        $rules=['name'=>'required'];
        $message=['name.required'=>'分类名称不能为空！'];
        $validator=validator($input,$rules,$message);
        if($validator->fails()){
            return redirect()->route('admin.category.create')
                ->withErrors($validator)
                ->withInput();
        }else{
//            if($request->parent_id!=0){ $level=2;}else{$level=1;};
            ($request->parent_id!=0)?$level=2:$level=1;
            $re=Category::create([
                'parent_id'=>$request->parent_id,
                'name'=>$request->name,
                'title'=>$request->title,
                'level'=>$level,
                'keywords'=>$request->keywords,
                'desc'=>$request->desc,
                'order_by'=>$request->order_by,
            ]);
            if($re){
                return redirect()->route('admin.category.index');
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
        $category=Category::findOrFail($id);
        $parent_categories=Category::where('parent_id','=',0)->get();
        return view('admin.category.edit',compact('category','parent_categories'));
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
            $input=$request->except('_token','_method');
//            dd($input);
        $re=Category::where('id','=',$id)->update($input);
        $re=Category::findOrFail($id)->update($input);
        if ($re){
            return redirect()->route('admin.category.index');
        }else{
            return back()->with('errors','分类更新失败！');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $re=Category::findOrFail($id)->delete();
        Category::where('parent_id','=',$id)->update([
            'parent_id'=>0
        ]);
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
