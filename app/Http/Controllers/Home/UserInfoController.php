<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserInfoController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取对应用户信息
        $uid = session('homeuser')->id;
        $userInfo = \DB::table("user")
                ->join('userdetail','user.id','=','userdetail.uid')
                ->where("user.id",$uid)
                ->select('user.*','userdetail.nickName','userdetail.sex','userdetail.age','userdetail.photo')
                ->first();
                //dd($userInfo);
        return view("home.userInfo" , ['userInfo'=>$userInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editNick($nick)
    {
        $uid = session('homeuser')->id;
        $m = \DB::table("userdetail")->where("uid" , $uid)->update(['nickName'=>$nick]);
        if($m > 0){
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkPass($pass)
    {
        $id = session('homeuser')->id;
        $m = \DB::table("user")->where("id" , $id)->value("pass");
        if($pass == ""){
            echo 0;
        }
        if($m == md5($pass)){
            echo 1;
        }else{
            echo 0;
        }
       // dd($m);
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
        $m = \DB::table("user")->where("id" , $id)->update(['pass'=>md5($request->userPass)]);
        if($m > 0){
            return redirect("home/userInfo")->with("pass" , "密码修改成功!");
        }else{
            return redirect("home/userInfo")->with("pass" , "密码修改失败!");
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
    }
}
