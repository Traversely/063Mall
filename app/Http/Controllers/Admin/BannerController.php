<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use Intervention\Image\ImageManagerStatic as Image;

class BannerController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $db = \DB::table("banner");
        $list = $db->paginate(5);   //每页5条数据
        return view('admin.banner',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.bannerCreate');
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
        $data['gid'] = $request->gid;
        $data['description'] = $request->description;
        $data['display'] = $request->display;

        if($request->hasFile('picture')){
            $file = $request->file('picture');

            if($file->isValid()){
                $ext = $file->getClientOriginalExtension();
                do{
                    $filename = time().rand(1000,9999).".".$ext;
                }while(file_exists('./uploads/banner/'.$filename));
                $file->move('./uploads/banner/',$filename);

                //$img = Image::make("./uploads/banner/".$filename)->resize(240,390);
                //$img->save("./uploads/banner/".$filename); 
                $data['picture'] = 'uploads/banner/'.$filename;
            }
        }else{
            $data['picture'] = 'uploads/banner/default.jpg';
        }

        $m = \DB::table('banner')->insert($data);
        if($m > 0){
            return back();
        }else{
            return back()->withInput();
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
        $banner = \DB::table('banner')->where('id',$id)->first();
        return view('admin.bannerShow',['banner'=>$banner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display($id)
    {
        //
        $display = \DB::table('banner')->where('id',$id)->value('display');

        if($display == '1'){
            $data['display'] = 0;
        }else{
            $data['display'] = 1;
        }

        $m = \DB::table('banner')->where('id',$id)->update($data);
        if($m > 0){
            return back();
        }else{
            return back();
        }
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
        $data['gid'] = $request->gid;
        $data['description'] = $request->description;
        $data['display'] = $request->display;

        if($request->hasFile('picture')){
            $file = $request->file('picture');

            if($file->isValid()){
                $ext = $file->getClientOriginalExtension();
                do{
                    $filename = time().rand(1000,9999).".".$ext;
                }while(file_exists('./uploads/banner/'.$filename));
                $file->move('./uploads/banner/',$filename);

                //$img = Image::make("./uploads/banner/".$filename)->resize(240,390);
                //$img->save("./uploads/banner/".$filename); 
                $data['picture'] = 'uploads/banner/'.$filename;
                $picture = \DB::table('banner')->where('id',$id)->value('picture');
                if($picture != 'uploads/banner/default.jpg'){
                    unlink($picture);
                }
            }
        }

        $m = DB::table('banner')->where('id',$id)->update($data);
        if($m >= 0){
            return back();
        }else{
            return back()->withInput();
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
        $m = DB::table('banner')->delete($id);
        if($m > 0){
            return back();
        }else{
            return back();
        }
    }
}
