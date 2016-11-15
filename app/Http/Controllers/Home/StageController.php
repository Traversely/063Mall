<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use Gregwar\Captcha\CaptchaBuilder;

class StageController extends CommonController
{
    //执行用户登录
    public function doLogin(Request $request)
    {
        //执行验证码判断
        $code = strtolower($request->input("code"));
        $yanzhengma = strtolower($request->session()->get('phrase'));
        if($code !== $yanzhengma){
            return back()->with("msg","验证码错误！");
        }
        
        //执行登录判断
        $name = $request->input("username");
        $pass = $request->input("pass");
        
        if(strpos($name,"@")){
            $user = \DB::table("user")  //邮箱登录
                ->join('userdetail','user.id','=','userdetail.uid')
                ->where("email",$name)
                ->select('user.*','userdetail.nickName','userdetail.photo')
                ->first();
        }else{  
            $user = \DB::table("user")  //用户名登录
                ->join('userdetail','user.id','=','userdetail.uid')
                ->where("name",$name)
                ->select('user.*','userdetail.nickName','userdetail.photo')
                ->first();
        }
        //dd(date("Y-m-d H:i:s",time()));
        if(!empty($user)){
            //判断密码
            if(md5($pass) == $user->pass){
                //执行激活状态判断
                if($user->active == 0){
                    return back()->with("msg","该帐号未激活,请登录您的邮箱激活此帐号");
                }
                if($user->status == 0){
                    return back()->with("msg","您的帐号已被冻结,不可使用");
                }
                \DB::table("user")->where("id" , $user->id)->update(["lastLogin"=>time()]);
                //dd($aa);
                \Session::set('homeuser' , $user);
                return back();
            }
        }
        return back()->with("msg","帐号或密码错误!");
    }
    
    public function isExist($email)
    {
        $m = \DB::table("user")->where("email" , $email)->first();
        if(isset($m)){
            echo 1;
        }else{
            echo 0;
        }
    }
    
    //加载验证码
    public function getCode()
    {
        $builder = new CaptchaBuilder();
        $builder->build(150,32);
        \Session::set('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
    }
    
    //执行用户退出
    public function dologout(Request $request)
    {
        $request->session()->forget('homeuser');
        return redirect('/');
    }
    
    //执行邮箱验证
    public function doCheckEmail($email)
    {
        $info = \DB::table('user')->where('email', $email)->first();
        if($info){
            echo 0;
        }else{
            echo 1;
        }
    }
    //执行用户名验证
    public function doCheckName($name)
    {
        $info = \DB::table('user')->where('name', $name)->first();
        if($info){
            echo 0;
        }else{
            echo 1;
        }
        
    }
    
    //执行用户邮箱注册
    public function doEmailRegister(Request $request)
    {
        //执行验证码判断
        $code = strtolower($request->input("eCode"));
        $yanzhengma = strtolower($request->session()->get('phrase'));
        if($code != $yanzhengma){
            return back()->with("emailMsg","验证码错误！");
        }
        
        $data = ['name'=>$request->eName , 'pass'=>md5($request->ePass) , 'email'=>$request->eEmail , 'ctime'=>time()];
        
            //$mailResult = $this->sendMail($data['email']);
        //将数据写入数据库
        $m = \DB::table("user")->insertGetId($data);
        if($m > 0){
            \DB::table("userdetail")->insert(['uid'=>$m,'photo'=>'./uploads/photos/home/default.png']);
            //if($mailResult){
                return back()->with('regEmail','注册成功!');
            //}else{
            //    return back()->with('regEmail','注册成功!激活邮件发送失败!');
            //}
        }else{
            return back();
        }
    }


    public function sendMail($email)  
    {  
        $name = '063Mall';  
        $flag = Mail::send('home.email',['name'=>$name],function($message){
            $message ->to('romeo0906@foxmail.com')->subject('测试邮件');  
        });  
        if($flag){  
            return true;  
        }else{  
            return false; 
        }  
    }  

}
