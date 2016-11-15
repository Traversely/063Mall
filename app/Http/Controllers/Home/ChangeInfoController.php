<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChangeInfoController extends Controller
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
        return view("home.changeInfo" , ['userInfo'=>$userInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $uid)
    {
        $data = ["sex"=>$request->sex , "age"=>$request->age];
        //dd($data);
        $m = \DB::table("userdetail")->where("uid" , $uid)->update($data);
        if($m > 0){
            return back()->with("info" , "修改成功!");
        }else{
            return back()->with("info" , "修改失败!");
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
