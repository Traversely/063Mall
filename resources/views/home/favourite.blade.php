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
                        <a class="menu-item item-active" href="{{ url('home/myfavourite') }}" data-monitor="user_myfavorite_myfavorite">我的喜欢</a>
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
                    <div class="favorite_container clearfix_new">
                        <h1 class="favorite_title"> 我的喜欢 </h1>
                        @if(!isset($goods))
                        <div class="no_like" style="display:block">
                            <img src="{{ asset('uploads/public/home/t01b7f2452fe1b88be0.png') }}">
                            <p class="no_like_txt">
                                您暂未收藏任何商品
                            </p>
                        </div>
                        @endif
                        <ul class="favorite_list clearfix_new">
                        @if(isset($goods))
                        @foreach($goods as $data)
                            <li class="favorite_item" onmouseover="Over({{ $data->id }})" onmouseout="Out({{ $data->id }})">
                                <div class="favorite_item_img">
                                    <a href="{{ url('home/good/detail') }}/{{ $data->gid }}"><img src="{{ asset($data->picture) }}" title="{{ $data->good }}"></a>
                                    <p class="outbox selout" style="display:none">售罄</p>
                                    <p class="outbox useout" style="display:none">失效</p>
                                    <p class="favorite_cheaper" style="visibility:hidden"></p>
                                </div>
                                <p class="favorite_item_name" title="{{ $data->good }}">
                                <a href="{{ url('home/good/detail') }}/{{ $data->gid }}">{{ $data->good }}</a>
                                </p>
                                <p class="favorite_itme_price">
                                    ¥{{ $data->minprice }}
                                </p>
                                <div class="box" style="visibility:hidden;margin:8px 2px;" id="vis{{$data->id}}">
                                    <span class="favorite_cancelbtn" onclick="doDel({{$data->id}})" style="padding:0px 5px 1px 8px;">取消</span>
                                    <span class="favorite_addbtn" style="padding:1px 15px;">加入购物车</span>
                                </div>
                            </li>
                        @endforeach
                        @endif
                        </ul>
                        <div class="favorite_page_wrap" style="visibility:hidden">
                            <div class="favorite_page_index clearfix_new" style="display:none">
                                <ul class="favorite_page_btnbox clearfix_new">
                                </ul>
                                <p class="favorite_next_btn">
                                     下一页<img src="https://p.ssl.qhmsg.com/t01b9f4170a5d141ec4.png">
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" style="display:none;" id="mydeleteform" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="hidden" name="_method" value="DELETE">
    </form>
@endsection
 
@section('myjs')
    <script type="text/javascript">
        //删除收货地址
        function doDel(id){
            SimplePop.confirm("确认要删除吗?", { 
                confirm: function(){
                        $("#mydeleteform").attr("action","{{url('home/myfavourite')}}/"+id).submit();
                    } 
            });
            
        }
        function Over(id){
            $("#vis"+id).css({visibility:'visible'});
        }
        function Out(id){
            $("#vis"+id).css({visibility:'hidden'});
        }
        
    </script>
@endsection