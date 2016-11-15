<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class StdClass{}

class IndexController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取 banner 图片
        $banner =DB::table('banner')->where('display',1)->get();

        //获取类别
        $type[0] = DB::table('type')
                ->where('level',0)
                ->where('display',1)
                ->get();
        $type[1] = DB::table('type')->where('level',1)->select('type','pid','id')->get();
        $type[2] = DB::table('type')->where('level',2)->select('type','pid','id')->get();

        //遍历一级类别作为版块内容
        foreach($type[0] as $type1){
            //获取各版块下展示在首页的商品
            $goods = DB::table('good')
                    ->where('onshow',1)
                    ->where('type1',$type1->id)
                    ->select('id','good')
                    ->take(6)
                    ->get();
            //获取首页商品的详细信息
            foreach($goods as $v){
                $gdid = DB::table('gdetail')
                        ->where('gid',$v->id)
                        ->value('id');
                $picture = DB::table('gpicture')
                        ->where('gdid',$gdid)
                        ->value('picture');
                $price = DB::table('gdetail')
                        ->where('gid',$v->id)
                        ->value('price');
                $v->price = $price;
                $v->picture = $picture;
            }
            $type1->goods = $goods;

            //获取各版块下的商品排行
            $ranks = DB::table('good')
                    ->where('type1',$type1->id)
                    ->select('good','id')
                    ->orderBy('sale','desc')
                    ->take(8)
                    ->get();
            //获取排行内各商品的详细信息
            foreach($ranks as $v){
                $gdid = DB::table('gdetail')
                        ->where('gid',$v->id)
                        ->value('id');
                $picture = DB::table('gpicture')
                        ->where('gdid',$gdid)
                        ->value('picture');
                $config = DB::table('gdetail')
                        ->where('gid',$v->id)
                        ->value('configuration');
                $price = DB::table('gdetail')
                        ->where('gid',$v->id)
                        ->value('price');
                $v->config = $config;
                $v->picture = $picture;
                $v->price = $price;
            }
            $type1->ranks = $ranks;
        }


        return view('home.index',['banner'=>$banner,'type'=>$type]);
    }


    public function newsAjax()
    {
        //获取新品内容
        $news = DB::table('good')
                    ->select('good','id','time')
                    ->orderBy('time','desc')
                    ->take(10)
                    ->get();

        foreach ($news as $v) {
            $gdid = DB::table('gdetail')
                    ->where('gid',$v->id)
                    ->value('id');
            $picture = DB::table('gpicture')
                    ->where('gdid',$gdid)
                    ->value('picture');
            $price = DB::table('gdetail')
                    ->where('gid',$v->id)
                    ->value('price');
            $v->picture = $picture;
            $v->price = $price;
            $v->time = date('m月d日上新',$v->time);
        }

        $data = new StdClass();
        $data->total = 100;
        $data->timestamp = date('Y-m-d',time());
        $data->queryString = "*";
        $data->list = $news;
        $data->fallUpdateTime = '00';
        $res = new StdClass();
        $res->errno = 0;
        $res->total = 100;
        $res->data = $data;

        $callback = $_GET['callback'];
        echo $callback.'('.json_encode($res).')';
    }

    public function searchAjax(){
        $data = new StdClass();

        $good = DB::table('good')
                ->where('onsale','1')
                ->orderBy('sale')
                ->select('good','id')
                ->take(10)
                ->get();

        foreach($good as $v){
            $g = $v->good;
            $stock = DB::table('gdetail')
                ->where('gid',$v->id)
                ->sum('stock');
            $data->$g = $stock;
        }
        $result['data'] = $data;
        $result['errno'] = 0;
        $result['total'] = 5;

        $callback = $_GET['callback'];
        echo $callback.'('.json_encode($result).')';
    }
    
    public function typeBarAjax()
    {
        $typeBar = DB::table('type')
                ->where('display',1)
                ->where('level',0)
                ->select('id','type')
                ->get();
        echo json_encode($typeBar);
    }

    //获取用户购物车商品数量
    public function getcartnum()
    {
        if(null != session('homeuser')){
            $user = session('homeuser')->id;
        }else{
            $user = 0;
        }

        $num = DB::table('cart')
                ->where('uid',$user)
                ->count();

        $res = new StdClass();

        $res->data = $num;
        $res->errno = 0;
        $res->errmsg = '查询成功！';

        $callback = $_GET['callback'];
        return $callback."(".json_encode($res).")";
    }

    public function getshopcart()
    {
        $res = new StdClass();
        $res->errmsg = '查询失败！';
        $res->errno = 1;
        $res->data = null;

        $callback = $_GET['callback'];

        return $callback."(".json_encode($res).")";
    }

    public function suggest($search)
    {
        $data = new StdClass();

        $good = DB::table('good')
                ->where('onsale','1')
                ->where('good','like','%'.$search.'%')
                ->select('good','id')
                ->take(10)
                ->get();

        foreach($good as $v){
            $g = $v->good;
            $stock = DB::table('gdetail')
                ->where('gid',$v->id)
                ->sum('stock');
            $data->$g = $stock;
        }

        $result['data'] = $data;
        $result['errno'] = 0;
        $result['total'] = 5;

        $callback = $_GET['callback'];
        echo $callback.'('.json_encode($result).')';
    }

    public function placeholder($md)
    {
        $data = DB::table('good')
            ->where('onSale',1)
            ->select('good as text','id')
            ->orderBy(DB::raw('RAND()'))
            ->first();
        $data->url = 'index';

        $res = new StdClass();

        $res->data = $data;
        $res->errno = 0;
        $res->total = 0;

        $callback = $_GET['callback'];

        return $callback."(".json_encode($res).")";
    }

    public function getbuyfreeinfo()
    {
        $res = new StdClass();

        $res->data = null;
        $res->errno = 0;
        $res->errmsg = '请求成功';

        return json_encode($res);
    }
}