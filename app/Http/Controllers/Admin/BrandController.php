<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!isset($_GET['search'])){
            $_GET['search'] = '';
        }
        $params['search'] = $_GET['search'];

        $list = DB::table('brand')
                ->where('brand','like',"%{$_GET['search']}%")
                ->paginate(8);
        return view('Admin.brand',['list'=>$list,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.brandCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data['brand'] = $request->brand;
        $data['info'] = $request->info;
        $data['popularize'] = $request->popularize;
        $data['display'] = $request->display;
        $m = DB::table('brand')->insert($data);
        if($m > 0){
            return redirect('admin/brand');
        }else{
            return redirect('admin/brand');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $list = DB::table('brand')->where('id',$id)->first();
        return view('admin.brandShow',['list'=>$list]);
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
        $data['brand'] = $request->brand;
        $data['info'] = $request->info;
        $data['popularize'] = $request->popularize;
        $data['display'] = $request->display;
        $m = DB::table('brand')->where('id',$id)->update($data);
        if($m > 0){
            return redirect('admin/brand');
        }else{
            return redirect('admin/brand');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $m = DB::table('brand')->delete($id);
        if($m > 0){
            return redirect('admin/brand');
        }else{
            return redirect('admin/brand');
        }
    }
}
