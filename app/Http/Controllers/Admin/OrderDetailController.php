<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderDetailController extends CommonController
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderdetail = \DB::table("orderdetail")->where('id',$id)->first();	
		//var_dump($order);die;
		//return view('admin.orderEdit',['order'=>$order]);
		return view("admin.orderDetailEdit",['orderdetails'=>$orderdetail]);
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
 
		$data=['pay'=>$request->pay,'deliver'=>$request->deliver,'invoice'=>$request->invoice,'invType'=>$request->invType,'invInfo'=>$request->invInfo,'remark'=>$request->remark,'operator'=>$request->operator];
		//var_dump($data);die;
		$order = \DB::table("orderdetail")->where('id',$id)->update($data);
		return redirect('admin/order/');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
