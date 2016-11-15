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
        <script type="preload-script" src="{{asset('js/home/utils.js')}}">
        </script>
        <script type="preload-script" src="{{asset('js/home/jq-suggest.js')}}">
        </script>
        <script type="preload-script" src="{{asset('js/home/jq-suggest-client.js')}}">
        </script>
        <script id="tpl_nav" type="text/html">
            < !--导航下拉start--><ul class = "sub-nav-list" > 
			@{{ each item as secondValueindex }} 
			< li > <a href = "#"target = "_blank"data - monitor = '#' > <img src = "#" / ><span > 
			@{{ secondValue.name}} < /span>
                <i>@{{secondValue.price_sale}}元</i > </a>
        </li >
		@{{ / each }} < /ul>/
        </script>
        <style>
        </style>
        <div class="mod-order-success">
            <h2>
                订单提交成功，还差最后一步，请尽快付款！
            </h2>
            <h3>
                请您在
                <b class="countdown">
                    1时59分33秒
                </b>
                内完成支付，否则您的订单会自动取消
            </h3>
            <p>
                应付金额：{{ $db->count * $db->price }}元
                <a class="detail-btn" href="#" onclick="return false">
                    订单详情
                </a>
            </p>
            <div class="order-detail">
                <p>
                </p>
                <li>
                    订单号：{{ $db->id }}
                    <p>
                    </p>
                </li>
            </div>
        </div>
        <div class="mod-order-pay">
            <h2>
                只差一步，快来付款哦！
            </h2>
            <div class="pay-block clearfix">
                <div class="pay-title">
                    支付平台
                </div>
                <ul>
                    <li>
                        <input name="pay-type" value="zfb" id="zfb" data-monitor="payorder_choose_zhifubao"
                        type="radio">
                        <label for="zfb">
                            <img src="{{asset('uploads/photos/home/t011d5167dac1712a56.png')}}">
                        </label>
                    </li>
                </ul>
            </div>
            <div class="pay-block clearfix">
                <div class="pay-title">
                    网上银行
                </div>
                <ul>
                    <li>
                        <input name="pay-type" value="ICBCB2C" id="ICBCB2C" data-monitor="payorder_bank_gongshang"
                        type="radio">
                        <label for="ICBCB2C">
                            <img src="{{asset('uploads/photos/home/t011e0ba694b93bc39f.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="CCB" id="CCB" data-monitor="payorder_bank_jianshe"
                        type="radio">
                        <label for="CCB">
                            <img src="{{asset('uploads/photos/home/t01f714d3c242d92244.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="ABC" id="ABC" data-monitor="payorder_bank_nongye"
                        type="radio">
                        <label for="ABC">
                            <img src="{{asset('uploads/photos/home/t0163decdf0dea7aadf.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="COMM" id="COMM" data-monitor="payorder_bank_jiaotong"
                        type="radio">
                        <label for="COMM">
                            <img src="{{asset('uploads/photos/home/t01dac80cf09f56b25c.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="BOCB2C" id="BOCB2C" data-monitor="payorder_bank_zhongguo"
                        type="radio">
                        <label for="BOCB2C">
                            <img src="{{asset('uploads/photos/home/t01095bc7c6d765fd94.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="CMB" id="CMB" data-monitor="payorder_bank_zhaoshang"
                        type="radio">
                        <label for="CMB">
                            <img src="{{asset('uploads/photos/home/t01abc8fc442d32707b.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="CITIC" id="CITIC" data-monitor="payorder_bank_zhongxin"
                        type="radio">
                        <label for="CITIC">
                            <img src="{{asset('uploads/photos/home/t01881c195f1d45c38d.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="SPDB" id="SPDB" data-monitor="payorder_bank_pufa"
                        type="radio">
                        <label for="SPDB">
                            <img src="{{asset('uploads/photos/home/t01335cafa8775f8fe9.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="CMBC" id="CMBC" data-monitor="payorder_bank_minsheng"
                        type="radio">
                        <label for="CMBC">
                            <img src="{{asset('uploads/photos/home/t010243b8d47200a90d.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="GDB" id="GDB" data-monitor="payorder_bank_guangfa"
                        type="radio">
                        <label for="GDB">
                            <img src="{{asset('uploads/photos/home/t01975aca8321cf1982.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="CIB" id="CIB" data-monitor="payorder_bank_xingye"
                        type="radio">
                        <label for="CIB">
                            <img src="{{asset('uploads/photos/home/t01e6216bf18a72ad8c.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="CEBBANK" id="CEBBANK" data-monitor="payorder_bank_guangda"
                        type="radio">
                        <label for="CEBBANK">
                            <img src="{{asset('uploads/photos/home/t0170d7d71ef0a77d11.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="PSBC-DEBIT" id="PSBC-DEBIT" data-monitor="payorder_bank_youzheng"
                        type="radio">
                        <label for="PSBC-DEBIT">
                            <img src="{{asset('uploads/photos/home/t0180a8bd3d7c75c9c0.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="SPABANK" id="SPABANK" data-monitor="payorder_bank_pingan"
                        type="radio">
                        <label for="SPABANK">
                            <img src="{{asset('uploads/photos/home/t011e650636adb8ca10.png')}}">
                        </label>
                    </li>
                    <li>
                        <input name="pay-type" value="BJBANK" id="BJBANK" data-monitor="payorder_bank_beijing"
                        type="radio">
                        <label for="BJBANK">
                            <img src="{{asset('uploads/photos/home/t0121af542ddf308b35.png')}}">
                        </label>
                    </li>
                </ul>
            </div>
            <div class="pay-console">
                <p class="console-info clearfix">
                    待支付总额：
                    <b>
                        {{ $db->count * $db->price }}
                    </b>
                    <a href="javascript:;" class="gotopay" id="gotopay" title="去付款" data-monitor="payorder_pay_click">
                    </a>
                </p>
                <p class="console-tip">
                    请在
                    <b class="countdown">
                        1时59分33秒
                    </b>
                    内完成支付
                </p>
            </div>
        </div>
        <script>
            var orderSuccess = (function() {
                var interval, pageRemain, token, orderId;
                var now = new Date();

                var initDetailBtn = function() {
                    $('.detail-btn').click(function() {
                        $(this).toggleClass('detail-show').text(function(i, txt) {
                            return '收起详情订单详情'.replace(txt, '');
                        });
                        $('.order-detail').toggle();
                    })
                }

                var initCountdown = function() {
                    interval = setInterval(function() {
                        countdown();
                    },
                    1000);
                    countdown();
                }

                var countdown = function() {
                    var timeRemain = pageRemain - (new Date() - now) / 1000;
                    // console.log(timeRemain)
                    if (timeRemain > 0) {
                        var hour = Math.floor(timeRemain / 60 / 60);
                        var minute = Math.floor(timeRemain / 60 % 60);
                        var second = Math.floor(timeRemain % 60);

                        $('.countdown').html(hour + '时' + minute + '分' + second + '秒');
                    } else {
                        clearInterval(interval);
                        // window.location.href = '/user/myorder'
                    }
                }

                var initPayAction = function() {
                    $('#gotopay').click(function() {
                        var type = $('[name=pay-type]:checked').val();
                        if (type) {
                            showPayDialog();
                            window.open('/sale/userpay?id=' + orderId + '&token=' + token + '&bank_code=' + type);
                        } else {
                            qikoo.dialog.alert('请选择支付方式。');
                        }
                    })
                }

                var showPayDialog = function() {
                    var tpl = ['<div class="dialog-content" style="padding:10px;">', '<p>请您在<b class="countdown"></b>内，在新开的网上支付页面<br>完成支付，支付完成前请不要关闭该窗口</p>', '</div>', '<div class="dialog-console">', '<a class="console-btn-confirm" href="#" onclick="return false;">已完成付款</a>', '<a class="console-btn-cancel" href="#" onclick="return false;">付款遇到问题</a>', '</div>'].join('');

                    qikoo.dialog.show({
                        html: tpl,
                        title: '付款提示'
                    }).find('.dialog-console a').click(function() {
                        window.location.reload();
                    })
                }

                var init = function(cfg) {
                    cfg = cfg || {};
                    pageRemain = cfg.countdown | 0;
                    token = cfg.token;
                    orderId = cfg.orderId;

                    initDetailBtn();
                    initCountdown();
                    initPayAction();
                }

                return {
                    init: init
                }

            })()

            orderSuccess.init({
                countdown: 7086,
                token: 'fe19c480539b2c8b5c885dd8a6648d4b',
                orderId: '1623612173701000006'
            });

            // $("#gotopay").click(function(){
            // var tpl = [
            //     '<div class="dialog-content" style="padding:10px;">',        
            //       '<p>请您在<b data-time="7086">2时0分0秒</b>内，在新开的网上支付页面<br>完成支付，支付完成前请不要关闭该窗口</p>',
            //     '</div>',
            //     '<div class="dialog-console">',
            //       '<a class="console-btn-confirm" href="#" onclick="return false;">已完成付款</a>',
            //       '<a class="console-btn-cancel" href="#" onclick="return false;">付款遇到问题</a>',
            //     '</div>'
            // ].join('');
            //   // var dialogEle = $(tpl).appendTo('body');
            //   // var mainEle = dialogEle.filter('.dialog-main');
            //   // var top = ($(window).height()-mainEle.height())/2 + $(document).scrollTop();
            //   // mainEle.css('top',top);
            //   // dialogEle.filter('.dialog-bg').css('height',$(document).height());
            //   var dialogEle = qikoo.dialog.show({
            //     html : tpl,
            //     title : '付款提示'
            //   });
            //   dialogEle.find('a').click(function(){
            //     window.location.reload();
            //   });
            //   window.open("/sale/userpay?id=1623612173701000006&token=fe19c480539b2c8b5c885dd8a6648d4b");
            // });
            // (function(){
            //   var ele = $('.countdown');
            //   var pageRemain = ele.attr('data-time');
            //   var now = new Date();
            //   var interval;
            // var countdown = function(){
            //     var timeRemain = pageRemain - (new Date() - now)/1000;
            //     if(timeRemain>0){
            //       var hour = Math.floor(timeRemain/60/60);
            //       var minute = Math.floor(timeRemain/60%60);
            //       var second = Math.floor(timeRemain%60);
            //       ele.html(hour+'时'+minute+'分'+second+'秒')
            //     }else{
            //       clearInterval(interval);
            //       window.location.href = '/user/myorder'
            //     }
            // }
            //   interval = setInterval(function(){
            //       countdown();
            //   },1000);
            //   countdown();
            // })()
            
        </script>
        
        <input class="qtoken" name="qtoken" value="6159d107df1e3cd8b771692817c0b282"
        type="hidden">
        <input class="real_qtoken" name="real_qtoken" value="54b79e" type="hidden">
        <input class="qtokentimestamp" name="qtokentimestamp" value="1471954734"
        type="hidden">
        <input class="sb_param" name="sb_param" value="8f5b4ca5a698a4418c16fe3265c023cc"
        type="hidden">
        <script src="{{asset('js/home/qikoo-v.js')}}">
        </script>
        <ul id="search-suggest-1471954722326" class="__mall_suggest__" style="width: 462px;">
        </ul>
        <!--[if lte IE 6]>
            <script src="https://s.ssl.qhmsg.com/static/f54f2caa703115b3/DD_belatedPNG_0.0.8a.js">
            </script>
            <script>
                DD_belatedPNG.fix("div, ul, img, li, input, a, span, i")
            </script>
        <![endif]-->
 
        <script>
            var _mvq = window._mvq || [];
            window._mvq = _mvq,
            _mvq.push(["$setAccount", "m-251506-0"]),
            _mvq.push(["$setGeneral", "ordercreate", "", "", ""]),
            _mvq.push(["$logConversion"]),
            _mvq.push(["$addOrder", "", ""]),
            _mvq.push(["$addItem", "", "", "", "", "", "", ""]),
            _mvq.push(["$logData"])
        </script>
@endsection