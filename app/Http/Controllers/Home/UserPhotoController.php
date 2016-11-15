<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Org\Image;

class UserPhotoController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("home.userPhoto");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //判断是否有上传头像
        if($request->hasFile("userphoto")){
            //获取上传头像信息
            $file = $request->file("userphoto");

            //确认上传的头像是否成功
            if($file->isValid()){
                $ext = $file->getClientOriginalExtension(); //获取上传头像名的后缀名
                $filename = date("YmdHis",time()).rand(1000,9999).".".$ext; //生成随机头像文件名
                
                //执行移动上传头像
                $file->move("./uploads/photos/home/",$filename);
                //头像缩放
                $img = new Image();
                $img->open("./uploads/photos/home/".$filename)->thumb(200,200)->save("./uploads/photos/home/".$filename);
                $data['photo'] = 'uploads/photos/home/'.$filename;
                //dd($data);
                //若不是默认头像,则删除原头像
                $photo = \DB::table('userdetail')->where('uid',$uid)->value('photo');
                
                //更改数据到数据库
                $m = \DB::table('userdetail')->where('uid', $uid)->update($data);
                if($m > 0){
                    if($photo != 'uploads/photos/home/default.png'){
                        unlink($photo);
                    }
                    $request->session()->pull('key', 'photo');
                    $request->session()->put('key', '$photo');
                    return redirect('home/userInfo/')->with("userphoto","头像修改成功");
                }else{
                    return redirect('home/userInfo/')->with("userphoto","头像修改失败");
                }
            }
        }else{
            return redirect('home/userPhoto/')->with("userphoto","您没有选择上传头像");
        }
        
    }
}
