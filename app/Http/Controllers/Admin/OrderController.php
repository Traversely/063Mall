<?php
//后台首页控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends CommonController
{
    //查看订单
    public function index()
    {
		//判断$_GET['search']是否存在
		if(!isset($_GET['search'])){
			$_GET['search'] = '';
		}
		$order = \DB::table('order')
			->join('user', 'order.uid', '=', 'user.id')
			->join('good', 'order.gid', '=', 'good.id')
			->join('gdetail','order.gid','=','gdetail.gid')
			->where('color','=','gdetail.gid')
			->orwhere( "user.name" , "like" , "%{$_GET['search']}%" )//模糊查询条件
			->orwhere("good.good","like","%{$_GET['search']}%")
			->select('order.*', 'user.name','good.good')
			->paginate(5);
		
			$params['search'] = $_GET['search'];//维持查询条件
			//var_dump($order);die;
			return view('admin.orderShow',['order'=>$order , 'params'=>$params] );
    }
	
	//查看订单详情
    public function detail()
    {	
		$id=$_GET['id'];
		$db = \DB::table("orderdetail");
		$orderDetail = $db->paginate(5);
        return view("admin.orderDetail",['orderdetail'=>$orderDetail]);
    }
	
	
    //生成订单
    public function store(Request $request)
    {
        //
    }
	
	//加载修改订单信息页
    public function show($id)
    {
		$order = \DB::table("order")->where('id',$id)->first();	
		//var_dump($order);die;
		//return view('admin.orderEdit',['order'=>$order]);
		return view("admin.orderEdit",['order'=>$order]);
		
    }
	
	//修改订单信息
    public function update(Request $request, $id)
    {	
		
		$data=['count'=>$request->count,'price'=>$request->price,'status'=>$request->status,'time'=>$request->time];
		$order = \DB::table("order")->where('id',$id)->update($data);
		return redirect('admin/order');
    }
	
	//删除订单
	public function destroy($id)
    {
        $m = \DB::table('order')->delete($id);
        if($m > 0){
            return redirect('admin/order');
        }else{
            return redirect('admin/order');
        }
    }
	
	public function orderdetail($id)
	{	
		$orderDetail = \DB::table("orderdetail")->where('oid',$id)->first();
		//var_dump($orderDetail);die;
        return view("admin.orderDetail",['v'=>$orderDetail]);
		//echo "aaaaa";
	}
	


    
}
