<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use Intervention\Image\ImageManagerStatic as Image;

class SectController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!isset($_GET['search'])){
            $_GET['search'] = '';
        }
        $params['search'] = $_GET['search'];

        $list = DB::table("type")
                ->where('level',0)
                ->where('type','like',"%{$_GET['search']}%")
                ->paginate(5);
        return view('admin.sect',['list'=>$list,'params'=>$params]);
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
        $sect = \DB::table('type')
                ->where('id',$id)
                ->first();
        return view('admin.sectShow',['sect'=>$sect]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display($id)
    {
        //
        $display = DB::table('type')->where('id',$id)->value('display');

        if($display == '1'){
            $data['display'] = 0;
        }else{
            $data['display'] = 1;
        }

        $m = DB::table('type')->where('id',$id)->update($data);
        if($m > 0){
            return back();
        }else{
            return back()->with('msg','修改失败！');
        }
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
        //
        if($request->hasFile('logo')){
            $file = $request->file('logo');

            if($file->isValid()){
                $ext = $file->getClientOriginalExtension();
                do{
                    $filename = time().rand(1000,9999).".".$ext;
                }while(file_exists('./uploads/section/'.$filename));
                $file->move('./uploads/section/',$filename);

                $img = Image::make("./uploads/section/".$filename)->resize(240,390);
                $img->save("./uploads/section/".$filename); 
                $data['logo'] = 'uploads/section/'.$filename;
                $logo = DB::table('type')->where('id',$id)->value('logo');
                if($logo != 'uploads/section/default.webp'){
                    unlink($logo);
                }
            }
        }

        $m = DB::table('type')->where('id',$id)->update($data);
        if($m >= 0){
            return back();
        }else{
            return back()->with('msg','修改失败！');
        }
    }

    /**
     * 加载商品管理页面
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goodShow($id)
    {   
        $sect = DB::table('type')->where('id',$id)->select('id','type')->first();
        $goods = DB::table('good')->where('type1',$id)->select('id','good','onshow as onsale')->get();
        return view('admin.sectGoodShow',['goods'=>$goods,'sect'=>$sect]);
    }

    /**
     * 修改首页展示商品
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function goodAdd($id)
    {   
        $data = $_POST['good'];
        DB::table('good')->where('type1',$id)->update(['onshow'=>0]);

        foreach ($data as $v) {
            $m = DB::table('good')->where('id',$v)->update(['onshow'=>1]);
            if($m <= 0){
                break;
            }
        }
        if($m > 0){
            return back()->with('msg','设置成功！');
        }else{
            return back()->with('msg','设置失败！');
        }
    }
}
