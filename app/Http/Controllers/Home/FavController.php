<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

class FavController extends CommonController    //我的喜欢控制器
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()     //查看收藏商品
    {
        //
        $userInfo = \Session::get('homeuser');
        
        $favs = \DB::table("favourite")
                ->where('uid' , $userInfo->id)
                ->get();

        if(!empty($favs)){
            foreach($favs as $list){
                $good = \DB::table("gdetail")
                    ->join('good' , 'gdetail.gid' , '=' , 'good.id')
                    ->where('gdetail.gid' , '=' , $list->gid)
                    ->select('gdetail.id' , 'good.good' , 'good.minprice' , 'good.id as gid')
                    ->first();
                $picture = \DB::table("gdetail")
                    ->join('gpicture' , 'gdetail.id' , '=' , 'gpicture.gdid')
                    ->where('gpicture.gdid' , '=' , $good->id)
                    ->select('picture')
                    ->first();
                    
                $good->id = $list->id;  //插入favourite表的id
                $good->picture = $picture->picture; //插入图片
                $goods[] = $good;
            }
            //dd($goods);
            return view("home.favourite" , isset($favs) ? ['goods'=>$goods] : '');
        }
        return view("home.favourite");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)     //添加收藏商品
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)        //删除收藏商品
    {
        //
        \DB::table('favourite')->delete($id);
        return back();
    }
}
