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
        .k{
            font-size:16px;
        }
        .sexradio{
            margin-left:20px;
        }
        .age{
            border:1px solid #e5e5e5;
        }
        .anniu{
            background-color:#82C92F;
            color:#fff;
            padding:6px 14px;
            -webkit-transition-property: background-color;
            -webkit-transition-duration: 0.5s;
            -webkit-transition-timing-function: ease;
        }
        .anniu:hover{
            background-color:#2CB943;
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
    @if( session('info') )
        <script type="text/javascript">
            $(function(){
                SimplePop.alert("{{ session('info') }}");
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
                        <a class="menu-item" href="/user/myorder" data-monitor="user_myorder_myorder">我的订单</a>
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
                        <h1 style="border:0;text-align:left;"> 基本资料 </h1>
                        <a href="{{ url('home/userInfo') }}" style="border:0;float:right;margin-top:-36px;font-size:18px;color:#82C92F;"> 返回上一级 </a>
                        <div class="mod-user-list" style="border-top:4px solid #82C92F;">
                            
                            <div style="width:700px;margin:auto;">
                                <div class="mod-3">
                                    <div class="art-mod">
                                        <div class="art-bd">
                                            <div class="form form-1 mod-reslut-t2">
                                                <form action="{{ url('home/changeInfo') }}/{{ $userInfo->id }}" method="post" style="margin:60px auto;padding-left:200px;">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <input type="hidden" name="_token" value="<?php echo csrf_token('changeInfo'); ?>">
                                                    <ul>
                                                        <li class="">
                                                            <label for="#" class="k">性 别：</label>
                                                            <span class="">
                                                                <label class="sexradio">
                                                                    <input type="radio" value="m" {{ $userInfo->sex == 'm' ? 'checked' : '' }} name="sex" class=""> <span>男</span>
                                                                </label>
                                                                <label class="sexradio">
                                                                    <input type="radio" value="w" {{ $userInfo->sex == 'w' ? 'checked' : '' }} name="sex" class=""> <span>女</span>
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="" style="margin-top:20px;">
                                                            <label for="#" class="k">年 龄：</label>
                                                            <span class="">
                                                                <input type="text" name="age" value="{{ $userInfo->age == 0 ? '' : $userInfo->age }}" id="age" class="age"/>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                    <div class="btns" style="margin-left:60px;margin-top:20px;  ">
                                                        <button type="submit" class="anniu">保存修改</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
</script>
@endsection