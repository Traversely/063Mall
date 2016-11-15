@extends('home.base')

@section('mycss')
    <link rel="stylesheet" href="{{asset('css/home/qikoo-v.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/v3203b5.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/qiku.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/store.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/order.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/qikoo_user.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/widget_address.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/458d9383b5f2765d.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/qikoo_shop.css')}}">
    <style rel="stylesheet" type="text/css">
        .change{
            color:#fff;
            background-color:rgba(93,95,82,0.5);
            position:relative;
            top:48px;
            left:-115px;
            line-height:20px;
            padding:0px 27px;
            -webkit-transition-property: background-color color;
            -webkit-transition-duration: 0.3s;
            -webkit-transition-timing-function: ease;
        }
        .change:hover{
            background-color:rgba(232,237,222,0.8);
        }
        .lnk{
            color:#66a7e8;
        }
        .udl{
            color:#66a7e8;
        }
        .operation-list li h3{
            font-size:15px;
            font-weight:bold;
            color:#999;
        }
    </style>
@endsection

@section('content')
    <script type="text/javascript" src="{{asset('js/home/jQuery-2.1.4.min.js')}}"></script>
    <script type="preload-script" src="{{asset('js/home/utils.js')}}">
    </script>
    <script type="preload-script" src="{{asset('js/home/jq-suggest.js')}}">
    </script>
    <script type="preload-script" src="{{asset('js/home/jq-suggest-client.js')}}">
    </script>
    <script id="tpl_nav" type="text/html">
        
    </script>
    @if( session('read') )
        <script type="text/javascript">
            $(function(){
                SimplePop.alert("{{ session('read') }}");
            });
        </script>
    @endif
    @if( session('pass') )
        <script type="text/javascript">
            $(function(){
                SimplePop.alert("{{ session('pass') }}");
            });
        </script>
    @endif
    @if( session('emailedit') )
        <script type="text/javascript">
            $(function(){
                SimplePop.alert("{{ session('emailedit') }}");
            });
        </script>
    @endif
    @if( session('userphoto') )
        <script type="text/javascript">
            $(function(){
                SimplePop.alert("{{ session('userphoto') }}");
            });
        </script>
    @endif
    <div class="user-body">
        <div class="user-container">
            <div class="user-crumbs m-b-10">
                <a href="/">首页</a> &gt; 我的喜欢
            </div>
            <div class="clearfix_new">
                <div class="user-menu m-r-20">
                    <div class="menu-title">
                        个人中心
                    </div>
                    <div class="menu-list">
                        <a class="menu-item item-active" href="{{ url('home/userInfo') }}" data-monitor="user_myorder_myorder">个人信息</a>
                        <a class="menu-item" href="{{ url('home/myorder') }}" data-monitor="user_myorder_myorder">我的订单</a>
                        <a class="menu-item" href="{{ url('home/myfavourite') }}" data-monitor="user_myfavorite_myfavorite">我的喜欢</a>
                        <a class="menu-item" href="{{ url('home/address') }}" data-monitor="user_address_address">收货地址</a>
                    </div>
                    <div class="menu-title">
                        消息中心
                    </div>
                    <div class="menu-list">
                        <a class="menu-item" href="{{ url('home/message') }}" data-monitor="user_message_message">站内消息</a>
                    </div>
                </div>
                
                <div class="user-main">
                    <div class="order-main clearfix_new">
                        <h1 style="border:0;text-align:left;"> 我的帐号信息 </h1>
                        <div class="mod-user-list" style="border:2px solid #82C92F;">
                            <div style="float:left;">
                                <div class="u-info" style="float:left;padding:15px;width:280px;border:1px solid #e5e5e5;border-bottom:0px;">
                                    <div class="u-main">
                                        <div class="avatar avatar-hover" style="float:left;">
                                            <a class="avatar-img" href="#">
                                                <img src="{{ asset($userInfo->photo) }}" width="110" height="110">
                                            </a>
                                            <a class="change" href="{{ url('home/userPhoto') }}">修改头像</a>
                                        </div>
                                        <div style="clear:both;"></div>
                                        <div class="txt" style="float:right;margin-top:-90px;">
                                            <input id="userNick" type="text" value="{{ $userInfo->nickName }}" style="font-size:14px;color:#444;line-height:26px;width:125px;">
                                            <p><a href="{{ url('home/changeInfo') }}" class="udl" style="line-height:26px;">修改个人资料</a> </p>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>
                                    <div class="u-detail" style="margin-top:15px;">
                                        <h3 style="font-size:14px;font-weight:bold;">最近一次登录：</h3>
                                        <p style="line-height:26px;">{{ date('Y-m-d H:i',$userInfo->lastLogin) }}</p>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                                <div class="aside-mod" style="float:left;border:1px solid #e5e5e5;padding:20px;width:280px;">
                                    <div class="aside-hd clearfix">
                                        <h2 style="font-size:20px;">常用操作</h2>
                                    </div>
                                    <div class="aside-bd">
                                        <ul class="operation-list">
                                            <li>
                                                <h3><img src="{{ asset('uploads/public/home/pass.png') }}" style="margin-top:-6px;"/> 登录密码</h3>
                                                <p style="color:#999;">
                                                    <span class="fr" style="margin-right:-15px;">
                                                        <a class="lnk" id="edit" onclick="edit()" style="cursor:pointer;">修改</a>
                                                    </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;定期修改密码能保护帐号安全
                                                </p>
                                            </li>
                                            <li style="margin-top:6px;">
                                                <h3><img src="{{ asset('uploads/public/home/email.png') }}" style="margin-top:-6px;"/> 登录邮箱</h3>
                                                <p>
                                                    <span class="fr" style="margin-right:-15px;">
                                                        <a onclick="changeEmail()" class="lnk" style="cursor:pointer;">修改</a>
                                                    </span>
                                                    <em class="orange">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $userInfo->email }}</em> 
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div style="float:left;width:500px;">
                                <p style="text-align:center;line-height:30px;color:red;margin-top:80px;">{{ session("msg") }}</p>
                                <form class="form-horizontal" action="{{ url('home/userInfo') }}/{{ $userInfo->id }}" method="post" name="" id="mmEdit" onsubmit="return checkmmEdit()" style="display:block;">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token('editpass'); ?>">
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-md-5 control-label">原密码：</label>
                                        <div class="col-md-7">
                                            <input type="password" class="form-control checkEmailRegister" name="oldPass" id="oldPass" placeholder="请输入您的原密码" style="border-radius:0px;">
                                            <a onclick="next()" style='color:#0082CB;cursor:pointer;float:right;'>忘记密码?点击邮箱找回</a>
                                            <span id="errOldPass" class="errOldInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;密码不能为空！</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-5 control-label">新密码：</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control checkEmailRegister" name="userPass" id="newPass" placeholder="请设置您的新密码" style="border-radius:0px;">
                                            <span id="errNewPass" class="errNewInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;新密码不能为空！</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-5 control-label">确认密码：</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control checkEmailRegister" name="NewSurePass" id="newSurePass" placeholder="请确认您的新密码" style="border-radius:0px;">
                                            <span id="errNewSurePass" class="errInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;请确认新密码！</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-5 control-label">验证码：</label>
                                        <div class="col-sm-4" width="330">
                                            <input type="text" class="form-control" name="eCode" id="mmCode" placeholder="请输入验证码" style="border-radius:0px;">
                                            <img src="{{ url('home/getcode') }}" onclick="this.src='{{url('home/getcode')}}?id='+Math.random();" width="100" height="34" style="position:relative;left:178px;top:-34px;"/>
                                            <span class="errInfo" id="errmmCode" style="display:none;color:red;margin-top:-34px;">&nbsp;&nbsp;&nbsp;请输入验证码！</span>
                                        </div>
                                    </div>
                                    <div class="" style="margin-left:260px;">
                                        <button type="submit"  class="btn btn-primary ERbutton" style="background-color:#36AA3F;margin-right:30px;">修改</button>
                                        <button type="reset" id="register-close" class="btn btn-default">重置</button>
                                    </div>
                                </form>
                                
                                <form class="form-horizontal" action="{{ url('home/changeEmail') }}/{{ $userInfo->id }}" method="post" name="" id="editEmail" onsubmit="return checkEditEmail()" style="display:none;">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token('editEmail'); ?>">
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-md-5 control-label">新邮箱：</label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control checkEmailRegister" name="newEmail" id="newEmail" placeholder="请设置您的新邮箱" style="border-radius:0px;">
                                            <span id="errNewEmail" class="errOldInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;请设置您的新邮箱！</span>
                                        </div>
                                    </div>
                                    <div class="" style="margin-left:260px;">
                                        <button type="submit"  class="btn btn-primary ERbutton" style="background-color:#36AA3F;margin-right:30px;">修改</button>
                                        <button type="reset" id="register-close" class="btn btn-default">重置</button>
                                    </div>
                                </form>
                                
                                <form class="form-horizontal" action="" method="post" name="" id="next" style="display:none;">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token('homereg'); ?>">
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-md-5 control-label">验证方式</label>
                                        <div class="col-md-7">
                                            <input type="text" style="border-radius:0px;margin-top:6px;width:300px;" value="绑定邮箱({{ $userInfo->email }})" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-5 control-label">校验码：</label>
                                        <div class="col-sm-4" width="330">
                                            <input type="text" class="form-control" name="eCode" id="emailCode" placeholder="请输入验证码" style="border-radius:0px;">
                                            <div id="aaa" style="display:none;"></div>
                                            <a onclick="getEmail()" style="cursor:pointer;position:relative;left:170px;top:-28px;width:100px;height:34px;">点击发送验证邮件</a>
                                        </div>
                                    </div>
                                    <div class="" style="margin-left:210px;">
                                        <button type="button" onclick="emEdit()" disabled id="continue" class="btn btn-primary ERbutton" style="background-color:#36AA3F;width:150px;">下一步</button>
                                    </div>
                                </form>
                                
                                <form class="myform" action="{{ url('home/userInfo') }}/{{ $userInfo->id }}" method="post" name="" id="emEdit" onsubmit="return myPass()" style="display:none;">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token('homereg'); ?>">
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-5 control-label">新密码：</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control checkEmailRegister" name="userPass" id="myPass" placeholder="请设置您的新密码" style="border-radius:0px;">
                                            <span id="errMyPass" class="errInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;新密码不能为空！</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-5 control-label">确认密码：</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control checkEmailRegister" name="eSurePass" id="mySurePass" placeholder="请确认您的新密码" style="border-radius:0px;">
                                            <span id="errMySurePass" class="errInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;请确认新密码！</span>
                                        </div>
                                    </div>
                                    <div class="" style="margin-left:210px;">
                                        <button type="submit"  class="btn btn-primary ERbutton" style="background-color:#36AA3F;width:150px;margin-top:">提交</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" style="display:none;" id="chEmailform" method="get">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="PUT">
    </form>
@endsection
 
@section('myjs')
<script type="text/javascript">
    function checkmmEdit(){
        if($('#oldPass').val() == ''){
            $('#errOldPass').css({display:'block'});
            return false;
        }
        
        if($('#newPass').val() == ''){
            $('#errNewPass').css({display:'block'});
            return false;
        }
        
        if($('#newSurePass').val() == ''){
            $('#errNewSurePass').css({display:'block'});
            return false;
        }
        
        if($('#mmCode').val() == ''){
            $('#errmmCode').css({display:'block'});
            return false;
        }
        
        if($('#mmCode').val() != {{ session("phrase") }}){
            $('#errmmCode').css({display:'block'}).html('&nbsp;&nbsp;&nbsp;验证码错误');
            return false;
        }
    }
    
    function myPass(){      //邮箱验证找回密码
        if($('#myPass').val() == ''){
            if($('#errMyPass').val() == ''){
                $('#errMyPass').css({display:'block'});
                return false;
            }
            
            if($('#mySurePass').val() == ''){
                $('#errMySurePass').css({display:'block'});
                return false;
            }
        }
    }
    
    //正则验证新密码格式
    $("#myPass").blur(function(){
        var pass = document.getElementById('myPass').value.trim();
        if($("#myPass").val() == '' ){
            $("#errMyPass").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;新密码不能为空！");
            $("form.myform").attr({onsubmit:'return false'});
        }else{
            reg=/^\S{6,20}$/;
            if(!reg.test(pass)){
                $("#errMyPass").html("&nbsp;&nbsp;&nbsp;6-20个字符(区分大小写,不能带有空格)").css({display:'block'});
                $("form.myform").attr({onsubmit:'return false'});
            }else{
                $("#errMyPass").css({display:'none'});
                $("form.myform").attr({onsubmit:'return myPass()'});
            }
        }
    });
    
    $("#mySurePass").blur(function(){
        if($(this).val() == ''){
            $("#errMySurePass").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;确认密码不能为空！");
            $("form.myform").attr({onsubmit:'return false'});
        }else if($(this).val() != $("#myPass").val() && $("#myPass").val() != ''){
            $("#errMySurePass").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;两次密码不一致!");
            $("form.myform").attr({onsubmit:'return false'});
        }else{
            $("#errMySurePass").css({display:'none'});
            $("form.myform").attr({onsubmit:'return myPass()'});
        }
    });
    
    $("#userNick").blur(function(){
        if($(this).val() != ''){
            if($(this).val() != '{{ $userInfo->nickName }}'){
                $.ajax({
                    url:"{{ url('home/editNick') }}/"+$('#userNick').val(),
                    type:"GET",
                    //async:false,
                    success:function(rel){
                        if(rel == 1){
                            SimplePop.alert("&nbsp;&nbsp;&nbsp;昵称修改成功");
                            //window.location.reload();
                        }else{
                            SimplePop.alert("&nbsp;&nbsp;&nbsp;昵称修改失败");
                        }
                    },
                    // error:function(err){
                        // SimplePop.alert("&nbsp;&nbsp;&nbsp;昵称修改失败");
                    // },
                });
            } 
        }else{
            SimplePop.alert("&nbsp;&nbsp;&nbsp;不可以为空");
            setTimeout("window.location.reload();",2000);
            
        }
    });
    
    $("#oldPass").blur(function(){
        if($(this).val() == ''){
            $("#errOldPass").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;密码不能为空！");
            $("form.mmEdit").attr({onsubmit:'return false'});
        }else{
            if($(this).val() != ''){
            $("#errOldPass").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;密码错误!");
            $("form.mmEdit").attr({onsubmit:'return false'});
                $.ajax({
                    url:"{{ url('home/checkPass') }}/"+$('#oldPass').val(),
                    type:"GET",
                    //async:false,
                    success:function(rel){
                        if(rel == 1){
                            $("#errOldPass").css({display:'none'});
                            $("form.mmEdit").attr({onsubmit:'return false'});
                        }else{
                            $("#errOldPass").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;密码错误!");
                            $("form.mmEdit").attr({onsubmit:'return false'});
                        }
                    },
                    error:function(rel){
                        SimplePop.alert("&nbsp;&nbsp;&nbsp;ajax请求失败!");
                    },
                });
            } 
        }
    });
    
    //正则验证新密码格式
    $("#newPass").blur(function(){
        var pass = document.getElementById('newPass').value.trim();
        if($("#newPass").val() == '' ){
            $("#errNewPass").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;新密码不能为空！");
            $("form.mmEdit").attr({onsubmit:'return false'});
        }else{
            reg=/^\S{6,20}$/;
            if(!reg.test(pass)){
                $("#errNewPass").html("&nbsp;&nbsp;&nbsp;6-20个字符(区分大小写,不能带有空格)").css({display:'block'});
                $("form.mmEdit").attr({onsubmit:'return false'});
            }else{
                $("#errNewPass").css({display:'none'});
                $("form.mmEdit").attr({onsubmit:'return checkmmEdit()'});
            }
        }
    });
    
    $("#newSurePass").blur(function(){
        if($(this).val() == ''){
            $("#errNewSurePass").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;确认密码不能为空！");
            $("form.mmEdit").attr({onsubmit:'return false'});
        }else if($(this).val() != $("#newPass").val() && $("#newPass").val() != ''){
            $("#errNewSurePass").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;两次密码不一致!");
            $("form.mmEdit").attr({onsubmit:'return false'});
        }else{
            $("#errNewSurePass").css({display:'none'});
            $("form.mmEdit").attr({onsubmit:'return false'});
        }
    });
    
    $("#mmCode").blur(function(){
        if($(this).val() == ''){
            $("#errmmCode").css({display:'block'}).html("&nbsp;&nbsp;&nbsp;请输入验证码！");
            $("form.mmEdit").attr({onsubmit:'return false'});
        }else{
            $("#errmmCode").css({display:'none'});
            $("form.mmEdit").attr({onsubmit:'return false'});
        }
    });
    
    function edit(){
        $("#next").css({display:'none'});
        $("#emEdit").css({display:'none'});
        $("#editEmail").css({display:'none'});
        $("#mmEdit").css({display:'block'});
    }
    
    function next(){
        $("#emEdit").css({display:'none'});
        $("#mmEdit").css({display:'none'});
        $("#editEmail").css({display:'none'});
        $("#next").css({display:'block'});
    }
    
    function emEdit(){
        $("#mmEdit").css({display:'none'});
        $("#next").css({display:'none'});
        $("#editEmail").css({display:'none'});
        $("#emEdit").css({display:'block'});
    }
    
    var watch = function(){
        var txt = inp.value;
        //div.innerHTML = txt;
        //alert(txt);
        if(txt == div.innerHTML){
            $("#continue").attr('disabled',false);
        }else{
            $("#continue").attr('disabled',true);
        }
    }
    var div = document.getElementById("aaa");
    var inp = document.getElementById("emailCode");
    if(!+[1,]){
        inp.onpropertychange = watch;
    }else{
        inp.oninput = watch;
    }
    
    function getEmail(){
        var code = Math.floor(Math.random()*9000)+1000;
        SimplePop.alert("您的验证码为 : "+code);
        div.innerHTML = code;
    }
    
    function changeEmail(){
        SimplePop.prompter("请输入密码",{ type: "confirm", 
            confirm: function(msg){
                $.ajax({
                    url:"{{ url('home/checkPass') }}/"+msg,
                    type:"GET",
                    //async:false,
                    success:function(rel){
                        if(rel == 1){
                            $("#next").css({display:'none'});
                            $("#emEdit").css({display:'none'});
                            $("#mmEdit").css({display:'none'});
                            $("#editEmail").css({display:'block'});
                        }else{
                            SimplePop.alert("密码输入错误");
                        }
                    },
                    error:function(rel){
                        SimplePop.alert("密码错误");
                    },
                });
            }
        });
    }
    
    function checkEditEmail(){
        if($('#newEmail').val() == ''){
            $('#errNewEmail').css({display:'block'});
            return false;
        }
    }
    
    $("#newEmail").blur(function(){
        if($("#newEmail").val() != '' ){
            //正则验证邮箱格式
            var email = document.getElementById('newEmail').value.trim();    
            reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            if(!reg.test(email)){
                $("#errNewEmail").html("&nbsp;&nbsp;&nbsp;对不起，您输入的邮箱格式不正确!").css({display:'block'});
                alert("aaa");
                $("#editEmail").attr({onsubmit:'return false'});
                //return false;
            }else{
                $("#errNewEmail").css({display:'none'});
                $("#editEmail").attr({onsubmit:'return true'});
                //ajax判断邮箱是否被使用
                $.ajax({
                    url:"{{ url('home/checkEmail') }}/"+$('#newEmail').val(),
                    type:"GET",
                    //async:false,
                    success:function(rel){
                        if(rel == 0){
                            $("#errNewEmail").html("&nbsp;&nbsp;&nbsp;该邮箱已注册").css({display:'block'});
                            $("#editEmail").attr({onsubmit:'return false'});
                        }else{
                            $("#editEmail").attr({onsubmit:'return true'});
                        }
                    },
                    // error:function(err){
                        // alert("Ajax请求失败!");
                    // },
                });
            }
            
            //ajax判断邮箱是否被使用
            // $.ajax({
                // url:"{{ url('home/checkEmail') }}/"+$('#newEmail').val(),
                // type:"GET",
                // //async:false,
                // success:function(rel){
                    // if(rel == 0){
                        // $("#errNewEmail").html("&nbsp;&nbsp;&nbsp;该邮箱已注册").css({display:'block'});
                        // $("#editEmail").attr({onsubmit:'return false'});
                    // }else{
                        // $("#editEmail").attr({onsubmit:'return false'});
                    // }
                // },
                // // error:function(err){
                    // // alert("Ajax请求失败!");
                // // },
            // });
        }
        
    });
</script>
@endsection