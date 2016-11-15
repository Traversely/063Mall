<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

class MsgController extends CommonController    //站内信控制器
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //查看站内信列表
    {
        //
        $msgs = \DB::table("message")->get();
        $uid = session('homeuser')->id;
        //dd($data);
        foreach($msgs as $msg){
            $read = explode(',' , $msg->read);
            $delete = explode(',' , $msg->delete);
            
            if(in_array($uid,$read)){
                $msg->read = true;
            }else{
                $msg->read = false;
            }
            
            if(!in_array($uid,$delete)){
                $data[] = $msg;
            }
            //$info->delete = $delete;
        }
        return view("home.message" , ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read($id)   //标为已读
    {
        $read = \DB::table("message")->where('id' , $id)->select('read')->first()->read;
        $uid = \Session::get('homeuser')->id;
        $data = ($read.$uid.",");
        //dd($data);
        $m = \DB::table("message")->where('id' , $id)->update(['read'=>$data]);
        if($m > 0){
            return back()->with('read' , '已标注为 已读 !');
        }else{
            return back()->with('read' , '操作失败!');
        }
        //dd($m);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function noread($id) //标为未读
    {
        $noread = \DB::table("message")->where('id' , $id)->select('read')->first()->read;
        $uid = \Session::get('homeuser')->id;
        $info = explode(',' , trim($noread,','));  //去除右边的 ','
        foreach( $info as $k=>$v ) {    //遍历删除
            if($uid == $v){
                unset($info[$k]);
            }
        }
        $data = implode(',' , $info).',';
        //dd($data);
        $m = \DB::table("message")->where('id' , $id)->update(['read'=>$data]);
        if($m > 0){
            return back()->with('read' , '已标注为 未读 !');
        }else{
            return back()->with('read' , '操作失败!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delMsg($id)   //删除站内信
    {
        $del = \DB::table("message")->where('id' , $id)->select('delete')->first()->delete;
        $uid = \Session::get('homeuser')->id;
        $data = ($del.$uid.",");
        //dd($data);
        $m = \DB::table("message")->where('id' , $id)->update(['delete'=>$data]);
        if($m > 0){
            return back()->with('read' , '删除成功!');
        }else{
            return back()->with('read' , '操作失败!');
        }
        //dd($m);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   //单条信息展示
    {
        $data = \DB::table("message")->where("id" , $id)->first();  //获取整条数据
        $uid = \Session::get('homeuser')->id;
        $read = \DB::table("message")->where('id' , $id)->select('read')->first()->read;    //获取单个字段
        $arr = explode("," , $read);
        $info = $read.$uid.",";
        //dd($info);
        if( ! in_array($uid , $arr)){
            $m = \DB::table("message")->where('id' , $id)->update(['read'=>$info]);
        }
        
        //dd($aa);
        
        return view("home.msgDetail" , ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delMsgDetail($id)   
    {
        $del = \DB::table("message")->where('id' , $id)->select('delete')->first()->delete;
        $uid = \Session::get('homeuser')->id;
        $data = ($del.$uid.",");
        //dd($data);
        $m = \DB::table("message")->where('id' , $id)->update(['delete'=>$data]);
        if($m > 0){
            return redirect("home/message")->with('read' , '删除成功!');
        }else{
            return redirect("home/message")->with('read' , '删除失败!');
        }
        //dd($m);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notice($id) //站内信小图标ajax请求
    {
        $msgs = \DB::table("message")->get();
        $uid = session('homeuser')->id;
        $i=0;
        foreach($msgs as $msg){
            $read = explode(',',$msg->read);
            $delete = explode(',',$msg->delete);
            if(!in_array($uid,$read) && !in_array($uid,$delete)){
                $i++;
            }
        }
        echo $i;
    }
}
