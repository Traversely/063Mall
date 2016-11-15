<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class MsgController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()     //加载查看站内信列表页
    {
        //
        $db = \DB::table("message");
        
        //判断并封装搜索条件
        if(!empty($_GET['search'])){
            $db->where( "title" , "like" , "%{$_GET['search']}%" );
            $params['search'] = $_GET['search'];    //维持搜索条件
            
        }else{
            $params['search'] = "";
        }
        
        $list = $db->paginate(5);   //每页5条数据
    	return view("admin.Msg",['list'=>$list , 'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    //加载发送站内信页
    {
        //
        return view("admin.sendMsg");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)     //执行站内信的发送
    {
        //获取表单数据
        $data = ['title'=>$request->title , 'content'=>$request->content , 'author'=>$request->author , 'time'=>$request->time];
        
        //将数据写入数据库
        $m = \DB::table("message")->insertGetId($data);
        if($m > 0){
            return redirect('admin/msg')->with("addmsg","添加成功");
        }else{
            return redirect('admin/msg')->with("addmsg","添加失败");
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        \DB::table('message')->delete($id);
        return redirect("admin/msg")->with("delmsg","删除成功");
    }
}
