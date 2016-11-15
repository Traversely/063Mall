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
        .msg_title{
            background:#82c92f;
            color:#fff;
            font-size:14px;
            width:1040px;
            height:36px;
            line-height:36px;
        }
        .msg_title th{
            text-align:center;
        }
        table td{
            text-align:center;
            height:36px;
            line-height:36px;
            font-family:微软雅黑;
        }
        table tr{
            -webkit-transition-property: background-color;
            -webkit-transition-duration: 0.3s;
            -webkit-transition-timing-function: ease;
        }
        table tr:hover{
            background-color:#95E593;
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
                        <a class="menu-item" href="{{ url('home/userInfo') }}" data-monitor="user_myorder_myorder">个人信息</a>
                        <a class="menu-item" href="{{ url('home/myorder') }}" data-monitor="user_myorder_myorder">我的订单</a>
                        <a class="menu-item" href="{{ url('home/myfavourite') }}" data-monitor="user_myfavorite_myfavorite">我的喜欢</a>
                        <a class="menu-item" href="{{ url('home/address') }}" data-monitor="user_address_address">收货地址</a>
                    </div>
                    <div class="menu-title">
                        消息中心
                    </div>
                    <div class="menu-list">
                        <a class="menu-item item-active" href="{{ url('home/message') }}" data-monitor="user_message_message">站内消息</a>
                    </div>
                </div>
                
                <div class="user-main">
                    <div class="order-main clearfix_new">
                        <h1 style="border:0"> 我的消息 </h1>
                        <div class="mod-user-list">
                            <table style="margin:auto;" width="50%" border="1" cellspacing="0" cellpadding="0">
                                <tr class="msg_title">
                                    <th>
                                        标题
                                    </th>
                                    <th>
                                        操作
                                    </th>
                                </tr>
                                @foreach($data as $list)
                                @if($list->read == false)
                                    <tr>
                                        <td name="title"><a href="{{ url('home/message') }}/{{ $list->id }}"><img src="{{ asset('uploads/public/home/new.gif') }}" style="width:28px;margin-right:4px;margin-bottom:4px;"/>{{ $list->title }}<sub style="margin-left:20px;">{{ date("Y-m-d H:i",$list->time) }}</sub></a></td>
                                        <td>
                                            <a href="{{ url('home/read') }}/{{ $list->id }}">标为已读</a>&nbsp;&nbsp;
                                            <a onclick="doDel({{ $list->id }})" style="cursor:pointer;">删除</a>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                                
                                @foreach($data as $list)
                                @if($list->read == true)
                                    <tr>
                                        <td name="title"><a href="{{ url('home/message') }}/{{ $list->id }}" style="color:#ccc">{{ $list->title }}<sub style="margin-left:20px;color:#ccc;">{{ date("Y-m-d H:i",$list->time) }}</sub></a></td>
                                        <td>
                                            <a href="{{ url('home/noread') }}/{{ $list->id }}" style="color:#ccc;">标为未读</a>&nbsp;&nbsp;
                                            <a onclick="doDel({{ $list->id }})" style="cursor:pointer;color:#ccc;">删除</a>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                            </table>
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
                        $("#mydeleteform").attr("action","{{url('home/delMsg')}}/"+id).submit();
                }
            });
            
        }
    </script>
@endsection