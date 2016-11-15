@extends('home.base')
@section('mycss')
<link rel="stylesheet" href="{{asset('css/home/qikoo-v.css')}}">
<link rel="stylesheet" href="{{asset('css/home/store.css')}}">
<link rel="stylesheet" href="{{asset('css/home/history.css')}}">
<script>
    var _isindex = 0;
</script>
@endsection
@section('content')

<div class="gdetail">
    <div class="prodIntro">
        <div class="sPic">
            <dl class="picbox">
                <dt class="bigImg">
                    <div style="display:none" id="winSelector"></div>
                    <img id="bigGpicture" src="{{asset($picture[0])}}">
                </dt>
                <dd class="pic-selector" id="pic-selector">
                    <i class="left leftdisabled"></i>
                    <div class="scroll">
                        <div class="scroll-items" id="gpicture">
                        @foreach($picture as $pic)
                            <a href="javascript:void(0);" class="tinypic cur">
                                <img src="{{asset($pic)}}">
                            </a>
                        @endforeach
                        </div>
                    </div>
                    <i class="right rightdisabled"></i>
                </dd>
            </dl>
        </div>
        <div class="sInfo">
            <a name="sInfo"></a>
            <div class="tr nobdr">
                <strong>{{$good->good}} <span id="goodColor"> {{$color[0]}}</span></strong>
                    <p class="slogan" id="config">{{$detail->configuration}}</p>
            </div>
            <div class="tr nobdr tr1" style="margin-top:10px">
                <div class="txt">
                    <strong class="nowprice" id="price"><em>￥</em> {{$detail->price}}</strong>
                </div>
                <div class="gift" style="display:none" data-itemid="56fb33645efb1179378b457b">
                    <i class="gift-label">赠品</i>
                </div>
                <div class="txt">
                    <span>型号</span>
                    <ul class="glist" id="colorlist" data-monitor="goodsdetails_fenlei_click">
                        @foreach($color as $k=>$v)
                        <li>
                            <a id="color{{$k}}" class="color" href="javascript:void(0);" onclick="doColor({{$k}})">{{$v}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="txt">
                    <span style="margin-top:6px">数量</span>
                    <div class="gcIpt" data-monitor="goodsdetails_number_click">
						<form id='count' action="{{url('/home/order/addcar')}}/{{$good->id}}" method='POST'>
							<a href="javascript:void(0);" class="decrement disabled" data-num="-1">-</a>
								<input type="text" name='count' id="num" class="goodsCount" value="1">
                                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                <input type="hidden" name='user'  value="{{ session('homeuser') ? session('homeuser')->id : '' }} ">
                                <input type="hidden" name='gid'  value="{{$good->id}}">
                                <input type="hidden" name='time'  value="{{time()}}">
                            <a href="javascript:void(0);" class="increment" data-num="1">+</a>
						</form>
                    </div>
                </div>
                <p class="cl mianze"></p>
            </div>
            <div class="tr nobdr btns" id="buyBut">
                @if($good->onSale == 0)
                <a href="javascript:void(0);" class="gInfoBtn gInfoBtn-sellout">
                    已下架
                </a>
                @elseif($detail->stock == 0)
                <a href="javascript:void(0);" class="gInfoBtn gInfoBtn-sellout">
                    已售完
                </a>
                @else
                <a href="javascript:void(0);" onclick="addcart()" class="gInfoBtn gInfoBtn-addcart" data-monitor="goodsdetails_buy_click">
                    <span class="gInfoBtn-icon gInfoBtn-icon-cart"></span>加入购物车
                </a>
                <a class="favorite nofav" id="fav" onclick="addFav()" style="text-decoration:none;cursor:pointer;">
                    <span class="gInfoBtn-icon gInfoBtn-icon-heart"></span>喜欢
                </a>
                @endif
                <div style="clear:both"></div>
            </div>
            <div class="tr nobdr">
                <div class="txt">
                    <span>保障</span>
                    <ul class="guarantee">
                        <li class="shop_info">
                            <i></i>360商城发货&amp;售后  
                        </li>
                        <li class="postage_free">
                            <i></i>满99元包邮  
                        </li>
                        <li class="sales_return">
                            <i></i>7天无理由退货  
                        </li>
                        <li class="sales_replace">
                            <i></i>15天免费换货         
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="c" style="width:100%">
        <a name="gInfo"></a>
        <div class="gTab" id="detail">
            <div class="tab-bar">
                <div class="links">
                    <a href="#detail" class="cur">产品详情</a>
                    <a href="#goodQue" class="cur">常见问题</a>
                </div>
            </div>
        </div>
        <div class="gCon">
            {!!$good->detail!!}
        </div>
        <div class="gTit" id="goodQue">
            <a name="gConsult" style="display:block;position:relative;top:-100px;visibility:hidden"></a>
            常见问题 
        </div>
        <div class="gCon">
            <dl class="consult">
                <dt>
                    <big>1、</big><i></i>订单提交成功后还可以修改收货信息吗？ 
                </dt>
                <dd>
                    <i></i>订单付款之前，您可以进入“我的订单”，在订单详情页内修改收货信息。付款之后将不可修改收货信息。 
                </dd>
                <dt>
                    <big>2、</big><i></i>支付完成后还能取消订单吗？如何取消？ 
                </dt>
                <dd>
                    <i></i>支付完成后，配货之前可以取消订单，您可以进入“我的订单”，直接点击订单后面取消按钮。 
                </dd>
                <dt>
                    <big>3、</big><i></i>订单取消后还能恢复吗？ 
                </dt>
                <dd>
                    <i></i>订单一旦取消后将无法恢复，请您慎重操作。 
                </dd>
                <dt>
                    <big>4、</big><i></i>订单取消成功后退款如何返还？ 
                </dt>
                <dd>
                    <i></i>订单取消后，退款会按照您购买时的支付方式原路返回到您的银行卡/支付宝账户。 
                </dd>
                <dt>
                    <big>5、</big><i></i>对商品不满意可以申请退换货吗？如何操作？ 
                </dt>
                <dd>
                    <i></i>在确认收货后，7天之内可以申请退货，15之内可以进行换货，具体操作如下:<br>进入“我的订单”，在操作区域中点击申请退换货，填写问题描述，提交服务单即可完成申请。 
                </dd>
                <dt>
                    <big>6、</big><i></i>为什么我的订单总是无法提交成功？ 
                </dt>
                <dd>
                    <i></i>可能存在以下几种情况：<br>（1）订单信息填写不完整<br>（2）订单商品库存不足或者库存无货；<br>（3）网络延时及以上各种情况都会在页面中弹出提示信息，可以通过修改订单信息（提示信息）或者稍后再试，即可成功提交订单。 
                </dd>
                <dt>
                    <big>7、</big><i></i>订单已提交成功，如何付款？ 
                </dt>
                <dd>
                    <i></i>您好，360商城目前支持的支付方式分为以下几种，请在订单提交后2小时内付款完成：<br>（1）网上银行<br>（2）第三方支付：包括支付宝。 
                </dd>
                <dt>
                    <big>8、</big><i></i>订单已支付成功，什么时候可以发货？ 
                </dt>
                <dd>
                    <i></i>您好，订单提交成功后我们会尽快发货，详细进度您可进入“我的订单”实时查看。详见 <a href="http://mall.360.com/user/myorder" target="_blank">我的订单&gt;&gt;</a>
                </dd>
                <dt>
                    <big>9、</big><i></i>订单发货后，还可以改送到其他地方吗？ 
                </dt>
                <dd>
                    <i></i>订单一旦提交成功，将无法修改。请在提交订单前仔细检查核对。 
                </dd>
                <dt>
                    <big>10、</big><i></i>我的地址比较偏僻，你们能送到吗？ 
                </dt>
                <dd>
                    <i></i>一般情况下，邮局可覆盖的范围我们均可以为您配送到。 
                </dd>
                <dt>
                    <big>11、</big><i></i>我订购的手机，忘记选择发票怎么办？ 
                </dt>
                <dd>
                    <i></i>手机类商品，为了保证您能充分享受生产厂家提供的售后服务（售后服务需根据发票确认您的购买日期），不管您是否选择开具发票，都将随单为您开具，发票内容默认为您订购的商品全明细，不支持修改发票内容。请认真填写发票抬头并核对，若您未填写发票抬头，默认抬头“个人“，订单付款前是可以自行修改发票内容。   
                </dd>
            </dl>
        </div>
        @if(session('history'))
            <div class="list-box"> 
                <div class="listwrap"> 
                    <div class="list-container list-container-no-ret" data-monitor="search_goods_click">
                        <div class="hotlist">
                        <span class="list-title">浏览历史</span>
                        <div class="itemlist" data-monitor="search_noresult_goods">
                            <ul id="recommend">
                            @foreach(session('history') as $k=>$v)
                                <li class="item" id="li{{$k}}" >
                                    <a style="text-decoration:none" target="_blank" href="{{url('home/good/detail').'/'.$v->id}}">
                                        <img class="pic" src="{{asset($v->picture)}}">
                                        <span class="title">{{$v->good}}</span>
                                        <span class="price">{{$v->minprice}}元</span>
                                    </a>
                                </li>
                            @endforeach
                            </ul> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="gInfoBar" id="gInfoBar" style="top: -70px;">
    <div class="gTab">
        <div class="tab-bar">
            <div class="links">
                    <a href="#detail" class="cur">产品详情</a>
                    <a href="#goodQue" class="cur">常见问题</a>
                <a href="javascript:void(0);" onclick="addcart()" class="gInfoBtn gInfoBtn-addcart" data-monitor="goodsdetails_buy_click">
                    <span class="gInfoBtn-icon gInfoBtn-icon-cart"></span>加入购物车
                </a>
            </div>
        </div>
    </div>
</div>
<div class="mask"></div>
<div id="zoomView" style="display:none">
    <img width="960" height="960" src="{{asset('uploads/public/home/t015bfd65ce1a72996f.gif')}}">
</div>

@endsection
@section('myjs')

<script>
    var remain = -1;
</script>

<script src="{{ asset('js/home/qikoo-v.js') }}"></script>
<script src="{{asset('js/home/template.js')}}"></script>
<script src="{{asset('js/home/tinyslider.js')}}"></script>
<script src="{{asset('js/home/mall_monitor.js')}}"></script>
<script src="{{asset('js/home/qikoo_shop_item.js')}}"></script>
<script src="{{ asset('js/home/jquery.lazyload.js') }}"></script>
<script type="text/javascript">
    var item_id = '57b6ce3f215ea076213bdfe6';
    var yuyueFlag = 'Q5plusyuyue0823';
    shopItem.init(item_id);
    
    // 延时加载
    $('.c img').lazyload({
        threshold: 200,
        placeholder: "https://p.ssl.qhmsg.com/t016a7da517888c2ffa.gif"
    });
</script>
<script>
    var fav;
    $.ajax({
        url:"{{url('home/good/fav/ajax')}}/"+{{$good->id}},
        type:'get',
        dataType:'text',
        success:function(msg){
            if(msg == 'success'){
                $('#fav').attr('class','favorite');
                fav = 'del';
            }else{
                $('#fav').attr('class','favorite nofav');
                fav = 'add';
            }
        }
    })

    var color=$('#color0').html();

    $('#color0').css('border','1px solid #FA5437');

    function doColor(id){
        $('#goodColor').html($('#color'+id).html());
        $('.color').css('border','1px solid #ddd');
        $('#color'+id).css('border','1px solid #FA5437');
        color = $('#color'+id).html();
        getGoodInfo();
    }

    function getGoodInfo(){
        $.ajax({
            type:'GET',
            url:'{{url("home/good/detail/ajax")."/"}}'+{{$good->id}},
            data:'color='+color,
            dataType:'json',
            success:function(msg){
                var picture = msg.picture;
                $('#price').html('<em>￥</em> '+msg.price);
                $('#config').html(msg.configuration);
                $('#bigGpicture').attr('src','http://alalei.com/'+picture[0]);
                $('#num').val(1);
                $('.decrement').addClass('disabled');
                $('#gpicture').empty();
                for(var i=0; i<picture.length; i++){
                    var pic = '<a href="javascript:void(0);" class="tinypic cur"><img src="http://alalei.com/'+picture[i]+'"></a>';
                    $('#gpicture').append(pic);
                }
                @if($good->onSale != 0)
                if(msg.stock == 0){
                    var but = '<a href="javascript:void(0);" class="gInfoBtn gInfoBtn-sellout">已售完</a><div style="clear:both"></div>';
                    $('#buyBut').empty().append(but);
                }else{
                    var but = '<a href="javascript:void(0);" onclick="addcart()" class="gInfoBtn gInfoBtn-addcart" data-monitor="goodsdetails_buy_click"><span class="gInfoBtn-icon gInfoBtn-icon-cart"></span>加入购物车</a><a class="favorite nofav" id="fav" onclick="addFav()" style="text-decoration:none;cursor:pointer;"><span class="gInfoBtn-icon gInfoBtn-icon-heart"></span>喜欢</a>';
                    $('#buyBut').empty().append(but);
                }
                @endif
            }
        });
    }

    function addFav(){
        if({{(null == session('homeuser'))?'1':'0'}}){
            SimplePop.alert("请先登录!");
            return;
        }
        $.ajax({
            url:"{{ url('home/good/fav') }}/"+{{$good->id}},
            type:"GET",
            dataType:"text",
            data:'action='+fav,
            success:function(msg){
                if(msg == 'success'){
                    SimplePop.alert("操作成功!");
                    if(fav == 'add'){
                        $('#fav').attr('class','favorite');
                        fav = 'del';
                    }else{
                        $('#fav').attr('class','favorite nofav');
                        fav = 'add';
                    }
                }else{
                    SimplePop.alert("操作失败!");
                }
            }
        });
    }  
    
    function addcart(){
        document.getElementById("count").submit();
    }
    
    $('.increment,.decrement').click(function(){
        var num = $('#num').val();
        num = parseInt(num);
        var count = $(this).attr('data-num');
        count = parseInt(count);
        if(num >= 1){
        $('#num').val(num+count);
        }
        if($('#num').val() == 0 ){
            $('#num').val(1);
        }
        if($('#num').val() == 2){
            $('.decrement').removeClass('disabled');
        }
        if($('#num').val() == 1){
            $('.decrement').addClass('disabled');
        }
    })
</script>
@endsection