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
    
    
    <div class="user-main">
        <div class="order-main clearfix_new">
            <h1 style="border:0;text-align:left;"> 我的帐号信息 </h1>
            <div class="mod-user-list" style="border:2px solid #82C92F;">
                <div style="float:left;width:500px;">
                    <form class="form-horizontal" action="" method="post" name="" id="next" style="display:block;margin-top:100px;">
                        <input type="hidden" name="_token" value="<?php echo csrf_token('homereg'); ?>">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-5 control-label">邮箱：</label>
                            <div class="col-sm-5" width="330">
                                <input type="text" class="form-control" name="eCode" id="Email" placeholder="请输入您的邮箱地址" style="border-radius:0px;">
                                <a onclick="getEmail()" id="sendEmail" style="cursor:pointer;position:relative;left:200px;top:-28px;width:100px;height:34px;display:none;">点击发送验证邮件</a>
                                <span id="myerr" style="color:red;position:relative;left:200px;top:-28px;width:100px;height:34px;display:none;">该邮箱未注册</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-5 control-label">校验码：</label>
                            <div class="col-sm-5" width="330">
                                <input type="text" class="form-control" name="eCode" id="emailCode" placeholder="请输入验证码" style="border-radius:0px;">
                                <div id="aaa" style="display:none;"></div>
                            </div>
                        </div>
                        <div class="" style="margin-left:210px;">
                            <button type="button" onclick="emEdit()" disabled id="continue" class="btn btn-primary ERbutton" style="background-color:#36AA3F;width:150px;">下一步</button>
                        </div>
                    </form>
                    
                    <form class="Editform" action="{{ url('home/losePass') }}" method="post" name="" id="emEdit" onsubmit="return myPass()" style="display:none;">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" id="myEmail" name="myEmail" value="">
                        <input type="hidden" name="_token" value="<?php echo csrf_token('homereg'); ?>">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-5 control-label">新密码：</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control checkEmailRegister" name="newPass" id="myPass" placeholder="请设置您的新密码" style="border-radius:0px;">
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
    <form action="" style="display:none;" id="chEmailform" method="get">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="PUT">
    </form>
@endsection
 
@section('myjs')
<script type="text/javascript">
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
    
    $("#Email").blur(function(){
        if($(this).val() != ''){
            $.ajax({
                url:"{{ url('home/loseAjax') }}/"+$("#Email").val(),
                type:"GET",
                //async:false,
                success:function(rel){
                    if(rel == 1){
                        $("#sendEmail").css({display:'block'});
                        $("#myerr").css({display:'none'});
                        $("#myEmail").val($("#Email").val());
                        $("form.Editform").attr("action","{{ url('home/losePass') }}/"+$("#myEmail").val());
                    }else{
                        $("#sendEmail").css({display:'none'});
                        $("#myerr").css({display:'block'});
                    }
                },
                // error:function(rel){
                    // SimplePop.alert("333");
                // },
            });
        }
    });
    
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
    
</script>
@endsection