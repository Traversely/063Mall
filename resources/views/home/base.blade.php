<!DOCTYPE html>
<html>
	<head>
		<title>063商城</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="edge">
		<meta name="renderer" content="webkit">
		<meta property="wb:webmaster" content="82757f177989599b">
		<meta name="renderer" content="webkit">

		<link rel="stylesheet" href="{{asset('css/home/bootstrap.min.css')}}">
		<link rel="shortcut icon" href="{{asset('uploads/public/home/favicon.ico')}}">
		<link rel="stylesheet" href="{{asset('css/home/unknown.css')}}">
        <link rel="stylesheet" href="{{asset('css/home/simplepop.css')}}">
        <link rel="stylesheet" href="{{asset('css/home/main.css')}}">
		@yield('mycss')

		<!--[if lt IE 9]>
		    <script src="{{ asset('js/home/htmlshiv.min.js')}}">
		</script>
		<![endif]-->
        <script src="{{asset('js/home/simplepop.js')}}"></script>
		<script src="{{asset('js/home/jQuery-2.1.4.min.js')}}"></script>
		<script async="" src="{{asset('js/home/analytics.js')}}"></script>
		<script type="text/javascript" async="" src="{{asset('js/home/mv.js')}}"></script>
		<script type="text/javascript" async="" src="{{asset('js/home/mba.js')}}"></script>
		<script type="text/javascript" async="" src="{{asset('js/home/mvl.js')}}"></script>
		<script type="preload-script" src="{{asset('js/home/utils.js')}}"></script>
		<script type="preload-script" src="{{asset('js/home/jq-suggest.js')}}"></script>
		<script type="preload-script" src="{{asset('js/home/jq-suggest-client.js')}}"></script>
		<script type="text/javascript" async="async" charset="utf-8" src="{{asset('js/home/zh_cn.js')}}" data-requiremodule="lang"></script>

		<style type="text/css">
		    .rtype{
		        font-size:16px;
		        background-color:#E8EDD3;
		        margin-left:-14px;
		        padding:16px 30px;
		        border-top:1px solid #DEE8B9;
		        border-bottom:1px solid #DEE8B9;
		        border-right:2px solid #DEE8B9;
		        cursor:pointer;
		    }
		</style>

	</head>
		<body id="body">
		@if(session("msg"))
		    <script type="text/javascript">
		        $(function(){
		            $("div.modal").modal({backdrop:'static'});
		        });
		    </script>
		@endif
        @if( session('done') )
            <script type="text/javascript">
                $(function(){
                    SimplePop.alert("{{ session('done') }}");
                });
            </script>
        @endif
        @if(session("emailMsg"))
		    <script type="text/javascript">
		        $(function(){
                    $("div.login-block").css({display:'none'});
                    $("div.register-block").css({display:'block'});
		            $("div.modal").modal({backdrop:'static'});
		        });
		    </script>
		@endif
        
        @if(session("regEmail"))
		    <script type="text/javascript">
		        $(function(){
		            SimplePop.alert("{{ session('regEmail') }}");
		        });
		    </script>
		@endif
		<!-- modal静态框 -->
		<div class="modal" role="dialog" aria-labelledby="gridSystemModalLabel">
		    <div class="modal-dialog" role="document">
		        <div class="modal-content" style="border-radius:0px;background-color:#F0F5DE;margin-top:100px;">
		            <div class="modal-header">
		                <h4 class="modal-title" id="gridSystemModalLabel" style="color:green;font-weight:bold;font-family:Arail;"></h4>
		            </div>
		            <div class="modal-body">
		                <div class="container-fluid">
		                    <div class="row login-block">
		                        <div class="col-md-12">
		                            <p style="text-align:center;line-height:30px;color:red;">{{ session("msg") }}</p>
		                            <form class="form-horizontal" action="{{ url('home/dologin') }}" method="post" name="login" onsubmit="return doLogin()">
		                                <input type="hidden" name="_token" value="<?php echo csrf_token('homelogin'); ?>" />
		                                <div class="form-group">
		                                    <label for="inputEmail3" class="col-sm-2 control-label">账号：</label>
		                                    <div class="col-sm-10">
		                                        <input type="text" class="form-control" name="username" id="inputName" placeholder="手机号/用户名/邮箱" style="border-radius:0px;">
		                                        <span id="name" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;用户名不能为空！</span>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <label for="inputPassword3" class="col-sm-2 control-label">密码：</label>
		                                    <div class="col-sm-7">
		                                        <input type="password" class="form-control" name="pass" id="inputPass" placeholder="请输入您的密码" style="border-radius:0px;">
		                                        <span id="pass" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;密码不能为空！</span>
		                                    </div>
                                            <a href="{{ url('home/losePass') }}" style='color:#0082CB;line-height:34px;cursor:pointer;' id="losePass">忘记密码? 点击找回</a>
		                                </div>
		                                <div class="form-group">
		                                    <label for="inputPassword3" class="col-sm-2 control-label">验证码：</label>
		                                    <div class="col-sm-7" width="330">
		                                        <input type="text" class="form-control" name="code" id="inputCode" placeholder="请输入验证码" style="border-radius:0px;">
		                                        <img src="{{ url('home/getcode') }}" onclick="this.src='{{url('home/getcode')}}?id='+Math.random();" width="100" height="34" style="position:relative;left:320px;top:-34px;"/>
		                                        <span id="code" style="display:none;color:red;margin-top:-34px;">&nbsp;&nbsp;&nbsp;请输入验证码！</span>
		                                    </div>
		                                </div>
		                                <div class="modal-footer">
                                            <a href='#' style='color:#0082CB;margin-right:240px;' onclick='return outerRegister()'>没有帐号?注册一个</a>
		                                    <button type="button" id="login-close" class="btn btn-default" data-dismiss="modal">关闭</button>
		                                    <button type="submit" class="btn btn-primary" style="background-color:#36AA3F;">登录</button>
		                                </div>
		                            </form>
		                        </div>
		                    </div>
                            
		                    <div class="row register-block" style="display:none;">
		                        <div class="col-md-12" id="email-reg" style="float:left;">
		                            <p style="text-align:center;line-height:30px;color:red;">{{ session("emailMsg") }}</p>
		                            <form class="form-horizontal ERform" action="{{ url('home/emailRegister') }}" method="post" name="" onsubmit="return doCheckER()">
		                                <input type="hidden" name="_token" value="<?php echo csrf_token('homereg'); ?>">
		                                <div class="form-group">
		                                    <label for="inputEmail3" class="col-sm-3 control-label">邮箱：</label>
		                                    <div class="col-sm-9">
		                                        <input type="text" class="form-control checkEmailRegister" name="eEmail" id="eEmail" placeholder="请输入您的常用邮箱" style="border-radius:0px;" onblur="return IsEmail()"/>
                                                <span id="errEmail" class="errInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;邮箱不能为空！ <a href="http://email.163.com/" target="_blank" style='color:#0082CB;'>没有邮箱?</a></span>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <label for="inputEmail3" class="col-sm-3 control-label">用户名：</label>
		                                    <div class="col-sm-9">
		                                        <input type="text" class="form-control checkEmailRegister" name="eName" id="eName" placeholder="字母开头，4-16位：字母、数字或下划线" style="border-radius:0px;">
		                                        <span id="errName" class="errInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;用户名不能为空！</span>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <label for="inputPassword3" class="col-sm-3 control-label">密码：</label>
		                                    <div class="col-sm-9">
		                                        <input type="password" class="form-control checkEmailRegister" name="ePass" id="ePass" placeholder="6-20个字符(区分大小写)" style="border-radius:0px;">
		                                        <span id="errPass" class="errInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;密码不能为空！</span>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <label for="inputPassword3" class="col-sm-3 control-label">确认密码：</label>
		                                    <div class="col-sm-9">
		                                        <input type="password" class="form-control checkEmailRegister" name="eSurePass" id="eSurePass" placeholder="请再次输入密码" style="border-radius:0px;">
		                                        <span id="errSurePass" class="errInfo" style="display:none;color:red;">&nbsp;&nbsp;&nbsp;请确认密码！</span>
		                                    </div>
		                                </div>
		                                <div class="form-group">
		                                    <label for="inputPassword3" class="col-sm-3 control-label">验证码：</label>
		                                    <div class="col-sm-6" width="330">
		                                        <input type="text" class="form-control" name="eCode" id="eCode" placeholder="请输入验证码，不区分大小写" style="border-radius:0px;">
		                                        <img src="{{ url('home/getcode') }}" onclick="this.src='{{url('home/getcode')}}?id='+Math.random();" width="100" height="34" style="position:relative;left:288px;top:-34px;"/>
		                                        <span class="errInfo" id="errCode" style="display:none;color:red;margin-top:-34px;">&nbsp;&nbsp;&nbsp;请输入验证码！</span>
		                                    </div>
		                                </div>
		                                <div class="modal-footer">
                                            <a href='#' style='color:#0082CB;margin-right:140px;' onclick='return outerLogin()'>已有帐号?前去登录</a>
		                                    <button type="button" id="register-close" class="btn btn-default" data-dismiss="modal">关闭</button>
		                                    <button type="submit" class="btn btn-primary ERbutton" style="background-color:#36AA3F;">注册</button>
		                                </div>
		                            </form>
		                        </div>
                                
		                        <label class="col-sm-12" style="text-align:right;">
		                            <span ><input class="quc-checkbox" type="checkbox" name="is_agree" checked id="is_agree" data-name="agreeLicence" style="margin-top:-3px;"></span>
		                            <span style="color:#959393;">
		                                我已经阅读并同意
		                                <a class="quc-link" href="http://i.360.cn/pub/protocol.html" target="_blank">《063用户服务条款》</a>
		                            </span>
		                        </label>
		                        
		                    </div>
		                </div>
		            </div>
		        </div>
				<!-- /.modal-content -->
		    </div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<div class="mod-header">
			<div class="topbox" id="gotop">
				<div class="top-container">
					<ul>
						<li class="topbox-item leftitem" style="margin-left:-10px">
							<a data-monitor="home_top_buy" target="_blank" href="http://mall.360.com/help/show?id=helpcontent_14f1b541d8b87874021d0f6185fe7376">企业采购</a>
						</li>
						<li class="topbox-item leftitem">
							<a data-monitor="home_top_help" target="_blank" href="http://mall.360.com/help">帮助中心</a>
						</li>
						<li class="topbox-item leftitem">
							<a data-monitor="home_top_collect" class="js-connect" href="">收藏本站</a>
						</li>
						<li class="topbox-item leftitem">
							<a data-monitor="home_top_in" href="http://mall.360.com/help/product" target="_blank">商品入驻</a>
						</li>
						<li class="topbox-item leftitem">
							<a data-monitor="home_top_old" href="http://watch.mall.360.com/apply" target="_blank">老人手环申请</a>
						</li>
						<li class="topbox-item leftitem">
							<a data-monitor="home_top_app" target="_blank" href="http://mall.360.com/xia/zai" class="telshop"><i></i>手机360商城</a>
						</li>
						<li class="topbox-item rightitem" style="margin-right:-10px">

							<a data-monitor="home_top_order" href="{{url('home/myorder')}}" target="_blank">我的订单</a>

						</li>
						<li class="topbox-item rightitem hassx">
							<a href="http://mall.360.com/f" target="_blank" data-monitor="home_top_fcode">F码购买</a>
						</li>
		                <li class="topbox-item rightitem navloginbox">
		                    @if( ! session("homeuser") )
		                    <div class="loginbefore nloginWrap" style="display: block;">
		                        <span id="login" style="cursor:pointer;line-height:36px;color:#23AC38;">登录&nbsp;&nbsp;&nbsp;</span>
		                        <span id="register" style="cursor:pointer;line-height:36px;color:#23AC38;">注册&nbsp;&nbsp;&nbsp;</span>
		                    </div>
		                    @else
		                    <div class="loginafter loginWrap" style="display: block;">
		                        <span class="top-uname popUsername">
									<img src="{{ asset(session('homeuser')->photo) }}" class="img-circle" style="width:30px;margin-right:8px;"/>{{ session("homeuser")->nickName == "" ? session("homeuser")->name : session("homeuser")->nickName }}</span>
		                        <div class="popbox">
		                            <a class="top-uname popUsername">{{ session("homeuser")->nickName == "" ? session("homeuser")->name : session("homeuser")->nickName }}</a>
		                            <ul class="topuserbox">
                                        <span style="border:1px solid #7ABD2C;border-radius:50%;width:16px;height:16px;float:right;position:relative;top:145px;left:-26px;background:#82C92F"><span class="notice" style="margin-left:3px;margin-top:-4px;color:#fff;"></span></span>
		                                <li><a href="{{ url('home/myorder') }}" target="_blank">我的订单</a></li>
										<li><a href="{{ url('home/userInfo') }}" target="_blank" >账号设置</a></li> 
										<li><a href="{{ url('home/myfavourite') }}" target="_blank">我的喜欢</a></li>
										<li><a href="{{ url('home/address') }}" target="_blank">收货地址</a></li>
										<li><a href="{{ url('home/message') }}" target="_blank">站内消息</a></li>
										<li><a href="{{ url('home/dologout') }}" >退出登录</a></li>
		                            </ul>
		                        </div>
		                    </div>
		                    @endif
						</li>
					</ul>
				</div>
			</div>
			<div class="top-container">
				<div class="header-logo">
					<a class="sellogo" href="http://alalei.com" data-monitor="home_title_logo">
						<img src="{{ asset('uploads/public/home/logo.png') }}">
					</a>
				</div>
				<div class="header-tools">
					<div class="suggest-box">
						<form action="{{url('home/good/list/0')}}" method="get">
							<input type="text" id="__mall_search_kw__" class="suggest" name="search" style="height:42px"><input type="submit" value="" class="search-btn" id="__mall_search_btn__" data-monitor="home_search_button">
						</form>
						<p class="searchkey">
							<a href="http://mall.360.com/ac/jingxuandianjing0725" target="_blank">电竞配件低至5折</a>
							<a href="http://mall.360.com/ac/jimiwupingdianshineigou" target="_blank">享受电影时光</a>
							<a href="http://mall.360.com/ac/zhinengchuxing0713" target="_blank">智能出行伴侣</a>
						</p>
					</div>
					<div class="topshopcart carthas">
						<a href="{{url('home/order/shopcar')}}" target="_blank" class="header-cart" data-monitor="home_title_shopcart">
							<i class="icon">
							</i>我的购物车<span class="cart-size">(1)</span>
						</a>
						<div class="header-cart-popup">
							<div class="cart-tips">
								正在加载购物车...
							</div>
							<div class="cart-info">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="navbox">
				<div class="top-container">
					<ul class="navbar column-list clearfix" id="typeBar">
						<li class="top-item topfirst">
							<a data-monitor="home_fenlei_allgoods" href="http://alalei.com/home/good/list/0?search=" target="_blank">全部智能酷品</a>
						</li>
					</ul>
					<div class="navad">
                        <script charset="Shift_JIS" src="http://chabudai.sakura.ne.jp/blogparts/honehoneclock/honehone_clock_tr.js"></script>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		$.ajax({
			url:'{{url('home/typeBar/ajax')}}',
			type:'get',
			dataType:'json',
			success:function(msg){
				for(var i=1; i<=msg.length; i++){
					var item = '<li class="top-item" data-type="'+i+'"><a href="http://alalei.com/home/good/list/'+msg[i-1].id+'" data-monitor="home_title_goods'+i+'" target="_blank">'+msg[i-1].type+'</a></li>';
					$('#typeBar').append(item);
				}
			}
		})
		</script>
		@section('content')
		    页面主内容区
		@show

		<div class="mod-footer">
			<div class="foot-bannerw">
				<div class="foot-banner clearfix">
					<div class="banner-item">
						<i class="icon1">7</i>7天无理由退货
					</div>
					<div class="banner-item">
						<i class="icon2">15</i>15天免费换货
					</div>
					<div class="banner-item">
						<i class="icon3">包</i>满99元包邮<span style="font-size:12px"></span>
					</div>
				</div>
			</div>
			<div class="foot-containerw">
				<div class="foot-container clearfix">
					<dl class="foot-con">
						<dt data-monitor="home_foot_freshman">帮助中心 </dt>
						<dd data-monitor="home_help_freshman">
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_32c2c1641fce863c6644f3b0586b98ab" rel="nofollow">用户注册</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_76072e16da4630f693343cafeecb5ba7" rel="nofollow">用户登录与密码找回</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_5e06b37bfc5656aed67b5752f2d7277e" rel="nofollow">购买指南</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_5cee349b1e43e02edaf7000e7c48133c" rel="nofollow">支付方式</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_b9b28247bc968beae4fbfedea0a2351d" rel="nofollow">配送与说明</a>
						</dd>
					</dl>
					<dl class="foot-con">
						<dt data-monitor="home_foot_help">售后服务 </dt>
						<dd data-monitor="home_help_help">
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_52efb0302e80307378d75a52ad77dcfe" rel="nofollow">7 日无理由退货</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_39b7f4bf73e2cda4f61f7b446e9a4307" rel="nofollow">质量问题 15 日内换货</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_23c08f5b301ff1a516b9e3efab21b4c1" rel="nofollow">保修条款</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_cb7bcabc741d372350d7fcceefbba3bf" rel="nofollow">服务流程</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_cd2440c9bbb1d5ff8b5d7aefbeda45e0" rel="nofollow">安迷之家</a>
						</dd>
					</dl>
					<dl class="foot-con">
						<dt data-monitor="home_foot_guide">特色服务 </dt>
						<dd data-monitor="home_help_guide">
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_c8f1421544bce489096c17a24923e27c" rel="nofollow">F码通道</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_3376b002ed5680d84f8147660ed3638f" rel="nofollow">免费试用</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_073f7b9ffce194e182bd931873f787fe" rel="nofollow">360 生态</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_7c21f9ced3b7726504e2a05a2b92b1c8" rel="nofollow">一元夺宝</a>
						</dd>
					</dl>
					<dl class="foot-con">
						<dt data-monitor="home_foot_tuiguang">推广合作 </dt>
						<dd data-monitor="home_help_try">
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_ff0d456a829c36f2f0580431b69fe913" rel="nofollow">商品入驻</a>
						</dd>
						<dd>
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_3f81f1296dfcb9a034a0ca653864b9ae" rel="nofollow">大客户采购</a>
						</dd>
					</dl>
					<dl class="foot-con">
						<dt data-monitor="home_foot_try">关注360商城 </dt>
						<dd data-monitor="home_help_try">
							<a target="_blank" href="http://mall.360.com/help/show?id=helpcontent_18959af0598dbe134c057f211ba0c583" rel="nofollow">360商城大事记</a>
						</dd>
					</dl>
					<dl class="foot-con contactus">
						<dt>联系我们  </dt>
						<dd class="servicebox">
							<a href="" onclick="showServiceSelector(); return false" class="inline-kefu">
								<img src="{{ asset('uploads/public/home/t019c3c42d7b0ea4f41.png') }}">
							</a>
							<a href="" target="_blank" class="weixin">
								<img src="{{ asset('uploads/public/home/t0113493aa732f72837.png') }}">
								<span class="wxtips">
									<img src="{{ asset('uploads/public/home/t01d06b994b8798623c.jpg') }}">
								</span>
							</a>
							<a class="weibo" data-monitor="home_foot_weibo" href="http://weibo.com/qikoo360" target="_blank">
								<img src="{{ asset('uploads/public/home/t0128093bd494ffc7e9.png') }}">
								<span class="wxtips">
									<img src="{{ asset('uploads/public/home/t013f6db48422a373d6.jpg') }}">
								</span>
							</a>
						</dd>
					</dl>
				</div>
			</div>
			<div class="footer-copyright">
				 063商城 2016-2016 阿拉蕾小组版权所有 京ICP备********号 京公网安备************号
			</div>
		</div>
		<div class="slidebar" id="slidebar">
			<ul>
				<li class="rfeedback">
					<a target="_blank" href="http://mall.360.com/feedback" data-monitor="right_fankui_click">用户体验</a>
				</li>
				<li class="rtips rWeChat">
				<a href="">微信关注</a>
				<div class="rtipscont rWeChattips">
					<span class="arrowr-bg"></span>
					<span class="arrowr"></span>
					<img src="{{ asset('uploads/public/home/t01d06b994b8798623c.jpg') }}">
					<p class="tiptext">
						扫码关注官方微信<br>
						先人一步知晓促销活动
					</p>
				</div>
				</li>
				<li class="rtips rstore">
				<a href="">手机商城</a>
				<div class="rtipscont rstoretips" style="opacity: 0; left: -210px;">
					<span class="arrowr-bg"></span>
					<span class="arrowr"></span>
					<img src="{{ asset('uploads/public/home/t013df41dbfac4d5924.jpg') }}">
					<p class="tiptext">
						客户端首次登录<span>送188元现金券礼包</span>
					</p>
				</div>
				</li>
				<li class="topback" style="visibility: hidden;">
					<a data-monitor="right_top_click" href="" class="gotop">返回顶部</a>
				</li>
			</ul>
		</div>
		<div id="serviceSelectorMask"></div>
		<div class="fixed dialog" id="serviceSelector">
			<span class="icon close" onclick="hideServiceSelector()"></span>
			<p class="title">
				产品咨询
			</p>
			<p class="description">
				咨询时间 <em>8:00-22:00</em>
			</p>
			<ul class="flex">
				<li class="phone" onclick="openNtalker(true)">360手机&amp;配件 </li>
				<li class="watch" onclick="openNtalker()">360儿童手表 </li>
				<li class="recorder" onclick="openNtalker()">360行车记录仪 </li>
				<li class="camera" onclick="openNtalker()">360智能摄像头 </li>
				<li class="more" onclick="openNtalker()">其他产品</li>
			</ul>
			<div class="bg-shadow">
			</div>
		</div>
		@yield('myjs')

		<script src="{{ asset('js/home/jquery.lazyload.js') }}"></script>
		<script src="{{ asset('js/home/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/home/qikoo-v.js') }}"></script>
		<script src="{{ asset('js/home/jsstorage.js') }}"></script>

		<script>
		    var qhPassIntv = setInterval(function () {
		        if (window.QHPass == undefined) return;
		        clearInterval(qhPassIntv);
		        // 小能默认参数
		        window.NTKF_PARAM = {
		            siteid: 'kf_9758',
		            settingid: 'kf_9758_1431680295244',
		            uid: null,
		            uname: null,
		            itemid: '', // 商品ID，商品详情页用
		            orderid: '', // 订单ID，支付页用
		            orderprice: '', // 订单总价，支付页用
		            isvip: '0',
		            userlevel: ''
		        };
		        QHPass.getUserInfo(function (data) {
		            NTKF_PARAM.uid = data.qid;
		            NTKF_PARAM.uname = data.username;
		            $.getScript("{{ asset('js/home/ntkfstat.js') }}");
		        }, function (err) {
		            $.getScript("{{ asset('js/home/ntkfstat.js') }}");
		        });
		    }, 50);
		    function showServiceSelector() {
		        $('#serviceSelectorMask').show();
		        $('#serviceSelector').show();
		    }
		    function hideServiceSelector() {
		        $('#serviceSelector').hide();
		        $('#serviceSelectorMask').hide();
		    }
		    function openNtalker(isPhoneBusiness) {
		        NTKF.im_openInPageChat(isPhoneBusiness ? 'kf_9758_1459242784970' : 'kf_9758_1431680295244');
		        hideServiceSelector();
		    }
		</script>
		<script>
		    var _mvq=window._mvq||[];window._mvq=_mvq,_mvq.push(["$setAccount","m-251506-0"]),_mvq.push(["$logConversion"]),function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="https:"==document.location.protocol?"{{asset('js/home/mvl.js')}}":"{{asset('js/home/mvl.js')}}";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)}()</script>
		<style>
			#page_mall360footer{overflow:visible}
		</style>
		<input type="hidden" class="qtoken" name="qtoken" value="">
		<input type="hidden" class="real_qtoken" name="real_qtoken" value="">
		<input type="hidden" class="qtokentimestamp" name="qtokentimestamp" value="">
		<input type="hidden" class="sb_param" name="sb_param" value="41dd2715c7279267e03754dce17f8391">

		<!--[if lte IE 6]>
		    <script src="{{asset('/DD_belatedPNG_0.0.8a.js')}}">
		</script>
		    <script>DD_belatedPNG.fix("div, ul, img, li, input, a, span, i")</script>
		<![endif]-->

		<script>
			$.getScript("{{asset('js/home/monitor-8e133f74.js')}}",function(){monitor.data.getTrack=function(){var e=document.cookie.match(/(^| )utm_source=([^;]*)(;|$)/),t=e?e[2]:"";return{b:monitor.util.getBrowser(),c:monitor.util.getCount(),r:monitor.util.getReferrer(),fl:monitor.util.getFlashVer(),utmsrc:t}},monitor.setProject("360_qikoo").getTrack().getClickAndKeydown(),$("body").on("click","[data-monitor]",function(){var e=$(this).data("monitor")+"",t=e.split("_");if(t.length!=3)return;$.each(t,function(e,n){t[e]=n});var n=location.protocol+"//s.360.cn/mall360/clk.htm?page="+t[0]+"&board="+t[1]+"&place="+t[2]+"&guid="+monitor.util.getGuid()+"&port=pc";$.ajax({dataType:"jsonp",url:n})})})
		</script>
		<script src="{{ asset('js/home/mall_monitor.js') }}">
		</script>
		<script type="text/javascript"> 
		//站内信提示图标ajax请求
		@if((null == session('homeuser'))?'0':'1')
            $.ajax({
                type:'GET',
                url:'{{url("home/notice").'/'.session('homeuser')->id}}',
                //dataType:'json',
                success:function(rel){
                    if(rel != 0){
                        $("span.notice").html(rel);
                    }else{
                        $("ul.topuserbox span").remove();
                    }
                }
            });
        @endif

		    $(window).load(function(){
			    (function(i,s,o,g,r,a,m){
			    	i['GoogleAnalyticsObject']=r;
			    	i[r]=i[r]||function(){
			    		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();
			    		a=s.createElement(o),m=s.getElementsByTagName(o)[0];
			    		a.async='async';
			    		a.src=g;
			    		m.parentNode.insertBefore(a,m)}
			    )
			    (window,document,'script','//alalei.com/js/home/analytics.js','ga');
			    ga('create', "UA-63895592-1", 'auto');
			    ga('set', '&uid', '');
			    ga('send', 'pageview');
		    });
		</script>

		<script type="text/javascript">
		    $(function(){
		        //登录模态框调用
		        $("#login").click(function(){
		            $("div.login-block").css({display:'block'});
		            $("#gridSystemModalLabel").html("用户登录");
		            $("div.register-block").css({display:'none'});
		            $("div.modal").modal({backdrop:'static'});
		            
		        });
		        
		        //加载邮箱注册模态框
		        $("#register").click(function(){
		            $("div.register-block").css({display:'block'});
		            $("#gridSystemModalLabel").html("用户注册");
		            $("div.login-block").css({display:'none'});
		            $("div.modal").modal({backdrop:'static'});
		        });
		        //加载手机注册模态框


		        //登录框信息不为空时验证
		        $("#inputName").blur(function(){
		            if($(this).val() != ''){
		                $('#name').css({display:'none'});
		            }
		        });
		        $("#inputPass").blur(function(){
		            if($(this).val() != ''){
		                $('#pass').css({display:'none'});
		            }
		        });
		        $("#inputCode").blur(function(){
		            if($(this).val() != ''){
		                $('#code').css({display:'none'});
		            }
		        });
		        
		        //登录后鼠标移入事件
		        $("#userinfo").mouseover(function(){
		            $("div.popbox").slideDown("normal");
		        });
		        $("div.popbox").mouseleave(function(){
		            $(this).slideUp("fast");
		        });
		        
		        
		        
		    });
		    
		    //登录输入框内容为空时验证
		    function doLogin(){
		        if($('#inputName').val() == ''){
		            $('#name').css({display:'block',fontFamily:'微软雅黑'});
		            return false;
		        }
		        
		        if($('#inputPass').val() == ''){
		            $('#pass').css({display:'block',fontFamily:'微软雅黑'});
		            return false;
		        }
		        
		        if($('#inputCode').val() == ''){
		            $('#code').css({display:'block',fontFamily:'微软雅黑'});
		            return false;
		        }
		    }
            
/* ========================= 邮箱注册表单提交验证 (输入框为空时)=============================*/    
            function doCheckER(){
                //邮箱验证
                if($("#eEmail").val() == '' ){
                    $("#errEmail").css({display:'block'});
                    return false;
                }
                //用户名验证
                if($("#eName").val() == '' ){
                    $("#errName").css({display:'block'});
                    return false;
                }
                //密码验证
                if($("#ePass").val() == '' ){
                    $("#errPass").css({display:'block'});
                    return false;
                }
                //确认密码验证
                if($("#eSurePass").val() == '' ){
                    $("#errSurePass").css({display:'block'});
                    return false;
                }
                //验证码验证
                if($("#eCode").val() == '' ){
                    $("#errCode").css({display:'block'});
                    return false;
                }
            }
            
            //ajax判断邮箱是否已被注册
            $("#eEmail").blur(function(){
                if($("#eEmail").val() != '' ){
                    //正则验证邮箱格式
                    var email = document.getElementById('eEmail').value.trim();    
                    reg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                    if(!reg.test(email)){
                        $("#errEmail").html("&nbsp;&nbsp;&nbsp;对不起，您输入的邮箱格式不正确!").css({display:'block'});
                        $("form.ERform").attr({onsubmit:'return false'});
                    }else{
                        $("#errEmail").css({display:'none'});
                        $("form.ERform").attr({onsubmit:'return doCheckER()'});
                    }
                    
                    //ajax判断邮箱是否被使用
                    $.ajax({
                        url:"{{ url('home/checkEmail') }}/"+$('#eEmail').val(),
                        type:"GET",
                        //async:false,
                        success:function(rel){
                            if(rel == 0){
                                $("#errEmail").html("&nbsp;&nbsp;&nbsp;该邮箱已注册， <a href='#' style='color:#0082CB;' onclick='return outerLogin()'>前去登录</a>").css({display:'block'});
                                $("form.ERform").attr({onsubmit:'return false'});
                            }else{
                                $("form.ERform").attr({onsubmit:'return doCheckER()'});
                            }
                        },
                        // error:function(err){
                            // alert("Ajax请求失败!");
                        // },
                    });
                }
            });
            
            //ajax判断用户名是否已被使用
            $("#eName").blur(function(){
                if($("#eName").val() != '' ){
                    //正则验证用户名格式
                    var name = document.getElementById('eName').value.trim();    
                    reg=/^[a-zA-Z]\w{3,15}$/;
                    if(!reg.test(name)){
                        $("#errName").html("&nbsp;&nbsp;&nbsp;请以英文开头,4-16个字符!(英文、数字或下划线)").css({display:'block'});
                        $("form.ERform").attr({onsubmit:'return false'});
                    }else{
                        $("#errName").css({display:'none'});
                        $("form.ERform").attr({onsubmit:'return doCheckER()'});
                    }
                    
                    //ajax判断用户名是否被使用
                    $.ajax({
                        url:"{{ url('home/checkName') }}/"+$('#eName').val(),
                        type:"GET",
                        //async:false,
                        success:function(rel){
                            if(rel == 0){
                                $("#errName").html("&nbsp;&nbsp;&nbsp;该用户名已注册， <a href='#' style='color:#0082CB;' onclick='return outerLogin()'>前去登录</a>").css({display:'block'});
                                $("form.ERform").attr({onsubmit:'return false'});
                            }else{
                                $("form.ERform").attr({onsubmit:'return doCheckER()'});
                            }
                        },
                        // error:function(err){
                            // alert("Ajax请求失败!");
                        // },
                    });
                }
            });
            
            //正则验证密码格式
            $("#ePass").blur(function(){
                if($("#ePass").val() != '' ){
                    
                    var pass = document.getElementById('ePass').value.trim();    
                    reg=/^\S{6,20}$/;
                    if(!reg.test(pass)){
                        $("#errPass").html("&nbsp;&nbsp;&nbsp;6-20个字符(区分大小写,不能带有空格)").css({display:'block'});
                        $("form.ERform").attr({onsubmit:'return false'});
                    }else{
                        $("#errPass").css({display:'none'});
                        $("form.ERform").attr({onsubmit:'return doCheckER()'});
                    }
                }
            });
            
            //验证确认密码是否正确
            $("#eSurePass").blur(function(){
                if($("#eSurePass").val() != '' ){
                    
                    var pass = document.getElementById('ePass').value.trim();    
                    var surepass = document.getElementById('eSurePass').value.trim();    
                    
                    if(pass != surepass){
                        $("#errSurePass").html("&nbsp;&nbsp;&nbsp;两次密码输入不一致").css({display:'block'});
                        $("form.ERform").attr({onsubmit:'return false'});
                    }else{
                        $("#errSurePass").css({display:'none'});
                        $("form.ERform").attr({onsubmit:'return doCheckER()'});
                    }
                }else{
                    $("form.ERform").attr({onsubmit:'return false'});
                }
            });
            
            //外部调用登录模态框
            function outerLogin(){
                $("div.register-block").css({display:'none'});
                $("div.login-block").css({display:'block'});
                $("#gridSystemModalLabel").html("用户登录");
            }
            //外部调用注册模态框
            function outerRegister(){
                $("div.register-block").css({display:'block'});
                $("div.login-block").css({display:'none'});
                $("#gridSystemModalLabel").html("用户注册");
            }
		</script>
	</body>
</html>