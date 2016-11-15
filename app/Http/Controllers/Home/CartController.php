<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends CommonController
{
	//添加商品到购物车
	public function store(Request $request,$id)
    {
			
			$data = ['uid'=>$request->user,'count'=>$request->count,'gid'=>$request->gid];
			$data['time']=time();
			
			$cart = \DB::table("cart")->where('gid',$id)->first();
			//var_dump(session('homeuser')->id);
			if(!empty($cart)){
				$count = (int)$request->count;
				$count1 = \DB::table("cart")->where('gid',$id)->value('count');
				$total = $count+$count1;
				$stock = \DB::table('gdetail')->where('gid',$id)->value('stock');
				if($total < $stock){
					$update = \DB::table("cart")->where("gid",$id)->update(['count' => $total]);
					return redirect('home/order/shopcar');
				}
			}else{
		
				$m = \DB::table('cart')->insertGetId($data);
				
					if($m>0){
						return redirect('home/order/shopcar');
						
					}else{
						return redirect()->route('home/good/detail', [$id]);
					}
				}
			
    }
	
	//编辑购物车中商品数量cart
	public function addto(Request $request,$id)
	{
		$count = $_GET['count'];
		//var_dump($count);die;
		$update = \DB::table("cart")->where("gid",$id)->update(['count' => $count]);
		if($update > 0){
			echo 1;
		}else{
			echo 0;
		}
	}
	
	//结算到下订单页
	public function balance(Request $request)
	{
		$data = $request->gid;
		$db = array();
		foreach($data as $v){
			$db[] = \DB::table("cart")
			->where("gid",$v)
			->join('good', 'cart.gid', '=', 'good.id')
			->select('cart.*','good.good')
			->first();
		}
			foreach($db as $v){
				$color = \DB::table('gdetail')->where('gid',$v->gid)->value('color');
				$v->color = $color;
			}
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
		
			//添加收货地址
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
			
			return view('home.singlePage',[ 'db' => $db , 'data' => $data]);
			
		
		
	}
	
	//订单支付
	public function ordersucc($id)
    {
		$db = \DB::table('order')->where('id',$id)->first();
		return view('home.ordersucc',['db'=>$db]);
    }
	
	
	public function destroy($id)
    {
        $db = \DB::table('cart')->where('id',$id)->delete();
		
		if(!empty($db)){
			return redirect('/home/order/shopcar');
		}else{
			//return view('home.shopcar1');
		} 
		
    }
	
	
	public function index()
    {
		
		//查看购物车信息
		$db = \DB::table('cart')
			->join('good', 'cart.gid', '=', 'good.id')
			->select('cart.*','good.good')
			->get();

		
		foreach($db as $v){
			$color = \DB::table('gdetail')->where('gid',$v->gid)->value('color');
			$v->color = $color;
		}
		
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
		//遍历商品详细信息数据中的id并添加到订单页
		foreach($db as $v){
			$gid = \DB::table('gdetail')->where('gid',$v->gid)->value('gid');
			$v->gid = $gid; //放置进去
		}
		//var_dump($db);
		
		
		if(!empty($db)){
			return view('home.shopcar',['db'=>$db] );
		}else{
			return view('home.shopcar1');
		}
	}
 
    public function del()
    {
        $db = \DB::table('cart')->delete();
		
		return view('home.shopcar1');
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

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

}
