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
        .myMsg{
            border:0;
            margin-bottom:50px;
            text-align:left;
        }
        .return{
            border:0;
            margin-bottom:50px;
            text-align:left;
            float:right;
            margin-top:-100px;
            margin-right:40px;
            cursor:pointer;
        }
        .qz_newsp{
            border:1px solid #E3F5B9;
            background:#ADEAAA;
            color:#fff;
            margin:auto;
            width: 500px; 
            padding-top: 20px; 
            margin-top: 0px; 
            padding-bottom: 20px; 
            margin-bottom: 0px; 
            -webkit-transition-property: background-color box-shadow;
            -webkit-transition-duration: 0.4s;
            -webkit-transition-timing-function: ease;
        }
        .qz_newsp:hover{
            background:#95E593;
            box-shadow:4px 5px 6px #89E086;
        }
        .del{
            cursor:pointer;
            float:right;
            margin-right:10px;
            margin-top:-20px;
            color:#fff;
            -webkit-transition-property: color;
            -webkit-transition-duration: 0.4s;
            -webkit-transition-timing-function: ease;
        }
        .del:hover{
            color:#693;
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
                        <a class="menu-item" href="/user/myorder" data-monitor="user_myorder_myorder">我的订单</a>
                        <a class="menu-item" href="/user/mycoupon" data-monitor="user_mycoupon_mycoupon">我的优惠券</a>
                        <a class="menu-item" href="{{ url('home/myfavourite') }}" data-monitor="user_myfavorite_myfavorite">我的喜欢</a>
                        <a class="menu-item" href="/user/try" data-monitor="user_try_try">我的试用</a>
                        <a class="menu-item" href="/user/mypoint" data-monitor="user_point_point">试用积分</a>
                        <a class="menu-item" href="/user/book" data-monitor="user_book_book">我的预约</a>
                        <a class="menu-item" href="{{ url('home/address') }}" data-monitor="user_address_address">收货地址</a>
                    </div>
                    <div class="menu-title">
                        消息中心
                    </div>
                    <div class="menu-list">
                        <a class="menu-item" href="/user/notice" data-monitor="user_notice_notice">评论通知</a>
                        <a class="menu-item item-active" href="{{ url('home/message') }}" data-monitor="user_message_message">站内消息</a>
                    </div>
                    <div class="menu-title">
                        售后服务
                    </div>
                    <div class="menu-list">
                        <a class="menu-item" href="/user/myreturnlist?type=1" data-monitor="user_returnlist_returnlist">退货记录</a>
                        <a class="menu-item" href="/user/myreturnlist?type=2" data-monitor="user_barter_barter">换货记录</a>
                    </div>
                </div>
                
                <div class="user-main">
                    <div class="order-main clearfix_new">
                        <h1 class="myMsg"> 我的消息 </h1>
                        <h1 class="return" onclick="javascript:window.location.href='{{ url('home/message') }}'"> 返回上一级 </h1>
                        <div class="qz_newsp">
                        <a class="del" onclick="doDel({{ $data->id }})">x</a>
								<h4 style="text-align:center;">{{ $data->title }}</h4>
								<br/>
								<p style="text-indent:1cm;">{{ $data->content }}</p>
								<div style="margin-top:60px;margin-right:40px;">
                                    <p style="text-align:right;margin-right:36px;">{{ $data->author }}</p>
                                    <p style="text-align:right;">{{ date("Y-m-d H:i",$data->time) }}</p>
                                </div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" style="display:none;" id="mydeleteform" method="get">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="DELETE">
    </form>
@endsection
 
@section('myjs')
    <script type="text/javascript">
        function doDel(id){
            SimplePop.confirm("确认要删除吗?", {
                confirm: function(){
                        $("#mydeleteform").attr("action","{{url('home/delMsgDetail')}}/"+id).submit();
                }
            });
        }
    </script>
@endsection