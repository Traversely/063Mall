<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class GtypeController extends Controller
{
    /**
     * 加载查看类别页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据并按照 path 排序，同时实现搜索分页
        if(!isset($_GET['search'])){
            $_GET['search'] = '';
        }
        $params['search'] = $_GET['search'];

        $list = DB::table("type")
                ->where('type','like',"%{$_GET['search']}%")
                ->orderBy('path','asc')
                ->paginate(8);
        foreach ($list as $k => $v) {
            $goodNum = DB::table('good')
                    ->where('type1',$v->id)
                    ->orwhere('type2',$v->id)
                    ->orwhere('type3',$v->id)
                    ->count();
            $v->goodNum = $goodNum;
        }
        return view('admin.gtype',['list'=>$list,'params'=>$params]);
    }

    /**
     * 处理 Ajax 请求
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax($id)
    {
        //
        $list = DB::table('type')->where('pid',$id)->get();
        if($list){
            echo '该分类下包含分类，不允许删除！';
            return;
        }

        //查询数据并按照 path 排序，同时实现分页
        $list1 = DB::table("good")->where('type1',$id)->get();
        $list2 = DB::table("good")->where('type2',$id)->get();
        $list3 = DB::table("good")->where('type3',$id)->get();
        if($list1 or $list2 or $list3){
            echo '该分类下包含商品，不允许删除！';
            return;
        }
    }

    /**
     * 加载添加根类别表单页
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gtypeCreate');
    }

    /**
     * 执行添加根类别
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data['type'] = $request->type; 
        if(isset($request->target)){
            $data['target'] = $request->target;
        }else{
            $data['target'] = mb_substr($request->type, 0, 2, 'utf-8');
        }
        
        $data['level'] = 0;
        $data['display'] = 0;

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
            }
        }else{
            $data['logo'] = 'uploads/section/default.webp';
        }

        $m = DB::table('type')->insertGetId($data);
        if($m > 0){
            $data['path'] = '0-'.$m;
            $n = DB::table('type')->where('id',$m)->update($data); 
            if( $n >0 ){
                return redirect('admin/gtype')->with('msg','添加成功！');
            }else{
                return redirect('admin/gtype')->with('msg','添加类别路径失败！');
            }
        }else{
            return back()->with('msg','添加失败！');
        }
    }

    /**
     * 执行添加子类别
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeChild(Request $request)
    {
        //
        $data['type'] = $request->type;
        $data['pid'] = $request->pid;
        $m = DB::table('type')->insertGetId($data);
        if($m > 0){
            $ftype = DB::table('type')->where('id',$request->pid)->first();
            $data['path'] = $ftype->path."-".$m;
            if($ftype->pid == 0){
                $data['level'] = 1;
            }else{
                $data['level'] = 2;
            }
            $n = DB::table('type')->where('id',$m)->update($data);
            if( $n >0 ){
                return back();
            }else{
                return back()->with('msg','修改路径失败！');
            }
        }else{
            return back()->with('msg','添加失败！');
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
        //
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
        $data['type'] = $request->type;
        $m = DB::table('type')->where('id',$id)->update($data);
        if($m > 0){
            return back();
        }else{
            return back()->with('msg','修改失败！');
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
        //
        $m = DB::table('type')->delete($id);
        if($m > 0){
            return back();
        }else{
            return back()->with('msg','删除失败！');
        }
    }
}
