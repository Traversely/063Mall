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
           
        </script>
        <div class="user-body">
            <div class="user-container">
                <div class="user-crumbs m-b-10">
                    <a href="http://mall.360.com/">
                        首页
                    </a>
                    &gt;
                    <a href="http://mall.360.com/user/myorder">
                        我的订单
                    </a>
                    &gt; 订单详情
                </div>
                <div class="clearfix_new">
                    <div class="user-menu m-r-20">
                        <div class="menu-title">
                            个人中心
                        </div>
                        <div class="menu-list">
                            <a class="menu-item item-active" href="http://mall.360.com/user/myorder"
                            data-monitor="user_myorder_myorder">
                                我的订单
                            </a>
                            <a class="menu-item" href="http://mall.360.com/user/mycoupon" data-monitor="user_mycoupon_mycoupon">
                                我的优惠券
                            </a>
                            <a class="menu-item" href="http://mall.360.com/user/myfavorite" data-monitor="user_myfavorite_myfavorite">
                                我的喜欢
                            </a>
                            <a class="menu-item" href="http://mall.360.com/user/try" data-monitor="user_try_try">
                                我的试用
                            </a>
                            <a class="menu-item" href="http://mall.360.com/user/mypoint" data-monitor="user_point_point">
                                试用积分
                            </a>
                            <a class="menu-item" href="http://mall.360.com/user/book" data-monitor="user_book_book">
                                我的预约
                            </a>
                            <a class="menu-item" href="http://mall.360.com/user/address" data-monitor="user_address_address">
                                收货地址
                            </a>
                        </div>
                        <div class="menu-title">
                            消息中心
                        </div>
                        <div class="menu-list">
                            <a class="menu-item" href="http://mall.360.com/user/notice" data-monitor="user_notice_notice">
                                评论通知
                            </a>
                            <a class="menu-item" href="http://mall.360.com/user/message" data-monitor="user_message_message">
                                站内消息
                            </a>
                        </div>
                        <div class="menu-title">
                            售后服务
                        </div>
                        <div class="menu-list">
                            <a class="menu-item" href="http://mall.360.com/user/myreturnlist?type=1"
                            data-monitor="user_returnlist_returnlist">
                                退货记录
                            </a>
                            <a class="menu-item" href="http://mall.360.com/user/myreturnlist?type=2"
                            data-monitor="user_barter_barter">
                                换货记录
                            </a>
                        </div>
                    </div>
                    <div class="user-main">
                        <div class="order-main">
                            <h1>
                                订单号：{{ $od->id }}
                                <p>
                                    请在2小时内完成支付,逾期订单将自动取消。
                                </p>
                                <p class="countdown_tip" data-countdowntime="6851000" style="display: block;">
                                    请您在
                                    <span>
                                        2时00分00秒
                                    </span>
                                    前完成付款，否则您提交的订单会自动取消！
                                </p>
                            </h1>
                            <div class="mod-user-list">
                                <script>
                                    window.order_status = 0;
                                </script>
                                <div class="order-steps clearfix_new steps-1">
                                    <div class="steps-bg">
                                    </div>
                                    <div class="steps-view">
                                    </div>
                                    <div class="steps-txt-1">
                                        下单
                                        <br>
                                        {{ date("Y-m-d  H:i:s",$od->time) }}
                                       
                                    </div>
                                    <div class="steps-txt-2">
                                        付款
                                        <br>
                                    </div>
                                    <div class="steps-txt-3">
                                        配货
                                        <br>
                                    </div>
                                    <div class="steps-txt-4">
                                        发货
                                        <br>
                                    </div>
                                    <div class="steps-txt-5">
                                        完成
                                        <br>
                                    </div>
                                </div>
                                <div class="express-info">
                                    <div class="ddzz">
                                        订单跟踪
                                    </div>
                                    <div class="ddzz_info">
                                        <p class="ddzz_title">
                                            <span class="ddzz_title_l">
                                                处理时间
                                            </span>
                                            <span>
                                                订单信息
                                            </span>
                                        </p>
                                        <p class="loading" style="display: none;">
                                            数据加载中...
                                        </p>
                                        <ol class="express_ol" data-id="1624308923701000018" style="display: block;">
                                            <li>
                                                <div class="thetime">
                                                    {{ date("Y-m-d  H:i:s",$od->time) }}
                                                </div>
                                                <div class="theinfo">
                                                    您的订单已提交
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="express-desc">
                                    <p>
                                        <br>
                                    </p>
                                    <dl class="update-address">
                                        <dt>
                                            收货信息
                                            <a id="expressDescEdit" href="#"
                                            onclick="return false">
                                                [ 修改 ]
                                            </a>
                                            <a id="expressDescCancel" href="#"
                                            onclick="return false" style="display:none">
                                                [ 取消 ]
                                            </a>
                                        </dt>
                                        <dd class="consignee-view">
                                            <p>
                                                姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：
                                                <span class="addr-realname">
													{{ $address->consignee }}
                                                </span>
                                            </p>
                                            <p>
                                                收货地址：
                                                <span class="addr-province">
													{{ $address->province1 }}
                                                </span>
                                                <span class="addr-city">
													{{ isset($address->city1) ? $address->city1 : '' }}
                                                </span>
                                                <span class="addr-county">
													{{ isset($address->district1) ? $address->district1 : '' }}
                                                  
                                                </span>
                                                <span class="addr-address">
													{{ isset($address->township1) ? $address->township1 : '' }}
                                                </span>
												 <span class="addr-address">
                                                    {{ $address->street }}
                                                </span>
                                            </p>
                                            <p>
                                                联系方式：
                                                <span class="addr-mobile">
													{{ $address->phone }} 
                                                </span>
                                            </p>
                                            <p>
                                                邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;编：
                                                <span class="addr-postcode">
                                                    052160
                                                </span>
                                            </p>
                                        </dd>
                                        <dd class="consignee-add">
                                            <div class="add-row">
                                                <label class="consignee-add-label" for="consignee_add_realname">
                                                    <b>
                                                        *
                                                    </b>
                                                    收货人姓名
                                                </label>
                                                <input name="consignee_add_realname" type="text" class="consignee-add-text"
                                                placeholder="收货人姓名">
                                            </div>
                                            <div class="add-row m-t-10">
                                                <label class="consignee-add-label" for="consignee_add_province">
                                                    <b>
                                                        *
                                                    </b>
                                                    地址
                                                </label>
                                                <select class="consignee-add-select" name="consignee_add_province">
                                                    <option value="-1" selected="">
                                                        省份/自治区
                                                    </option>
                                                    <option value="110000">
                                                        北京
                                                    </option>
                                                    <option value="120000">
                                                        天津
                                                    </option>
                                                    <option value="130000">
                                                        河北省
                                                    </option>
                                                    <option value="140000">
                                                        山西省
                                                    </option>
                                                    <option value="150000">
                                                        内蒙古自治区
                                                    </option>
                                                    <option value="210000">
                                                        辽宁省
                                                    </option>
                                                    <option value="220000">
                                                        吉林省
                                                    </option>
                                                    <option value="230000">
                                                        黑龙江省
                                                    </option>
                                                    <option value="310000">
                                                        上海
                                                    </option>
                                                    <option value="320000">
                                                        江苏省
                                                    </option>
                                                    <option value="330000">
                                                        浙江省
                                                    </option>
                                                    <option value="340000">
                                                        安徽省
                                                    </option>
                                                    <option value="350000">
                                                        福建省
                                                    </option>
                                                    <option value="360000">
                                                        江西省
                                                    </option>
                                                    <option value="370000">
                                                        山东省
                                                    </option>
                                                    <option value="410000">
                                                        河南省
                                                    </option>
                                                    <option value="420000">
                                                        湖北省
                                                    </option>
                                                    <option value="430000">
                                                        湖南省
                                                    </option>
                                                    <option value="440000">
                                                        广东省
                                                    </option>
                                                    <option value="450000">
                                                        广西壮族自治区
                                                    </option>
                                                    <option value="460000">
                                                        海南省
                                                    </option>
                                                    <option value="500000">
                                                        重庆
                                                    </option>
                                                    <option value="510000">
                                                        四川省
                                                    </option>
                                                    <option value="520000">
                                                        贵州省
                                                    </option>
                                                    <option value="530000">
                                                        云南省
                                                    </option>
                                                    <option value="540000">
                                                        西藏自治区
                                                    </option>
                                                    <option value="610000">
                                                        陕西省
                                                    </option>
                                                    <option value="620000">
                                                        甘肃省
                                                    </option>
                                                    <option value="630000">
                                                        青海省
                                                    </option>
                                                    <option value="640000">
                                                        宁夏回族自治区
                                                    </option>
                                                    <option value="650000">
                                                        新疆维吾尔自治区
                                                    </option>
                                                </select>
                                                <select class="consignee-add-select" name="consignee_add_city">
                                                    <option value="-1">
                                                        请选择
                                                    </option>
                                                </select>
                                                <select class="consignee-add-select" name="consignee_add_county">
                                                    <option value="-1">
                                                        请选择
                                                    </option>
                                                </select>
                                                <textarea class="consignee-add-address" name="consignee_add_address" placeholder="路名或街道地址，门牌号">
                                                </textarea>
                                            </div>
                                            <div class="add-row m-t-10">
                                                <label class="consignee-add-label" for="consignee_add_postcode">
                                                    邮政编码
                                                </label>
                                                <input name="consignee_add_postcode" type="text" class="consignee-add-text"
                                                placeholder="6位邮政编码">
                                            </div>
                                            <div class="add-row m-t-10">
                                                <label class="consignee-add-label" for="consignee_add_mobile">
                                                    <b>
                                                        *
                                                    </b>
                                                    手机号码
                                                </label>
                                                <input name="consignee_add_mobile" type="text" class="consignee-add-text"
                                                placeholder="11位手机号">
                                            </div>
                                            <input type="hidden" name="consignee_add_addr_id" value="">
                                            <div class="add-row m-t-10">
                                                <p class="m-t-20">
                                                    <a href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                                    onclick="return false" id="consigneeAddBtn" class="mod-btn-green">
                                                        确定
                                                    </a>
                                                    <a href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                                    onclick="return false" id="consigneeCancelBtn" class="mod-btn-gray">
                                                        取消
                                                    </a>
                                                </p>
                                            </div>
                                        </dd>
                                    </dl>
                                    <dl class="invoice-update">
                                        <dt>
                                            发票信息
                                            <a id="invoiceDescEdit" href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                            onclick="return false">
                                                [ 修改 ]
                                            </a>
                                            <a id="invoiceDescCancel" href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                            onclick="return false" style="display:none">
                                                [ 取消 ]
                                            </a>
                                        </dt>
                                        <dd class="consignee-view">
                                            <p>
                                                发票类型：
                                                <span class="invoice-type">
                                                    开发票
                                                </span>
                                            </p>
                                        </dd>
                                        <dd class="consignee-add">
                                            <div class="invoice-select-type">
                                                <a href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                                onclick="return false" class="curr" data-value="0">
                                                   @if($odt->invoice == 0) 开发票 @elseif($odt->invoice == 1) 不开发票 @endif
                                                </a>
                                                <a href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                                onclick="return false" data-value="1">
                                                   @if($odt->invoice == 0) 开发票 @elseif($odt->invoice == 1) 不开发票 @endif
                                                </a>
                                            </div>
                                            <div class="invoice-select-title" style="display: none;">
                                                <a href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                                onclick="return false" data-value="1">
                                                    个人
                                                </a>
                                                <a href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                                onclick="return false" data-value="2">
                                                    单位
                                                </a>
                                            </div>
                                            <div class="invoice-select-content" style="display: none;">
                                                <input type="text" name="invoiceContent">
                                            </div>
                                            <p class="m-t-20">
                                                <a href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                                onclick="return false" id="invoiceAddBtn" class="mod-btn-green">
                                                    确定
                                                </a>
                                                <a href="http://mall.360.com/user/myorderdetail?id=1624308923701000018#"
                                                onclick="return false" id="invoiceCancelBtn" class="mod-btn-gray">
                                                    取消
                                                </a>
                                            </p>
                                        </dd>
                                    </dl>
                                </div>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr class="list-title">
                                            <th class="list-col1">
                                                订单信息
                                            </th>
                                            <th class="list-col2">
                                                订单状态
                                            </th>
                                            <th class="list-col3">
                                                下单时间
                                            </th>
                                            <th class="list-col4">
                                                操作
                                            </th>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr class="list-order-detail">
                                            <td>
                                                <div class="item-product clearfix_new">
                                                    <a href="#"
                                                    target="_blank" title="{{ $od->good }}">
                                                        <img class="item-img" src="{{ '/'.$od->picture }}"">
                                                    </a>
                                                    <div class="item-txt">
                                                        <p>
                                                            <a href="#"
                                                            target="_blank" title="{{ $od->good }}">
																{{ $od->good }}（{{ $od->color }}）
                                                            </a>
                                                        </p>
                                                        <p>
                                                            {{ $od->price }}
                                                        </p>
                                                    </div>
                                                    <div class="item-count">
                                                        x{{ $od->count }}
                                                    </div>
                                                </div>
                                                
                                            </td>
                                            <td>
                                                @if($od->status == 0) 未付款 @elseif($od->status == 1) 未发货 @elseif($od->status == 2) 已签收 @else($od->status == 3)未评价 @endif
                                            </td>
                                            <td>
                                                <br>
                                               {{ date("Y-m-d  H:i:s",$od->time) }}
                                            </td>
                                            <td>
                                                <a class="item-pay mod-btn-orange" target="_blank" href="{{ url('home/order/shopcar/ordersucc') }}/{{ $od->id }}">
                                                    去付款
                                                </a>
                                                <p>
                                                    <a onclick="doDel({{ $od->id }})" class="item-console console-cancel">
                                                        取消订单
                                                    </a>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-detail">
                                <div class="price-detail">
                                    <p>
                                        商品总价：
                                        <span>
										{{ $od->price * $od->count }}
                                        </span>
                                    </p>
                                    <h2>
                                        实付总额：
                                        <span>
                                            <b>
                                               {{ $od->price * $od->count }}
                                            </b>
                                            元
                                        </span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="qtoken" name="qtoken" value="54b79e">
        <input type="hidden" class="real_qtoken" name="real_qtoken" value="3480072eb189b84720d5559908e15785">
        <input type="hidden" class="qtokentimestamp" name="qtokentimestamp" value="1472540320">
        <input type="hidden" class="sb_param" name="sb_param" value="7dce2bb498b3943af7be0bb845371c68">
        <script src="./od_files/qikoo-v.js">
        </script>
        <ul id="search-suggest-1472540312205" class="__mall_suggest__" style="width: 462px; position: absolute; top: 167px; left: 566.5px; z-index: 310;">
        </ul>
        <!--[if lte IE 6]>
            <script src="https://s.ssl.qhmsg.com/static/f54f2caa703115b3/DD_belatedPNG_0.0.8a.js">
            </script>
            <script>
                DD_belatedPNG.fix("div, ul, img, li, input, a, span, i")
            </script>
        <![endif]-->
		<form action="" style="display:none;" id="delForm" method="get">
    
		</form>
        <script src="{{asset('js/home/widget_address.js')}}">
        </script>
        <script>
		
			/* function doDel(id){
				if(confirm('确定要删除吗？')){
					$("#delForm").attr("action","{{url('/home/order/del')}}/"+id).submit(); 
				}
			} */
		
            $(function() {

                if ($('.express_ol').length = 0) {
                    return;
                }

                $('.ddzz_info').find('.loading').show();
                $('.ddzz_info').find('.express_ol').hide();

                //return;
                $.getJSON('/user/orderhis', {
                    id: $('.express_ol').eq(0).data('id')
                }).done(function(data) {

                    if (data.data == null) {
                        return;
                    }

                    $('.express_ol').html('');
                    var str = ''

                    for (var i = 0; i < data.data.length; i++) {
                        str += '<li><div class="thetime">' + data.data[i].acceptTime + '</div><div class="theinfo">' + data.data[i].acceptAddress + '</div></li>'
                    };
                    $('.express_ol').show().html(str);

                    $('.ddzz_info').find('.loading').hide();
                });
            }); (function() {

                var flag = '1';

                var _this = $('.countdown_tip').get(0);

                if (flag != '1' || parseInt($(_this).data('countdowntime')) <= 0) {
                    return false;
                }

                Timer({
                    milliseconds: $(_this).data('countdowntime'),
                    interval: 500,
                    immediately: true,
                    callback: function(milliseconds, desc) {

                        var str = desc.hours + '时' + desc.minutes + "分" + desc.second + "秒"

                        $(_this).html("请您在<span>" + str + "</span>前完成付款，否则您提交的订单会自动取消！").show();
                    },
                    fnEnd: function() {
                        $(_this).addClass('countdonw_time_disable')
                    }
                }).run();
            })();

			

			
            $('a.console-cancel').click(function() {
                // var ele = $(this);
                // if (ele.attr('data-paied') == 1) {
                    // paiedDialog(ele.attr('data-id'));
                // } else {
                    // qikoo.popConfirm(ele, '您确定取消本订单吗？',
                    // function() {
                        // $.ajax({
							// url:"{{url('/home/order/del')}}/"+id,
							// type:"GET",
							// success:function(data) {
								// if (data.result == 0) {
									// alert('取消订单失败:' + data.msg);
								// }
								// window.location.reload();
                        // },
                        // 'json')
                    // })
                // },
				// }
				alert('aaaaaa');
			});

            // $('.item-pay').click(function(){
            // 	qikoo.dialog.payNotice();
            // })

            var editAddress = (function() {
                var formEle, addressView;
                var token, id;

                var getViewData = function() {
                    var data = {};
                    $.each(['realname', 'province', 'city', 'county', 'address', 'mobile', 'postcode'],
                    function(i, item) {
                        data[item] = addressView.find('.addr-' + item).text();
                    }) return data;
                }

                var setViewData = function(data) {
                    $.each(data,
                    function(key, val) {
                        addressView.find('.addr-' + key).text(val);
                    })
                }

                var getFormData = function() {
                    var data = {};
                    $.each(['realname', 'province', 'city', 'county', 'address', 'mobile', 'postcode'],
                    function(i, item) {
                        if ({
                            'province': 1,
                            'city': 1,
                            'county': 1
                        } [item]) {
                            data[item] = formEle.find('[name=consignee_add_' + item + '] :selected').text();
                            data[item + '_code'] = formEle.find('[name=consignee_add_' + item + '] :selected').val();
                        } else {
                            data[item] = formEle.find('[name=consignee_add_' + item + ']').val();
                        }
                    }) return data;
                }

                var setFormData = function(data) {
                    $.each(data,
                    function(key, val) {
                        if ({
                            'province': 1,
                            'city': 1,
                            'county': 1
                        } [key]) {
                            widgetAddressSelect.setByStr(key, val);
                        } else {
                            formEle.find('[name=consignee_add_' + key + ']').val(val);
                        }
                    })
                }

                var updateAddressView = function() {
                    var data = getFormData();
                    setViewData(data);
                }

                var initAddressData = function() {
                    var data = getViewData();
                    setFormData(data);
                }

                var show = function() {
                    $('#expressDescEdit').hide();
                    $('#expressDescCancel').show();
                    formEle.show();
                    addressView.hide();

                    initAddressData();
                }

                var hide = function() {
                    $('#expressDescEdit').show();
                    $('#expressDescCancel').hide();
                    formEle.hide();
                    addressView.show();
                }

                var submitForm = function() {
                    var data = getFormData();

                    data.id = id;
                    data.token = token;

                    $.post('/user/updateorderaddr?id=' + id + '&token=' + token, data,
                    function(json) {
                        if (json.errno == 0) {
                            updateAddressView();
                            hide();
                        } else {
                            alert(json.errmsg);
                            // 如果订单状态在修改地址过程中正好变为“正在配货”，则刷新页面
                            if (json.errno == 99999) {
                                window.location.reload();
                            }
                        }
                    },
                    'json')
                }

                var init = function(obj) {
                    token = obj.token;
                    id = obj.id;

                    addressView = $('.update-address .consignee-view');
                    formEle = $('.update-address .consignee-add');

                    $('#expressDescEdit').click(function() {
                        show();
                    })

                    $('#consigneeCancelBtn,#expressDescCancel').click(function() {
                        hide();
                    })

                    $('#consigneeAddBtn').click(function() {
                        submitForm();
                    })

                    widgetAddressSelect && widgetAddressSelect.init();
                }

                return {
                    init: init
                }
            })();
            editAddress.init({
                'token': 'fe19c480539b2c8b5c885dd8a6648d4b',
                'id': '1624308923701000018'
            });

            var editInvoice = (function() {
                var token, id;
                var userSet = {};

                var updateView = function() {
                    location.reload();
                }

                var updateEditForm = function() {
                    if (userSet.type == 0) {
                        $('.invoice-select-type a').removeClass('curr').eq(0).addClass('curr');
                        $('.invoice-select-title, .invoice-select-content').hide();
                        $('.invoice-select-content').hide().find('input').val('无');
                    } else if (userSet.type == 1) {
                        $('.invoice-select-type a').removeClass('curr').eq(1).addClass('curr');
                        $('.invoice-select-title').show().find('a').removeClass('curr').eq(0).addClass('curr');
                        $('.invoice-select-content').hide().find('input').val('个人');
                    } else if (userSet.type == 2) {
                        $('.invoice-select-type a').removeClass('curr').eq(1).addClass('curr');
                        $('.invoice-select-title').show().find('a').removeClass('curr').eq(1).addClass('curr');
                        $('.invoice-select-content').show().find('input').val(userSet.content || "");
                    }
                }

                var show = function() {
                    $('#invoiceDescCancel').show();
                    $('#invoiceDescEdit').hide();
                    $('.invoice-update .consignee-add').show();
                    $('.invoice-update .consignee-view').hide();
                }

                var hide = function() {
                    $('#invoiceDescEdit').show();
                    $('#invoiceDescCancel').hide();
                    $('.invoice-update .consignee-add').hide();
                    $('.invoice-update .consignee-view').show();
                }

                var submitForm = function() {
                    $.post('/user/updateorderbill', {
                        id: id,
                        token: token,
                        bill_type: userSet.type,
                        bill_content: $('input[name=invoiceContent]').val()
                    },
                    function(json) {
                        if (json.errno == 0) {
                            updateView();
                            // hide();
                        } else {
                            qikoo.dialog.alert(json.errmsg);
                            // 如果订单状态在修改地址过程中正好变为“正在配货”，则刷新页面
                            if (json.errno == 99999) {
                                window.location.reload();
                            }
                        }
                    },
                    'json')
                }

                var bind = function() {
                    $('#invoiceDescCancel,#invoiceCancelBtn').click(function() {
                        hide();
                    })

                    $('#invoiceDescEdit').click(function() {
                        show();
                    })

                    $('.invoice-update .invoice-select-type a').click(function() {
                        userSet.type = $(this).attr('data-value');
                        updateEditForm();
                    });

                    $('.invoice-update .invoice-select-title a').click(function() {
                        userSet.type = $(this).attr('data-value');
                        updateEditForm();
                    });

                    $('#invoiceAddBtn').click(function() {
                        submitForm();
                    })
                }

                var init = function(config) {
                    token = config.token;
                    id = config.id;

                    userSet.type = config.type;
                    userSet.content = config.content;
                    updateEditForm();

                    bind();
                }

                return {
                    init: init
                }
            })();
            editInvoice.init({
                'token': 'fe19c480539b2c8b5c885dd8a6648d4b',
                'id': '1624308923701000018',
                'type': '0',
                'content': ''
            });

            var paiedDialog = function(id) {
                var html = ['<div class="dialog-content">', '<div class="dialog-paied-cancel">', '<div class="cancel-reason">', '<b>取消原因：</b>', '<div class="select-input">', '<b id="reportCategory">请选择</b>', '<svg><path fill="transparent" stroke="#fff" stroke-width="2" d="M4,8L10,14L16,8"></path></svg>', '<div class="select-list">', '<a class="select-item" data-id="现在不想购买">现在不想购买</a>', '<a class="select-item" data-id="收货人信息有误">收货人信息有误</a>', '<a class="select-item" data-id="发票信息有误">发票信息有误</a>', '<a class="select-item" data-id="重复下单">重复下单</a>', '<a class="select-item" data-id="发货时间过长">发货时间过长</a>', '<a class="select-item" data-id="其它原因">其它原因</a>', '</div>', '</div>', '<div class="errtip">请填写取消原因</div>', '</div>', '<p>温馨提示：</p>', '<p>· 订单成功取消后无法恢复</p>', '<p>· 该订单已付金额将按您支付方式原路返还到您的账户</p>', '</div>', '</div>', '<div class="dialog-console clearfix_new">', '<a class="console-btn-confirm" href="#" onclick="return false;">确定取消</a>', '<a class="console-btn-cancel" href="#" onclick="return false;">暂不取消</a>', '</div>'].join('');

                var ele = qikoo.dialog.show({
                    html: html,
                    title: '取消订单',
                    width: 530
                });

                // 类别选择
                ele.find('.select-input').click(function(e) {
                    var ele = $(e.target);
                    if (ele.hasClass('select-item')) {
                        $(this).find('b').html(ele.text());
                        $(this).find('.select-item').removeClass('item-curr');
                        ele.addClass('item-curr');
                        // $('.select-list').hide();
                    } else {
                        setTimeout(function() {
                            $('.select-list').show();
                        },
                        100);
                    }
                })

                var sendingCancel = false;
                ele.find('.console-btn-confirm').click(function() {
                    if (sendingCancel) return;
                    var reason = ele.find('.item-curr').text();
                    if (reason) {
                        sendingCancel = true;
                        $.post("/user/cancelmypayedorder", {
                            id: id,
                            token: 'fe19c480539b2c8b5c885dd8a6648d4b',
                            reason: reason
                        },
                        function(data) {
                            sendingCancel = false;
                            if (data.errno == 0) {
                                window.location.reload();
                            } else {
                                qikoo.dialog.alert(data.errmsg);
                            }
                        },
                        'json')

                    } else {
                        ele.find('.errtip').show();
                        ele.find('.select-input').addClass('select-error').on('click',
                        function() {
                            $(this).removeClass('select-error');
                            ele.find('.errtip').hide();
                        })
                    }

                })

                ele.find('.console-btn-cancel').click(function() {
                    qikoo.dialog.hide();
                })

                $('body').click(function() {
                    $('.select-list').hide();
                })
            }

            $('.item-comfirm-packet').click(function() {
                var id = $(this).attr('data-id');
                qikoo.dialog.confirm("如您已收到货物，请点击确定按钮。",
                function() {
                    $.post('/user/finishmyorder', {
                        id: id,
                        token: 'fe19c480539b2c8b5c885dd8a6648d4b'
                    },
                    function(data) {
                        if (data && data.errno == 0) {
                            location.reload();
                        } else {
                            qikoo.dialog.alert(data.errmsg)
                        }
                    },
                    'json')
                })
            })
        </script>
        <script>
            $.getScript("https://s.ssl.qhmsg.com/monitor/;monitor/8e133f74.js",
            function() {
                function e() {
                    var e = window.location.search.substring(1).split("&"),
                    t = {},
                    n,
                    r;
                    for (r in e) {
                        if (e[r] === "") continue;
                        n = e[r].split("="),
                        t[decodeURIComponent(n[0])] = decodeURIComponent(n[1])
                    }
                    return t
                }
                monitor.data.getTrack = function() {
                    var t = document.cookie.match(/qid%3D([\d]*)/),
                    n = e();
                    return t && (n.qid = t[1]),
                    n.b = monitor.util.getBrowser(),
                    n.c = monitor.util.getCount(),
                    n.r = monitor.util.getReferrer(),
                    n.fl = monitor.util.getFlashVer(),
                    n
                },
                monitor.setProject("360_qikoo").getTrack().getClickAndKeydown(),
                $("body").on("click", "[data-monitor]",
                function() {
                    var e = $(this).data("monitor") + "",
                    t = e.split("_");
                    if (t.length != 3) return;
                    $.each(t,
                    function(e, n) {
                        t[e] = n
                    });
                    var n = "http://s.360.cn/mall360/clk.htm?page=" + t[0] + "&board=" + t[1] + "&place=" + t[2] + "&guid=" + monitor.util.getGuid() + "&port=pc";
                    $.ajax({
                        dataType: "jsonp",
                        url: n
                    })
                })
            })
        </script>
        
@endsection