<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
    //加载登录页面
    public function login()
    {
        return view("admin.login");
    }
    
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
        $name = $request->input("name");
        $pass = $request->input("pass");
        //获取对应用户信息
        $user = \DB::table("admin")->where("name",$name)->first();
        
        if(!empty($user)){
            //判断密码
            if(md5($pass) == $user->pass){
                //存储session跳转页面
                session()->set("adminuser",$user);
                return redirect("admin");
            }
        }
        return back()->with("msg","帐号或密码错误!");
    }
    
    //加载验证码
    public function getCode()
    {
        $builder = new CaptchaBuilder();
        $builder->build(150,32);
        \Session::set('phrase',$builder->getPhrase()); //存储验证码
        return response($builder->output())->header('Content-type','image/jpeg');
    }
    
    //执行退出
    public function logout(Request $request)
    {
        $request->session()->forget('adminuser');
        return redirect("admin/login");
    }
    
}
