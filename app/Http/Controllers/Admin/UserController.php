<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends CommonController
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()       //加载用户列表页
    {
        //return view("admin.userlist");
        $db = \DB::table("user")
                    ->join('userdetail' , 'user.id' , '=' , 'userdetail.uid')
                    ->select();
        //判断并封装搜索条件
        if(!empty($_GET['search'])){
            $db->where( "name" , "like" , "%{$_GET['search']}%" );
            $params['search'] = $_GET['search'];    //维持搜索条件
        }else{
            $params['search'] = "";
        }
        
        $list = $db->paginate(5);   //每页5条数据
        
        
    	return view("admin.userlist",['list'=>$list , 'params'=>$params]);
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)   //执行用户冻结\解冻
    {
        $list = \DB::table('user')->where('id', '=', $id)->get();
        foreach($list as $data) {
            $m = \DB::table('user')->where('id', $id)->update(['status' => $data->status == 0 ? 1 : 0]);
            if($m > 0){
                return redirect("admin/users")->with("freeze","操作成功");
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    //执行用户删除
    {
        //dd($id);
        \DB::table('user')->delete($id);
        \DB::table('userdetail')->where("uid",$id)->delete();
        return redirect("admin/users")->with("deluser","删除成功");
    }
}
