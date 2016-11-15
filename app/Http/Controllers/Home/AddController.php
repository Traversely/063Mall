<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Requests;

class AddController extends CommonController   //常用地址控制器
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()     //查看地址
    {
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
        //dd($data);
        return view( "home.address" , ['data'=>$data] );
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    //加载添加地址页    
    {
        //
        
    }
    
    //根据参数upid获取对应的城市类别信息
    public function find($upid=0)
    {
       $list = \DB::table("district")->where("upid",$upid)->get();
       return response()->json($list);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)     //执行添加地址
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
        //var_dump($data);die;
        $m = \DB::table("address")->insertGetId($data);
        if($m > 0){
			echo "aaaa";
            return back()->with('addressInfo','success');
        }else{
            return back()->with('addressInfo','error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)       //加载修改地址页
    {
        
    }
    
    public function getAdd($id)     //获取用户单条收货地址的json数据
    {
        $info = \DB::table('address')->where('id', $id)->first();
        echo json_encode($info);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdd()    //执行收货地址修改
    {
        
        //$list = $request->userAddress;  //用户填写的地址信息
        
        $userInfo = \Session::get('homeuser');  //当前登录用户的信息
        $data = ['uid'=>$userInfo->id , 'consignee'=>$_POST['consignee'] , 'province'=>$_POST['userAddress']['0'] , 'street'=>$_POST['street'] , 'postcode'=>$_POST['postcode'] , 'phone'=>$_POST['phone']];
        //dd($_POST['userAddress']);
        if(!isset($_POST['userAddress']['1']) || $_POST['userAddress']['1'] == 0){   //判断城市信息是否有值
            $data['city'] = "";
        }else{
            $data['city'] = $_POST['userAddress']['1'];
        }
        if(!isset($_POST['userAddress']['2']) || $_POST['userAddress']['2'] == 0){ //判断区县是否有值
            $data['district'] = "";
        }else{
            $data['district'] = $_POST['userAddress']['2'];
        }
        if(!isset($_POST['userAddress']['3']) || $_POST['userAddress']['3'] == 0){ //判断乡镇是否有值
            $data['township'] = "";
        }else{
            $data['township'] = $_POST['userAddress']['3'];
        }
        //echo "<pre>";
        //dd($data);
        //更改数据到数据库
        $m = \DB::table('address')->where('id', $_GET['id'])->update($data);
        if($m > 0){
            return back()->with('editAdd','success');
        }else{
            return back()->with('editAdd','error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)   //执行修改地址
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delAdd($id)        //删除地址
    {
        //
        \DB::table('address')->delete($id);
        return back()->with("delAdd" , "删除成功");
    }
}
