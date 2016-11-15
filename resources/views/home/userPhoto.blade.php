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
            width:100px;
            height:28px;
            color:#fff;
            background-color:#82C92F;
            margin-top:20px;
            margin-left:20px;
            -webkit-transition-property: background-color;
            -webkit-transition-duration: 0.5s;
            -webkit-transition-timing-function: ease;
        }
        .change:hover{
            background-color:#23AC38;
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
                        <h1 style="border:0;text-align:left;"> 头像修改 </h1>
                        <a href="{{ url('home/userInfo') }}" style="border:0;font-size:18px;float:right;margin-top:-36px;"> 返回上一级 </a>
                        <div class="mod-user-list" style="border:2px solid #82C92F;"></div>
                        <form action="{{url('home/userPhoto')}}/{{ session('homeuser')->id }}" method="post" enctype="multipart/form-data" style="margin-top:100px;margin-left:400px;">
                            <input type="hidden" name="_token" value="{{ csrf_token('userphoto') }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="file" name="userphoto" id="inputPhoto">
                            <input type="submit" class="change" value="提交"/>
                        </form>
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
    
</script>
@endsection