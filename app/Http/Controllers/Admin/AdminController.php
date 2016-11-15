<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
//use Intervention\Image\ImageManagerStatic as Image;
use App\Org\Image;

class AdminController extends CommonController      //前台登录注册控制器
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()     //加载管理员列表页
    {
        $db = \DB::table("admin");
        
        //判断并封装搜索条件
        if(!empty($_GET['search'])){
            $db->where( "name" , "like" , "%{$_GET['search']}%" );
            $params['search'] = $_GET['search'];    //维持搜索条件
        }else{
            $params['search'] = "";
        }
        //var_dump($params);
        $list = $db->paginate(5);   //每页5条数据
    	return view( "admin.adminlist" , ['list'=>$list , 'params'=>$params] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   //加载添加管理员页
    {
        return view("admin.addadmin");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)     //执行添加管理员
    {
        $data = ['name'=>$request->name , 'pass'=>md5($request->pass) , 'auth'=>$request->auth , 'nickName'=>$request->nickName];
        //判断是否有上传头像
        if($request->hasFile("photo")){
            //获取上传头像信息
            $file = $request->file("photo");

            //确认上传的头像是否成功
            if($file->isValid()){
                //$picname = $file->getClientOriginalName(); //获取上传头像原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传头像名的后缀名
                $filename = date("YmdHis",time()).rand(1000,9999).".".$ext; //生成随机头像文件名
                
                //执行移动上传头像
                $file->move("./uploads/photos/admin/",$filename);
                //头像缩放
                $img = new Image();
                $img->open("./uploads/photos/admin/".$filename)->thumb(200,200)->save("./uploads/photos/admin/".$filename);
                $data['photo'] = 'uploads/photos/admin/'.$filename;
            }
        }else{
            $data['photo'] = 'uploads/photos/admin/default.png';
        }
        
        //将数据写入数据库
        $m = \DB::table("admin")->insertGetId($data);
        if($m > 0){
            return redirect('admin/admin/create')->with("addAdmin","添加成功");
        }else{
            return redirect("admin.addadmin")->with("addAdmin","添加失败");
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)       //加载修改管理员信息页
    {
        $list = \DB::table('admin')->where('id', '=', $id)->first();
        //var_dump($list);die;
        return view("admin.editadmin",['list'=>$list]);
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
    public function update(Request $request, $id)   //执行管理员信息修改
    {
        //
        //echo "aaaaaaaa";die;
        $data = ['name'=>$request->name , 'auth'=>$request->auth , 'nickName'=>$request->nickName];
        
        //判断是否有填写新密码
        if($request->pass){
            $data['pass'] = md5($request->pass);
        }
        
        //判断是否有上传头像
        if($request->hasFile("photo")){
            //获取上传头像信息
            $file = $request->file("photo");

            //确认上传的头像是否成功
            if($file->isValid()){
                $ext = $file->getClientOriginalExtension(); //获取上传头像名的后缀名
                $filename = date("YmdHis",time()).rand(1000,9999).".".$ext; //生成随机头像文件名
                
                //执行移动上传头像
                $file->move("./uploads/photos/admin/",$filename);
                //头像缩放
                $img = new Image();
                $img->open("./uploads/photos/admin/".$filename)->thumb(200,200)->save("./uploads/photos/admin/".$filename);
                $data['photo'] = 'uploads/photos/admin/'.$filename;
                //若不是默认头像,则删除原头像
                $photo = \DB::table('admin')->where('id',$id)->value('photo');
            }
        }
        //更改数据到数据库
        $m = \DB::table('admin')->where('id', $id)->update($data);
        if($m > 0){
            if($photo != 'uploads/photos/admin/default.png'){
                unlink($photo);
            }
            return redirect('admin/admin/');
        }else{
            return redirect('admin/admin/');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)        //执行删除管理员
    {
        $photo = \DB::table('admin')->where('id',$id)->value("photo");
        unlink($photo);
        \DB::table('admin')->delete($id);
        return redirect("admin/admin")->with("delAdmin","删除成功");
    }
}
