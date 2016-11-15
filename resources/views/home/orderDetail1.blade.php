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
            < !--导航下拉start--><ul class = "sub-nav-list" > {
                {
                    
                }
            } < li > <a href = "#" / ><span > {
                {
                   dsd
                }
            } < /span>
                <i>1232元</i > </a>
        </li > {
                { / each
                }
            } < /ul>/
        </script>
        <style>
            body{background:#f2f2f2}
        </style>
        <div class="c m-t-30" style="clear:both">
            <div class="content mall_head">
                <div class="mall_cont">
                    <div class="mall_modw">
                        <div class="hd">
                            <h3>
                                收货地址
                            </h3>
                            <span style="color:red;font-size:14px;padding:10px">
                                温馨提示：为了保证您的权益，防止黄牛倒卖，订单进入正在配货状态将不能修改收货地址和发票信息！
                            </span>
                        </div>
                        <div class="bd">
                            <div class="consigneeinfo addr-box">
                                <p id="addressUpdate" style="color:red;display:none;padding:10px">
                                    尊敬的用户，由于地址库更新，为提高物流效率，建议您尽快升级您的收货地址！
                                </p>
                                <div class="mod-consignee-info" data-token="54b79e">
                                    <div class="consignee-item item-checked">
                                        <input name="consignee_realname" value="刘建伟" type="hidden">
                                        <input name="consignee_mobile" value="18210485167" type="hidden">
                                        <input name="consignee_province" value="110000" type="hidden">
                                        <input name="consignee_city" value="110100" type="hidden">
                                        <input name="consignee_county" value="110114" type="hidden">
                                        <input name="consignee_address" value="北京回龙观育荣教育园区" type="hidden">
                                        <input name="consignee_postcode" value="100001" type="hidden">
                                        <span class="item-action">
                                            <a href="javascript:;" class="action-edit" title="编辑" data-monitor="user_address_editor">
                                                编辑
                                            </a>
                                        </span>
                                        <i class="input-radio-view">
                                        </i>
                                        <input class="input-radio" name="consignee_radio" value="0" id="consigneeRadio0"
                                        checked="checked" type="radio">
                                        <label for="consigneeRadio0">
                                            刘建伟，北京 北京市 昌平区 北京回龙观育荣教育园区，18210485167
                                        </label>
                                        <div class="disable-cover">
                                            <span class="item-action" style="display:block;float:right">
                                            </span>
                                            <a href="javascript:;" class="update-btn">
                                                升级
                                            </a>
                                        </div>
                                    </div>
                                    <div class="consignee-blank" style="display:none">
                                        <input name="consignee_realname" value="" type="hidden">
                                        <input name="consignee_mobile" value="" type="hidden">
                                        <input name="consignee_province" value="" type="hidden">
                                        <input name="consignee_city" value="" type="hidden">
                                        <input name="consignee_county" value="" type="hidden">
                                        <input name="consignee_address" value="" type="hidden">
                                        <input name="consignee_postcode" value="" type="hidden">
                                        <span class="item-action">
                                            <a href="javascript:;" class="action-edit" title="编辑" data-monitor="user_address_editor">
                                                编辑
                                            </a>
                                        </span>
                                        <i class="input-radio-view">
                                        </i>
                                        <input class="input-radio" name="consignee_radio" value="" type="radio">
                                        <label>
                                        </label>
                                        <div class="disable-cover">
                                            <a href="javascript:;" onclick="return false" class="update-btn">
                                                升级
                                            </a>
                                            ｜
                                            <a href="javascript:;" class="action-del" title="删除" data-monitor="user_address_delete">
                                                删除
                                            </a>
                                        </div>
                                    </div>
                                    <a class="consignee-btn-add" href="javascript:;" title="添加新地址" data-monitor="user_address_add">
                                    </a>
                                    <div class="consignee-add">
                                        <form>
                                            <div class="add-row">
                                                <label class="consignee-add-label" for="consignee_add_realname">
                                                    <b>
                                                        *
                                                    </b>
                                                    收货人姓名
                                                </label>
                                                <input name="consignee_add_realname" class="consignee-add-text" placeholder="收货人姓名"
                                                type="text">
                                            </div>
                                            <div class="add-row m-t-10">
                                                <label class="consignee-add-label" for="consignee_add_province">
                                                    <b>
                                                        *
                                                    </b>
                                                    地址
                                                </label>
                                                <select class="consignee-add-select" name="consignee_add_province">
                                                    <option value="-1" selected="selected">
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
                                                    <option value="-1" selected="selected">
                                                        请选择
                                                    </option>
                                                </select>
                                                <select class="consignee-add-select" name="consignee_add_county">
                                                    <option value="-1" selected="selected">
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
                                                <input name="consignee_add_postcode" class="consignee-add-text" placeholder="6位邮政编码"
                                                onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"
                                                maxlength="6" type="text">
                                            </div>
                                            <div class="add-row m-t-10">
                                                <label class="consignee-add-label" for="consignee_add_mobile">
                                                    <b>
                                                        *
                                                    </b>
                                                    手机号码
                                                </label>
                                                <input name="consignee_add_mobile" class="consignee-add-text" placeholder="11位手机号"
                                                type="text">
                                            </div>
                                            <input name="consignee_add_addr_id" value="" type="hidden">
                                            <div class="add-row m-t-10">
                                                <p class="m-t-20">
                                                    <a href="javascript:;" id="consigneeAddBtn" class="mod-btn-green">
                                                        保存
                                                    </a>
                                                    <a href="javascript:;" id="consigneeCancelBtn" class="mod-btn-gray">
                                                        取消
                                                    </a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script src="{{asset('js/home/widget_address.js')}}">
                                </script>
                                <script>
                                    widgetAddress && widgetAddress.init()
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="mall_modw">
                        <div class="hd">
                            <h3>
                                支付方式
                            </h3>
                        </div>
                        <div class="bd">
                            <div class="onlinePay">
                                <div class="formEle">
                                    <div class="eleRadio">
                                        <input checked="checked" name="payment" class="hookbox ip" value="在线支付"
                                        type="radio">
                                        <label>
											@if($v->pay == 0) 支付宝 @elseif($v->pay == 1) 储蓄卡 @elseif($v->pay == 2) 信用卡 @else($v->pay == 3) 货到付款 @endif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mall_modw">
                        <div class="hd">
                            <h3>
                                配送方式
                            </h3>
                        </div>
                        <div class="bd">
                            <div class="onlinePay">
                                <div class="formEle">
                                    <div class="eleRadio">
                                        <input checked="checked" name="mailCharge" class="hookbox ip" value="加配送费0元"
                                        type="radio">
                                        <label>
                                            @if($v->deliver == 0) 普通快递 @elseif($v->deliver == 1) 邮政 @elseif($v->deliver == 2) CMS @else($v->deliver == 3) 自取 @endif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mall_modw">
                        <div class="hd">
                            <h3>
                                发票信息
                            </h3>
                        </div>
                        <div class="bd">
                            <div class="onlinePay">
                                <div class="formEle">
                                    <div class="eleRadioa">
                                        <div class="eleRadio">
                                            </span>
                                            <input checked="{{ $v->invoice == 0 ? 'checked' : '' }}" id="nInvoice" name="invoice[0]" class="hookbox ip"
                                            value="不开发票" type="radio">
                                            <label>
                                                不开发票
                                            </label>
                                        </div>
                                        <div class="eleRadio">
                                            <input checked="{{ $v->invoice == 1 ? 'checked' : '' }}" name="invoice[0]" id="yInvoice" class="hookbox ip" value="普通发票"
                                            type="radio">
                                            <label>
                                                普通发票
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="con">
                                    <div class="txt">
                                        发票内容：{{ $v->remark }}
                                    </div>
                                    <div class="txt">
                                        发票抬头：{{ $v->invInfo }}
										
                                    </div>
									<!--
                                    <div class="sltcate">
										
                                        <a href="javascript:void(0);" id="sltcate_person" class="selected" data-monitor="gotoorder_invoice_personal">
                                            个人
                                        </a>
										
                                        <a href="javascript:void(0);" id="sltcate_company" data-monitor="gotoorder_invoice_unit">
                                            单位
                                        </a>
                                    </div>
                                    <div class="invoiceInfo">
                                        <div class="txt">
                                            单位名称：
                                        </div>
                                        <input id="companyName" maxlength="30" type="text">
                                        <span class="company_empty" style="color:red;display:none;font-size:13px;padding-left:10px">
                                            单位名称不能为空
                                        </span>
										-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .zp_wrap{background-color:#F5F5F5;margin-top:18px;padding:13px;position:relative}.zp_list{height:75px;line-height:75px;margin-bottom:13px}.zp_l1{float:left;width:420px}.zp_none{float:left;text-align:center;width:40px}.zp_sanjiao{border:15px
                        solid #fff;border-bottom:15px solid #F5F5F5;height:0;left:40px;position:absolute;top:-30px;width:0}.zp_list:last-child{margin-bottom:0}.cont
                        li.gout{width:895px}
                    </style>
                    <div class="mall_modw">
                        <div class="hd nobdr">
                            <h3>
                                商品清单
                            </h3>
                        </div>
                        <div class="bd">
                            <div class="goodList">
                                <div class="title">
                                    <div class="t1">
                                        商品名称
                                    </div>
                                    <div class="t2">
                                        单价
                                    </div>
                                    <div class="t3">
                                        数量
                                    </div>
                                    <div class="t4">
                                        合计
                                    </div>
                                </div>
                                <div class="cont">
									
                                    <ul>
                                        <li data-item_id="56e38cc25efb1184378b4567" item_id="56e38cc25efb1184378b4567"
                                        item_count="1" item_total=" 169.00" class="nomgr">
                                            <div class="clearfix_new" style="padding:13px">
											
                                                <div class="l1">
                                                    <img src="{{ asset(url($od->picture)) }}">
                                                    <span>
													{{ $od->good }}
                                                    </span>
                                                </div>
										
                                                <div class="l2">
                                                    ¥
                                                    <span class="sCount">
                                                        {{ $od->price }}
                                                    </span>
                                                </div>
                                                <div class="l3">
                                                    <div class="gcIpt">
                                                        ×
                                                        <span>
                                                            {{ $od->count }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="l4">
                                                    ¥
                                                    <span class="allCount">
                                                        {{ $od->count*$od->price }}
                                                    </span>
                                                </div>
                                            </div>
                                            
                                        </li>
                                    </ul>
								
                                </div>
                                <div class="total" style="visibility: visible;">
                                    <ul>
                                        <li>
                                            共
                                            <span id="gCount">
                                                {{ $od->count }}
                                            </span>
                                            件
                                        </li>
                                        <li id="zCount">
                                            金额合计：{{ $od->count*$od->price }}元
                                        </li>
                                        <li id="zDiscount">
                                            优惠抵扣：-0.00元
                                        </li>
                                        <li id="zExpressFee">
                                            配送费：0元
                                        </li>
                                        <li class="bold">
                                            应付总额：
                                            <span id="tatalCount">
                                                {{ $od->count*$od->price }}
                                            </span>
                                            元
                                        </li>
                                    </ul>
                                </div>
                                <div class="gotoorder-coupon">
                                    <div class="gotoorder-coupon-content">
                                        <div class="coupontitle">
                                            使用优惠码
                                            <span style="position:relative">
                                                <a class="help-icon">
                                                </a>
                                                <div class="coupon-help" style="display:block">
                                                    <div class="coupon-help-content">
                                                        <p>
                                                            每张订单只能使用一张券，且不能与其他任一优惠券叠加使用。
                                                        </p>
                                                    </div>
                                                    <div class="xiasanjiaoborder">
                                                    </div>
                                                    <div class="xiasanjiao">
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                        <div id="coupon-use">
                                            <div id="coupon1">
                                                <div class="coupon-input">
                                                    优惠码：
                                                    <input id="couponCode_input" type="text">
                                                </div>
                                                <p class="buttons">
                                                    <a class="coupon-btn coupon-btn-reverse" id="coupon-useBtn1" data-monitor="gotoorder_coupon_use">
                                                        立即使用
                                                    </a>
                                                    <a class="coupon-btn coupon-btn-disabed" id="coupon-loadingBtn1" style="display:none">
                                                        验证中...
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div id="coupon-current" style="display:none">
                                            <div class="coupon-current">
                                                <p>
                                                    已使用
                                                    <s>
                                                    </s>
                                                </p>
                                            </div>
                                            <p class="buttons">
                                                <a class="coupon-btn coupon-btn-reverse" id="coupon-cancelBtn">
                                                    取消使用
                                                </a>
                                            </p>
                                        </div>
                                        <div class="coupon-tips">
                                            <p id="coupon-tips">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mailTo">
                                <p>
                                    寄送至：北京 北京市 昌平区 北京回龙观育荣教育园区
                                </p>
                                <p>
                                    刘建伟 (收件人) 18210485167
                                </p>
                            </div>
                            <a href="javascript:void(0);" class="form_btn" id="orderSubmit" title="立即下单"
                            data-monitor="gotoorder_placeorder_click">
                                立即下单
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </ul>
        <!--[if lte IE 6]>
            <script src="https://s.ssl.qhmsg.com/static/f54f2caa703115b3/DD_belatedPNG_0.0.8a.js">
            </script>
            <script>
                DD_belatedPNG.fix("div, ul, img, li, input, a, span, i")
            </script>
        <![endif]-->
        <script>
            mall_page.has_bill = 0;
            mall_page.price_express = '0' | 0;

            var glb = 0,
            city_id = "36",
            province_id = city_id = piecearea_id = 0;
            var orderData = orderData || {};
            orderData.gCount = 0;
            orderData.price_express = mall_page.price_express;
            orderData.gAmount = 0;
            orderData.allCount = 0;
        </script>
        <script src="{{asset('js/home/qikoo_gotoorder.js')}}">
        </script>
        <script>
            $(function() {
                $(".mod-consignee-info").delegate(".consignee-item", "click",
                function(e) {
                    $(this).children(".input-radio")[0].checked == 1 && ($(this).prev(".rd").addClass("rdc"), $(this).parent().siblings(".eleRadio").children(".rd").removeClass("rdc"), $(this).parent().parent().siblings(".item").children(".eleRadio").children(".rd").removeClass("rdc"), $("#item_add").removeClass("item-checked"), $("#item_add .rd").removeClass("rdc"), $(e.target).parent().parent().attr("id") == "item_add" ? ($(".consigneeinfo .rd").removeClass("rdc"), $("#item_add").children(".eleRadio").children(".rd").addClass("rdc"), $("#item_add").addClass("item-checked")) : ($("<p></p>").text("\u5bc4\u9001\u81f3\uff1a" + $(".item-checked label").text().split("\uff0c", 3)[1]).appendTo($(".mailTo").empty()), $("<p></p>").text($(".item-checked label").text().split("\uff0c", 3)[0] + " (\u6536\u4ef6\u4eba) " + $(".item-checked label").text().split("\uff0c", 3)[2]).appendTo(".mailTo"))),
                    setTimeout(function() {
                        $("<p></p>").text("\u5bc4\u9001\u81f3\uff1a" + $(".item-checked label").text().split("\uff0c", 3)[1]).appendTo($(".mailTo").empty()),
                        $("<p></p>").text($(".item-checked label").text().split("\uff0c", 3)[0] + " (\u6536\u4ef6\u4eba) " + $(".item-checked label").text().split("\uff0c", 3)[2]).appendTo(".mailTo")
                    })
                }),
                $("body").on(".mod-consignee-info .consignee-item", "click",
                function() {
                    return
                }),
                widgetAddress.get() == null ? $(".mailTo").children("p").html(" ") : ($("<p></p>").text("\u5bc4\u9001\u81f3\uff1a" + $(".item-checked label").text().split("\uff0c", 3)[1]).appendTo($(".mailTo").empty()), $("<p></p>").text($(".item-checked label").text().split("\uff0c", 3)[0] + " (\u6536\u4ef6\u4eba) " + $(".item-checked label").text().split("\uff0c", 3)[2]).appendTo(".mailTo"))
            })
        </script>
        <style>
            .l4 s,.l4 .disCount,.l4 br{display:none}
        </style>
        <script id="tpl_zp_list" type="text/html">
            < div class = "clearfix_new zp_wrap " > <div class = "zp_sanjiao" > </div>
        1234
        <div class="zp_list" data-item_id="2">
            <div class="zp_l1" style="position:relative;">
                <img src="#">
                <div style="position:absolute; top:0; left:100px; background-color:#ff6a00;color:#fff;border-radius:2px; padding:0 5px; line-height:22px; height:22px; ">赠品</div > <span style = "padding-left: 23px;  width: 250px; display:block;white-space:nowrap; overflow:hidden; text-overflow:ellipsis;" > {
                {
                    
                }
            } < /span>
            </div > <div class = "zp_none" > {
                {
                    
                }
            } & nbsp; < /div>
            <div class="l2">
                ¥<span class="sCount">0.00</span > </div>
            <div class="l3">
                <div class="gcIpt">
                    x <span>1111</span > </div>
            </div > <div class = "l4 zp_l4" > ¥ < span class = "allCount" > 0.00 < /span>
            </div > </div>
        {{/each
        }
    } < /div>/
        </script>
        <script>
            function get_buyfree() {
                var e = {};
                return $(".cont li").each(function() {
                    var t = this;
                    e[$(t).data("item_id")] = function() {
                        var e = [];
                        return $(t).find(".zp_list").each(function() {
                            var t = this;
                            e.push($(t).data("item_id"))
                        }),
                        e
                    } ()
                }),
                e
            } (function() {
                var e = "";
                location.href.indexOf("liyingying.qikoo.360.cn") > 0 || location.href.indexOf("duanqifeng.qikoo.360.com") > 0 ? e = "http://liyingying.qikoo.360.cn/shop/getbuyfreeinfo": e = "/shop/getbuyfreeinfo",
                $.ajax({
                    url: e,
                    dataType: "JSONP"
                }).done(function(e) {
                    var t = qikoo.getUrlParam("url_zp_info");
                    if (t == "") return;
                    t = JSON.parse(decodeURI(t)),
                    $.each(t,
                    function(t, n) {
                        $.each(e.data,
                        function(e, r) {
                            t == e && $.each(r.buyfree,
                            function(e, t) {
                                $.each(t.data,
                                function(e, t) {
                                    $.each(n.zp_list,
                                    function(e, n) {
                                        e == t.item_id && (t.item_amount < t.count ? n.has_store = "\u552e\u7f44": n.has_store = "", n.title = t.iteminfo.title, n.count = t.count)
                                    })
                                })
                            })
                        })
                    }),
                    $(".cont ul li").not(".gout1").each(function() {
                        var e = this,
                        n = $(this).data("item_id");
                        $.each(t,
                        function(t, n) {
                            $(e).data("item_id") == t && $(e).append(template("tpl_zp_list", n))
                        })
                    })
                })
            })()
        </script>
        <script>
            //结账商品总数
            var companyEmpty = true,
            needBill = false,
            isPersonal = false,
            companyName = "";
            $("#companyName").blur(function() {
                if ($("#sltcate_company").hasClass("selected")) {
                    companyName = $("#companyName").val();
                    if (companyName == "" || companyName == null || typeof companyName == 'undefined') {
                        $(".company_empty").css("display", "inline");
                        companyEmpty = true;
                    } else {
                        $(".company_empty").css("display", "none");
                        companyEmpty = false;
                    }
                }
            });

            $("#orderSubmit").data('freestock', 0);
            $("#orderSubmit").click(function() {
                if (widgetAddress.get() == null) {
                    $("html,body").animate({
                        scrollTop: $(".addr-box").offset().top
                    },
                    500);
                    alert("请先保存收货地址");
                } else if ($("#newaddress").css("display") == "block") {
                    $("html,body").animate({
                        scrollTop: $(".addr-box").offset().top
                    },
                    500);
                    alert("请先保存收货地址");
                } else if ($(".item-checked").attr("id") != "item_add" && $(".consigneeinfo .formEle").size() == 1 || $("#newaddress").css("display") == "block") {
                    $("html,body").animate({
                        scrollTop: $(".addr-box").offset().top
                    },
                    500);
                    alert("请先保存收货地址");
                } else {
                    var addressInfo = widgetAddress.getByName();
                    var addrCodes = widgetAddress.get();
                    orderData.goodsCount = $("#goodsCount").val();
                    orderData.item_id = "";
                    if ($("#nInvoice")[0].checked == true) {
                        orderData.bill_type = 0;
                        orderData.bill_content = "";
                        needBill = false;
                    } else if ($("#yInvoice")[0].checked == true) {
                        needBill = true;
                        if ($("#sltcate_person").hasClass("selected")) {
                            orderData.bill_content = "个人";
                            orderData.bill_type = 1;
                            isPersonal = true;
                        } else if ($("#sltcate_company").hasClass("selected")) {
                            isPersonal = false;
                            orderData.bill_type = 2;
                            orderData.bill_content = $("#companyName").val();
                        }
                    }

                    if (!needBill || isPersonal || !companyEmpty) {
                        //console.log("名称合法："+!companyEmpty+"个人发票："+isPersonal+"公司名称："+orderData.bill_content+"需要发票："+needBill);
                        qikoo.dialog.show('正在提交数据，请稍后');
                        $.post("/buy/createorder/", {
                            buyfree: JSON.stringify(get_buyfree()),
                            freestock: $("#orderSubmit").data('freestock'),
                            address: addressInfo.address,
                            province: addressInfo.province,
                            city: addressInfo.city,
                            county: addressInfo.county,
                            postcode: addressInfo.postcode,
                            realname: addressInfo.realname,
                            mobile: addressInfo.mobile,
                            price_express: orderData.price_express,
                            bill_type: orderData.bill_type,
                            bill_content: orderData.bill_content,
                            salecode: orderData.couponCode,
                            address_code: addrCodes.county
                        },
                        function(d) {
                            var dt = eval("(" + d + ")");
                            if (dt.errno == 0) {
                                setTimeout(function() {
                                    location.href = "/shop/ordersucc?order_id=" + dt.id;
                                },
                                2000)
                            } else if (dt.errno == 40002 || dt.errno == 40001) { //
                                qikoo.dialog.alert(dt.errmsg,
                                function() {
                                    location.href = location.href;
                                })
                            } else if (dt.errno == 40042 || dt.errno == 40041) {
                                qikoo.dialog.confirm(dt.errmsg,
                                function() {
                                    $("#orderSubmit").data('freestock', 1) setTimeout(function() {
                                        $("#orderSubmit").click();
                                    });
                                })
                            } else {
                                qikoo.dialog.alert(dt.errmsg)
                            }
                        });
                    } else {
                        $("html,body").animate({
                            scrollTop: $("#companyName").offset().top
                        },
                        300);
                        $(".company_empty").css("display", "inline");
                        alert("发票单位名称不能为空")
                    }
                }
            });
        </script>   
@endsection