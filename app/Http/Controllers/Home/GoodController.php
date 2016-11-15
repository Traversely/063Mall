<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
    protected $order = 'sale';
    protected $sc = 'desc';
    /**
     * 获取指定类别下的商品和分类内容
     *
     * @return \Illuminate\Http\Response
     */
    public function type($type, $brand = false)
    {
        $searchType = DB::table('type')
                ->where('pid',$type)
                ->select('type','id')
                ->get();

        if(empty($searchType)){
            $searchType = DB::table('type')
                ->where('id',$type)
                ->select('type','id')
                ->get();
        }

        if($brand === false){
            $goods = DB::table('good')
                    ->join('brand','brand.id','=','good.brand')
                    ->where('good.onSale',1)
                    ->where('type1',$type)
                    ->orwhere('type2',$type)
                    ->orwhere('type3',$type)
                    ->select('good.good','good.id','brand.brand','minprice','maxprice','sale')
                    ->orderBy($this->order,$this->sc)
                    ->paginate(20);
        }else{
            $goods = DB::table('good')
                    ->join('brand','brand.id','=','good.brand')
                    ->where('good.onSale',1)
                    ->where('brand.brand',$brand)
                    ->where('type1',$type)
                    ->orwhere('type2',$type)
                    ->orwhere('type3',$type)
                    ->select('good.good','good.id','brand.brand','minprice','maxprice','sale')
                    ->orderBy($this->order,$this->sc)
                    ->paginate(20);
        }
        //

        $typeResult['searchType'] = $searchType;
        $typeResult['goods'] = $goods;

        return $typeResult;
    }

    /**
     * 获取搜索内容的商品和一级类别
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($search, $brand = false)
    {
        //
        $searchType = DB::table('type')
                ->where('level',0)
                ->select('type','id')
                ->get();
        if($brand === false){
            $goods = DB::table('good')
                    ->join('brand','brand.id','=','good.brand')
                    ->where('good.onSale',1)
                    ->where('good.good','like','%'.$search.'%')
                    ->orwhere('brand.brand','like','%'.$search.'%')
                    ->select('good.good','good.id','brand.brand','minprice','maxprice','sale')
                    ->orderBy($this->order,$this->sc)
                    ->paginate(20);
        }else{
            $goods = DB::table('good')
                    ->join('brand','brand.id','=','good.brand')
                    ->where('good.onSale',1)
                    ->where('good.good','like','%'.$search.'%')
                    ->where('brand.brand',$brand)
                    ->select('good.good','good.id','brand.brand','minprice','maxprice','sale')
                    ->orderBy($this->order,$this->sc)
                    ->paginate(20);
        }

        $searchResult['searchType'] = $searchType;
        $searchResult['goods'] = $goods;

        return $searchResult;
    }

    /**
     * 将商品结果以列表形式输出
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function goodlist($type)
    {
        //
        if(isset($_GET['saleorder'])){
            $this->sc = $_GET['saleorder'];
            $this->order = 'good.sale';
        }

        if(isset($_GET['priceorder'])){
            $this->sc = $_GET['priceorder'];
            if($_GET['priceorder'] == 'asc'){
                $this->order = 'good.minprice';
            }else{
                $this->order = 'good.maxprice';
            }
        }

        if(isset($_GET['search'])){
            if(!empty($_GET['brand'])){
                $params['search'] = $_GET['search'];
                $params['brand'] = $_GET['brand'];
                $searchResult = $this->search($_GET['search'], $_GET['brand']);
                $searchType = $searchResult['searchType'];
                $goods = $searchResult['goods'];
            }else{
                $params['search'] = $_GET['search'];
                $params['brand'] = '';
                $searchResult = $this->search($_GET['search']);
                $searchType = $searchResult['searchType'];
                $goods = $searchResult['goods'];
            }
        }else{
            if(!empty($_GET['brand'])){
                $params['search'] = '';
                $params['brand'] = $_GET['brand'];
                $typeResult = $this->type($type,$_GET['brand']);
                $searchType = $typeResult['searchType'];
                $goods = $typeResult['goods'];
            }else{
                $params['search'] = '';
                $params['brand'] = '';
                $typeResult = $this->type($type);
                $searchType = $typeResult['searchType'];
                $goods = $typeResult['goods'];
            }
        }

        foreach ($goods as $v) {
            $brand[] = $v->brand;
            $detail = DB::table('gdetail')
                    ->where('gid',$v->id)
                    ->select('id')
                    ->first();
            $picture = DB::table('gpicture')
                    ->where('gdid',$detail->id)
                    ->select('picture')
                    ->first();
            $v->picture = $picture->picture;
        }
        $goods->type = $type;
        $goods->typeName = DB::table('type')->where('id',$type)->value('type');

        if(isset($brand)){
            $goods->brand = array_unique($brand);
            return view('home.goodlist',['goods'=>$goods,'params'=>$params,'searchType'=>$searchType]);
        }else{
            $ranks = $this->getRank();
            return view('home.noneSearch',['params'=>$params,'ranks'=>$ranks,'searchType'=>$searchType]);
        }
    }

    /**
     * Show the detail of some one good.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $id)
    {
        //
        $good = DB::table('good')
                ->where('id',$id)
                ->first();
                
        $color = DB::table('gdetail')
                        ->where('gid',$id)
                        ->lists('color');

        if(isset($_GET['color'])){
            $search = $_GET['color'];
        }else{
            $search = $color[0];
        }

        $detail = DB::table('gdetail')
                        ->where('gid',$id)
                        ->where('color',$search)
                        ->select('configuration','id','price','stock')
                        ->first();

        $picture = DB::table('gpicture')
                    ->where('gdid',$detail->id)
                    ->lists('picture');
        
        $good->picture = $picture[0];

        $request->session()->put("history.{$id}",$good);

        return view('home.gooddetail',['good'=>$good,'detail'=>$detail,'color'=>$color,'picture'=>$picture]);
    }
    
    //执行 Ajax 查询是否已收藏商品
    public function checkFav($id)
    {   
        if(session('homeuser')){
            $m = DB::table('favourite')->where('uid',session('homeuser')->id)->where('gid',$id)->value('id');
            if($m){
                echo "success";
            }else{
                echo "fail";
            }
        }else{
            echo "fail";
        }
    }
    
    //执行添加或者取消商品收藏
    public function favourite($id)
    {   
        if($_GET['action'] == 'add'){
            $data['uid'] = session('homeuser')->id;
            $data['gid'] = $id;
            $m = DB::table('favourite')->insert($data);
            if($m >0){
                echo 'success';
            }else{
                echo 'fail';
            }
        }else{
            $m = DB::table('favourite')->where('uid',session('homeuser')->id)->where('gid',$id)->delete();
            if($m >0){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }
    
    /**
     * 处理 Ajax 查询
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailAjax($id)
    {
        //
        $color = $_GET['color'];

        $detail = DB::table('gdetail')
                        ->where('gid',$id)
                        ->where('color',$color)
                        ->select('price','id','configuration','stock')
                        ->first('price');

        $detail->picture = DB::table('gpicture')
                    ->where('gdid',$detail->id)
                    ->lists('picture');

        echo json_encode($detail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getRank()
    {
        //获取各版块下的商品排行
        $ranks = DB::table('good')
                ->select('good','id')
                ->orderBy('sale','desc')
                ->take(10)
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
        return $ranks;
        //echo json_encode($ranks);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brandSearch($type, $brand)
    {
        //
    }
}
