<?php
//后台首页控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class IndexController extends CommonController
{
    //加载后台网站首页
    public function index()
    {
    	$order = DB::table('order')
    			->select(DB::raw('count(*) as orderNum'))
    			->value('orderNum');
    	
    	$good = DB::table('good')
    			->select(DB::raw('sum(sale) as sale'))
    			->value('sale');

    	$user = DB::table('user')
    			->select(DB::raw('count(*) as userNum'))
    			->value('userNum');
    	$config = DB::table('config')->value('status');

    	$goodRank = $this->goodRank();
    	$userRank = $this->userRank();
    	$goodStock = $this->goodStock();
    	$typeSale = $this->typeSale();

    	$data['order'] = $order;
    	$data['user'] = $user;
    	$data['good'] = $good;
    	$data['goodRank'] = $goodRank;
    	$data['userRank'] = $userRank;
    	$data['goodStock'] = $goodStock;
    	$data['typeSale'] = $typeSale;
    	$data['config'] = $config;

        return view("admin.index",['data'=>$data]);
    }

	//获取商品销售排行前五名商品
    public function goodRank()
    {
    	$goodRank = DB::table('good')
    			->select('good')
    			->orderBy('sale','desc')
    			->take(5)
    			->get();

  		return $goodRank;
    }

    //获取七天来每天的用户注册数量
    public function userRank()
    {	
    	$time1 = strtotime('-1days');
    	$time2 = strtotime('-2days');
    	$time3 = strtotime('-3days');
    	$time4 = strtotime('-4days');
    	$time5 = strtotime('-5days');
    	$time6 = strtotime('-6days');
    	$time7 = strtotime('-7days');

    	$user = '[';

    	$user7 = DB::table('user')
    			->where('ctime','<',$time6)
    			->where('ctime','>',$time7)
    			->select(DB::raw('count(*) as userNum'))
    			->value('userNum');
    	$user .= $user7.',';

    	$user6 = DB::table('user')
    			->where('ctime','<',$time5)
    			->where('ctime','>',$time6)
    			->select(DB::raw('count(*) as userNum'))
    			->value('userNum');
    	$user .= $user6.',';

    	$user5 = DB::table('user')
    			->where('ctime','<',$time4)
    			->where('ctime','>',$time5)
    			->select(DB::raw('count(*) as userNum'))
    			->value('userNum');
    	$user .= $user5.',';

    	$user4 = DB::table('user')
    			->where('ctime','<',$time3)
    			->where('ctime','>',$time4)
    			->select(DB::raw('count(*) as userNum'))
    			->value('userNum');
    	$user .= $user4.',';

    	$user3 = DB::table('user')
    			->where('ctime','<',$time2)
    			->where('ctime','>',$time3)
    			->select(DB::raw('count(*) as userNum'))
    			->value('userNum');
    	$user .= $user3.',';

    	$user2 = DB::table('user')
    			->where('ctime','<',$time1)
    			->where('ctime','>',$time2)
    			->select(DB::raw('count(*) as userNum'))
    			->value('userNum');
    	$user .= $user2.',';

    	$user1 = DB::table('user')
    			->where('ctime','>',$time1)
    			->select(DB::raw('count(*) as userNum'))
    			->value('userNum');
    	$user .= $user1.']';

    	$time = "['今天','".date('m月d日',$time2)."','".date('m月d日',$time3)."','".date('m月d日',$time4)."','".date('m月d日',$time5)."','".date('m月d日',$time6)."','".date('m月d日',$time7)."']";
    	$time = "['".date('m月d日',$time7)."','".date('m月d日',$time6)."','".date('m月d日',$time5)."','".date('m月d日',$time4)."','".date('m月d日',$time3)."','".date('m月d日',$time2)."','今天']";
  		
  		$userRank['user'] = $user;
  		$userRank['time'] = $time;

  		return $userRank;
    }

    //获取库存数量小于10的商品
    public function goodStock()
    {
    	$goodStock = DB::table('good')
    				->join('gdetail','gdetail.gid','=','good.id')
    				->where('good.onSale',1)
    				->where('gdetail.stock','<',10)
    				->select('good.good','gdetail.color','good.id')
    				->get();

    	return $goodStock;
    }

    //获取各类别的商品销售数量
    public function typeSale()
    {
    	$sales = DB::table('good')
    			->join('type','type.id','=','good.type1')
    			->where('type.display',1)
    			->where('good.onSale',1)
    			->select(DB::raw('type.type, sum(good.sale) as sale'))
    			->groupBy('type.type')
    			->get();

    	$typeSale['type'] = '[';
    	$typeSale['sale'] = '[';
      	foreach($sales as $sale){
      		$typeSale['type'] .= "'".$sale->type."',";
      		$typeSale['sale'] .= "".$sale->sale.",";
      	}

      	$typeSale['type'] = rtrim($typeSale['type'],',');
      	$typeSale['type'] .= ']';
      	$typeSale['sale']  = rtrim($typeSale['sale'],','); 
      	$typeSale['sale'] .= ']';

    	return $typeSale;
    }

    //修改网站配置
    public function config($status)
    {
    	$data['status'] = $status;
    	$m = DB::table('config')->update($data);
    	if($m > 0){
    		return back()->with('msg','操作成功！');
    	}else{
    		return back()->with('msg','操作失败！');
    	}
    }
}
