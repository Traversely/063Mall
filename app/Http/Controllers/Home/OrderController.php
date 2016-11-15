<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends CommonController
{
	//查看订单
    public function index()
    {
		//查询所有的订单信息
		$db = \DB::table('order')
			->join('good', 'order.gid', '=', 'good.id')
			->select('order.*','good.good')
			->get();
		
		foreach($db as $v){
			$gid = \DB::table('good')->where('id',$v->gid)->value('id');
			$v->gid = $gid;
		}
		//遍历商品详细信息数据中的id并添加到订单页
		foreach($db as $v){
			$gdid = \DB::table('gdetail')->where('gid',$v->gid)->value('id');
			$v->gdid = $gdid; //放置进去
		}
		
		//遍历商品图片表中的picture字段并添加到订单页
		foreach($db as $v){
			$picture = \DB::table('gpicture')->where('gdid',$v->gdid)->value('picture');
			$v->picture = $picture;//放置进去
		}
	
		foreach($db as $v){
		//查询待付款的订单个数
		if($v->status == 0){
			$db0 = \DB::table('order')->where('status',0)->count();
		}else{
			$db0 = '';
		}
		//查询代发货的订单个数
		if($v->status == 1){
			$db1 = \DB::table('order')->where('status',1)->count();
		}else{
			$db1 = '';
		}
		//查询代付款的订单个数
		if($v->status == 2){
			$db2 = \DB::table('order')->where('status',2)->count();
		}else{
			$db2 = '';
		}
		//查询代付款的订单个数
		if($v->status == 3){
			$db3 = \DB::table('order')->where('status',3)->count();
		}else{
			$db3 = '';
		}
			
		}
	
		if(!empty($db)){
			return view('home.order',['db'=>$db , 'db0'=>$db0 ,'db1'=>$db1 ,'db2'=>$db2 ,'db3'=>$db3]);
		}else{
			return view('home.order1');
		}
		
		
    }

	//查看订单详情页
	public function show($id)
    {
		//遍历订单详情
		
		$orderdetail = \DB::table('orderdetail')->where('oid',$id)->first();
		
		$db = \DB::table('order')->where('id',$id)->get();

		foreach($db as $v){
			$gid = \DB::table('good')->where('id',$v->gid)->value('id');
			$v->gid = $gid;
		}
		
		foreach($db as $v){
			$good = \DB::table('good')->where('id',$v->gid)->value('good');
			$v->good = $good;
		}
		
		//遍历商品详细信息数据中的id并添加到订单页
		foreach($db as $v){
			$gid = \DB::table('gdetail')->where('gid',$v->gid)->value('id');
			$v->gdid = $gid; //放置进去
		}

		foreach($db as $v){
			$color = \DB::table('gdetail')->where('gid',$v->gid)->value('color');
			$v->color = $color;
		}
		
		//遍历商品图片表中的picture字段并添加到订单页
		foreach($db as $v){
			$picture = \DB::table('gpicture')->where('gdid',$v->gdid)->value('picture');
			$v->picture = $picture;//放置进去
		}
		
		$userInfo = \Session::get('homeuser');
		$data = \DB::table("address")->where('uid' , '=' , $userInfo->id)->get();
		//dd($data);
		foreach($data as $list){
		
		$list->province1 = \DB::table("address")
				->join('district','address.province','=','district.id')
				->where("address.province" , $list->province)
				->value('district.name');
		if(!empty($list->city)){
			$list->city1 = \DB::table("address")
				->join('district','address.city','=','district.id')
				->where("address.city" , $list->city)
				->value('district.name');
		}
		if(!empty($list->district)){
			$list->district1 = \DB::table("address")
				->join('district','address.district','=','district.id')
				->where("address.district" , $list->district)
				->value('district.name');
		}
		if(!empty($list->township)){
			$list->township1 = \DB::table("address")
				->join('district','address.township','=','district.id')
				->where("address.township" , $list->township)
				->value('district.name');
		}
            
        }
		
		$odt = \DB::table('orderdetail')->where('oid',$id)->first();
		
		foreach($data as $address){
			
		
		foreach($db as $od){
			
			return view('home.orderDetail',[ 'v' => $orderdetail,'od' => $od , 'address' => $address,'odt' =>$odt]);
        }
		}
		
    }
	
	//取消订单
	public function destroy($id)
    {
        $m = \DB::table('order')->where('id',$id)->delete();
        $m1 = \DB::table('orderdetail')->where('oid',$id)->delete();
        if($m > 0 && $m1 > 0){
            return redirect('home/myorder');
        }else{
            return redirect('home/myorder');
        }
    }
	
	//购物车页面到生成订单页
	public function create()
    {
		$db = \DB::table('cart')
			->join('good', 'cart.gid', '=', 'good.id')
			
			->select('cart.*','good.good')
			->get();
		
		foreach($db as $v){
			$color = \DB::table('gdetail')->where('id',$v->gid)->value('color');
			$v->color = $color;
		
		//遍历商品详细信息数据中的id并添加到订单页
		foreach($db as $v){
			$gid = \DB::table('gdetail')->where('gid',$v->gid)->value('id');
			$v->gdid = $gid; //放置进去
		}
		
		foreach($db as $v){
			$price = \DB::table('gdetail')->where('gid',$v->gid)->where('color',$v->color)->value('price');
			$v->price = $price; //放置进去
		}
		
		//遍历商品图片表中的picture字段并添加到订单页
		foreach($db as $v){
			$picture = \DB::table('gpicture')->where('gdid',$v->gdid)->value('picture');
			$v->picture = $picture;//放置进去
		}
		
		foreach($db as $od){
			return view('home.singlePage',[ 'od' => $od]);
		}
		}
    }
   
	//执行生成订单操作
    public function store(Request $request)
    {
        //获取下单页提交的信息
		
		
		//var_dump($data);
		
		$date = ['pay'=>$request->invoice , 'deliver'=>$request->invoice1 , 'aid'=>$request->address_id , 'invoice'=>$request->invoice2 , 'remark'=>$request->remark , 'invInfo'=>$request->invInfo];
		$goodid = $request->goodid;
		foreach($goodid as $gd){
			$data = ['uid'=>$request->uid , 'count'=>$request->count , 'price'=>$request->price];
			$data['time'] = time(); $data['gid']=$gd;
			
			$m = \DB::table('order')->insertGetId($data);
			$date['oid'] = $m;
			
			$m1 = \DB::table('orderdetail')->insertGetId($date);
			$db = \DB::table('order')->where('id',$m)->first();
			}
		
		
		$gid = $request->goodid;
		//var_dump($db);die;
		if($m > 0 && $m1 > 0){
			foreach($gid as $v){
				\DB::table('cart')->where('gid',$v)->delete();
			}
			
			return view('home.ordersucc',['db'=>$db]);
		}else{
			return back();
		}
        
    }
	
	//下单页执行天价收货地址
	public function addstore(Request $request)     //执行添加地址
    {
        $list = $request->userAddress;  //用户填写的地址信息

        $userInfo = \Session::get('homeuser');  //当前登录用户的信息
        $data = ['uid'=>$userInfo->id , 'consignee'=>$request->consignee , 'province'=>$list['0'] , 'street'=>$request->street , 'postcode'=>$request->postcode , 'phone'=>$request->phone];
       
        if(isset($list['1']) && $list['1'] != 0){   //判断城市信息是否有值
            $data['city'] = $list['1'];
        }
        if(isset($list['2'],$list) && $list['2'] != 0){ //判断区县是否有值
            $data['district'] = $list['2'];
        }
        if(isset($list['3'],$list) && $list['3'] != 0){ //判断乡镇是否有值
            $data['township'] = $list['3'];
        }
        var_dump($data);die;
        $m = \DB::table("address")->insertGetId($data);
        if($m > 0){
            return back()->with('addressInfo','success');
        }else{
            return back()->with('addressInfo','error');
        }
    }

    
}
