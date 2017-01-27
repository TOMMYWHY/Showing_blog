<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\banner;
use Illuminate\Http\Request;

use App\Http\Requests;

class BannerController extends CommonController
{
    //ajax 刷新order 有问题
    public function change_banner_order(Request $request)
    {
        $input=$request->all();
//        dd($input);
        $banner=banner::findOrFail($input->id);
        $banner->order_by=$input->order;
        $re=$banner->update();
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
        $data=Banner::orderBy('order_by','asc')->get();
        return view('admin.banner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $data=[];
        return view('admin.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $re=Banner::create([
            'name'=>$request->name,
            'order_by'=>$request->order_by,
            'url'=>$request->url,
        ]);
//        dd($re);
        if($re){
            return redirect()->route('admin.banner.index');
        }else{
            return back()->with('errors','添加数据错误！');
        }




        /*
         *

        $input=$request->except('_token');
        $rules=['name'=>'required','url'=>'required'];
        $message=[
            'name.required'=>'链接名称不能为空！',
            'url.required'=>'链接内容不能为空！',
        ];
        $validator=validator($input,$rules,$message);
        if($validator->fails()){
            return redirect()->route('admin.Banner.create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $re=Banner::create($input);
            if($re){
                return redirect()->route('admin.banner.index');
            }else{
                return back()->with('errors','添加数据错误！');
            }
        }
         */
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
        $field=Banner::find($id);
        return view('admin.banner.edit',compact('field'));
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
        $re=Banner::where('id','=',$id)->update($input);
//        $re=Article::where('id','=',$id)->update($input);
        if ($re){
            return redirect()->route('admin.banner.index');
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
        $re=Banner::where('id','=',$id)->delete();
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
