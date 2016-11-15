<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class StdClass{}


class GoodController extends CommonController
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

        $list = DB::table("good")
                ->where('onSale',1)
                ->where('good','like',"%{$_GET['search']}%")
                ->paginate(8);
        foreach($list as $v){
            $brand = DB::table('brand')->where('id',$v->brand)->value('brand');
            $v->brand = $brand;
            $type1 = DB::table('type')->where('id',$v->type1)->value('type');
            $v->type1 = $type1;
            $type2 = DB::table('type')->where('id',$v->type2)->value('type');
            $v->type2 = $type2;
            $type3 = DB::table('type')->where('id',$v->type3)->value('type');
            $v->type3 = $type3;
        }
        return view('admin.good',['list'=>$list,'params'=>$params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $type1 = DB::table('type')->where('pid',0)->lists('type','id');
        $brand = DB::table('brand')->lists('brand','id');
        return view('admin.goodCreate',['type1'=>$type1,'brand'=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax($id)
    {
        //
        $type2 = DB::table('type')->where('pid',$id)->lists('type','id');
        echo json_encode($type2);
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
        $data = $request->except('_token','picture');
        $data['time'] = time();
        $data['sale'] = 0;
        $m = DB::table('good')->insertGetId($data);
        if($m >0){
            return redirect('admin/good/detail/'.$m);
        }else{
           return back()->with('msg','添加商品失败！');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailCreate($id)
    {
        //
        return view('admin.gdetailCreate',['gid'=>$id]);
    }

    /**
     * 实现商品详情添加编辑器中的图片上传
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailUploads(Request $request)
    {
        // 允许上传的文件类型
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        // 获取上传文件的文件名
        $temp = explode(".", $_FILES["file"]["name"]);
        // 获取上传文件的扩展名
        $extension = end($temp);
        // 检查上传文件的格式是否正确
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);
        if ((($mime == "image/gif")    || ($mime == "image/jpeg")    || ($mime == "image/pjpeg")    || ($mime == "image/x-png")    || ($mime == "image/png"))    && in_array($extension, $allowedExts)) {
            // 生成新的文件名
            $name = sha1(microtime()) . "." . $extension;
            // 保存文件到指定路径
            move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/gdescribe/" . $name);
            // 设置响应值
            $response = new StdClass;
            $response->link = "/uploads/gdescribe/" . $name;
            echo stripslashes(json_encode($response));
        }
    }

    /**
     * 执行商品详细信息的添加
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailStore(Request $request)
    {
        //
        if($request->gid > 0){
            $continue = true;
            $data = $request->except('_token','picture');
        }else{
            $continue = false;
            $data = $request->except('_token','picture');
            $data['gid'] = -$data['gid'];
        }

        $m = DB::table('gdetail')->insertGetId($data);

        if($m >0){
            $files = $request->file('picture');
            $picture['gdid'] = $m;
            foreach ($files as $file) {
                if($file->isValid()){
                    $ext = $file->getClientOriginalExtension();
                    do{
                        $filename = time().rand(1000,9999).".".$ext;
                    }while(file_exists('./uploads/gdisplay/'.$filename));
                    $file->move('./uploads/gdisplay/',$filename);

                    $img = Image::make("./uploads/gdisplay/".$filename)->resize(480,480);
                    $img->save("./uploads/gdisplay/".$filename); 
                    $picture['picture'] = 'uploads/gdisplay/'.$filename;
                    $n = DB::table('gpicture')->insertGetId($picture);
                    if($n <= 0){
                        $err = 1;
                    }
                }
            }
            if(isset($err)){
                return back()->with('msg','添加图片失败！');
            }

            $price['maxprice'] = DB::table('gdetail')->where('gid',$data['gid'])->max('price');
            $price['minprice'] = DB::table('gdetail')->where('gid',$data['gid'])->min('price');
            DB::table('good')->where('id',$data['gid'])->update($price);

            if($continue){
                return redirect('admin/good/detail/'.$request->gid)->with('msg','添加成功！');
            }else{
                return redirect('admin/good')->with('msg','添加成功！');
            }
        }else{
            return back()->with('msg','添加商品失败！');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailAjax($id)
    {
        //
        $detail = DB::table('gdetail')
                    ->join('good','gdetail.gid','=','good.id')
                    ->where('gid',$id)
                    ->select('good.good','gdetail.color','gdetail.price','gdetail.stock')
                    ->orderBy('gdetail.color')
                    ->get();
        if(empty($detail)){
            $detail = DB::table('good')
                    ->where('id',$id)
                    ->select('good')
                    ->get();
            $detail[0]->color = '暂无数据！';
            $detail[0]->price = '暂无数据！';
            $detail[0]->stock = '暂无数据！';
        }
        echo json_encode($detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function onSale($id)
    {
        //
        if($id > 0){
            $data['onSale'] = 0;
        }else{
            $data['onSale'] = 1;
            $id = -$id;
        }
        $m = DB::table('good')->where('id',$id)->update($data);
        if($m > 0){
            return back();
        }else{
            return back()->with('msg','修改失败！');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailShow($id)
    {
        //
        $list = DB::table('gdetail')->where('gid',$id)->paginate(8);
        return view('admin.gdetailShow',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pictureAjax($id)
    {
        //
        $picture = DB::table('gpicture')->where('gdid',$id)->lists('picture');
        echo json_encode($picture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailUpdate(Request $request)
    {
        //
        $data['price'] = $request->price;
        $data['stock'] = $request->stock;
        $m = DB::table('gdetail')->where('id',$request->id)->update($data);
        if($m > 0){
            return back();
        }else{
            return back()->with('msg','修改失败！');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailDelete($id)
    {
        //
        $m = DB::table('gdetail')->delete($id);
        if($m >0){
            $pictures = DB::table('gpicture')->where('gdid',$id)->lists('picture');
            DB::table('gpicture')->where('gdid',$id)->delete();
            foreach($pictures as $picture){
                unlink($picture);
            }
            return back();
        }else{
            return back()->with('msg','删除失败！');
        }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if(!isset($_GET['search'])){
            $_GET['search'] = '';
        }
        $params['search'] = $_GET['search'];

        $list = DB::table("good")
                ->where('onSale',0)
                ->where('good','like',"%{$_GET['search']}%")
                ->paginate(8);
        foreach($list as $v){
            $brand = DB::table('brand')->where('id',$v->brand)->value('brand');
            $v->brand = $brand;
            $type1 = DB::table('type')->where('id',$v->type1)->value('type');
            $v->type1 = $type1;
            $type2 = DB::table('type')->where('id',$v->type2)->value('type');
            $v->type2 = $type2;
            $type3 = DB::table('type')->where('id',$v->type3)->value('type');
            $v->type3 = $type3;
        }
        return view('admin.good',['list'=>$list,'params'=>$params]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
