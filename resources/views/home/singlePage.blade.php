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
     @if( session('addressInfo') == 'success' )
            <script type="text/javascript">
		        $(function(){
		            SimplePop.alert("新增收货地址成功!");
		        });
		    </script>
        @endif
        @if( session('addressInfo') == 'error' )
            <script type="text/javascript">
		        $(function(){
		            SimplePop.alert("对不起,新增收货地址失败!");
		        });
		    </script>
        @endif
        @if( session('editAdd') == 'success' )
            <script type="text/javascript">
		        $(function(){
		            SimplePop.alert("修改成功!");
		        });
		    </script>
        @endif
        @if( session('editAdd') == 'error' )
            <script type="text/javascript">
		        $(function(){
		            SimplePop.alert("对不起,修改失败!");
		        });
		    </script>
        @endif
        <style>
            body{background:#f2f2f2}
        </style>
        <div class="c m-t-30" style="clear:both">
            <div class="content mall_head">
                <div class="mall_cont">

                    <div class="user-main">
                        <div class="addr-box">
                            <h1>
                                收货地址
                            </h1>
                            <p id="addressUpdate" style="color:red;display:none;padding:10px">
                                尊敬的用户，由于地址库更新，为提高物流效率，建议您尽快升级您的收货地址！
                            </p>
                            <div class="mod-consignee-info" data-token="54b79e">
                                
                                @foreach($data as $address)
                                
                                <div class="consignee-item item-checked" > 
									<input  id="nInvoice" name="invoice3" class="hookbox ip abc" type="radio"
                                            value="{{$address->id}}"  data-values="{{ $address->consignee }},{{ $address->province1 }} {{ isset($address->city1) ? $address->city1 : '' }} {{ isset($address->district1) ? $address->district1 : '' }} {{ isset($address->township1) ? $address->township1 : '' }} {{ $address->street }},{{ $address->phone }}"/>
											
												 {{ $address->consignee }}，{{ $address->province1 }} {{ isset($address->city1) ? $address->city1 : '' }} {{ isset($address->district1) ? $address->district1 : '' }} {{ isset($address->township1) ? $address->township1 : '' }} {{ $address->street }}，{{ $address->phone }} 
							
                                    <span class="item-action"> 
                                        <a class="action-edit" onclick="doEdit({{ $address->id }})" title="编辑" style="cursor:pointer;">编辑</a>
                                        ｜ 
                                        <a class="action-del" onclick="doDel({{ $address->id }})" style="cursor:pointer;" title="删除">删除</a> 
                                    </span> 
                                    <i class="input-radio-view myaddress" style="background-position-y:2px;"></i> 
                                    <input class="input-radio" type="radio" name="consignee_radio" value="0" id="consigneeRadio0" checked> 
                                    <label for="consigneeRadio0" class="addDetail" style="font-weight:normal;">
                                    {{ $address->consignee }}，{{ $address->province1 }} {{ isset($address->city1) ? $address->city1 : '' }} {{ isset($address->district1) ? $address->district1 : '' }} {{ isset($address->township1) ? $address->township1 : '' }} {{ $address->street }}，{{ $address->phone }} 
                                    </label>
                                    
                                </div>
                                @endforeach
   
                                <span class="consignee-btn-add aaa"  title="添加新地址" style="display: block;cursor:pointer;"></span>
                                <div class="consignee-item consignee_item_new item-checked" style="display:none;">
                                    <i class="input-radio-view">
                                    </i>
                                    <input class="input-radio" checked="checked" name="consignee_radio" id="consigneeRadioAddNew" value="-1" type="radio">
                                    <label for="consigneeRadioAddNew">
                                        使用新地址
                                    </label>
                                </div>
                                <div class="consignee-add" style="display: none;">
                                    <form id="fid" action="{{url('home/insertAdd')}}" method="post" onsubmit="return checkAddress()">
                                        <input type='hidden' name='_token' value="{{ csrf_token('editAdd') }}">
                                        <input type="reset" name="reset" style="display: none;" />
                                        <div class="add-row">
                                            <label class="consignee-add-label" for="consignee_add_realname">
                                                <b>
                                                    *
                                                </b>
                                                收货人姓名
                                            </label>
                                            <input name="consignee" id="consignee" class="consignee-add-text" placeholder="收货人姓名" type="text"/>
                                        </div>
                                        <div class="add-row m-t-10">
                                            <label class="consignee-add-label" for="consignee_add_province">
                                                <b>
                                                    *
                                                </b>
                                                地址
                                            </label>
                                            <div id="addressInfo"></div>
                                            <textarea class="consignee-add-address" name="street" id="street" placeholder="路名或街道地址，门牌号（可选填）"></textarea>
                                        </div>
                                        <div class="add-row m-t-10">
                                            <label class="consignee-add-label" for="postcode">
                                                邮政编码
                                            </label>
                                            <input name="postcode" id="postcode" class="consignee-add-text" placeholder="6位邮政编码（可选填）" maxlength="6" type="text">
                                        </div>
                                        <div class="add-row m-t-10">
                                            <label class="consignee-add-label" for="consignee_add_mobile">
                                                <b>
                                                    *
                                                </b>
                                                手机号码
                                            </label>
                                            <input name="phone" id="phone" class="phone" placeholder="11位手机号" type="text">
                                        </div>
                                        <input name="id" value="" type="hidden">
                                        <div class="add-row m-t-10">
                                            <p class="m-t-20">
                                                <button type="submit" id="btnAlert" class="mod-btn-green">
                                                    保存
                                                </button>
                                                <button type="button" id="consigneeCancelBtn" class="mod-btn-gray">
                                                    取消
                                                </button>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
				<form action="" style="display:none;" id="mydeleteform" method="get">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="_method" value="DELETE">
				</form>
				<form id='order' action="{{url('/home/myorder')}}" method='post'>
				
                    <div class="mall_modw">
                        <div class="hd">
                            <h3>
                                支付方式
                            </h3>
                        </div>
                        <div class="bd">
                            <div class="onlinePay">
                                <div class="formEle">
                                    <div class="eleRadioa">
                                        <div class="eleRadio">
                                            <input  id="nInvoice" name="invoice" class="hookbox ip"
                                            value="支付宝" type="radio">
                                            <label>
                                                支付宝
                                            </label>
                                        </div>
                                        <div class="eleRadio">
                                            <input name="invoice" id="nInvoice" class="hookbox ip" value="储蓄卡"
                                            type="radio">
                                            <label>
                                                储蓄卡
                                            </label>
                                        </div>
										<div class="eleRadio">
                                            <input name="invoice id="nInvoice" class="hookbox ip" value="信用卡"
                                            type="radio">
                                            <label>
                                                信用卡
                                            </label>
                                        </div>
										<div class="eleRadio">
                                            <input name="invoice" id="nInvoice" class="hookbox ip" value="货到付款"
                                            type="radio">
                                            <label>
                                                货到付款
                                            </label>
                                        </div>
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
                                    <div class="eleRadioa">
                                        <div class="eleRadio">
                                            <input  id="nInvoice" name="invoice1" class="hookbox ip"
                                            value="普通快递" type="radio">
                                            <label>
                                                普通快递
                                            </label>
                                        </div>
                                       <div class="eleRadio">
                                            <input name="invoice1" id="nInvoice" class="hookbox ip" value="邮政"
                                            type="radio">
                                            <label>
                                                邮政
                                            </label>
                                        </div>
										<div class="eleRadio">
                                            <input name="invoice1" id="nInvoice" class="hookbox ip" value="CMS"
                                            type="radio">
                                            <label>
                                                CMS
                                            </label>
                                        </div>
										<div class="eleRadio">
                                            <input name="invoice1" id="nInvoice" class="hookbox ip" value="自取"
                                            type="radio">
                                            <label>
                                                自取
                                            </label>
                                        </div>
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
                                            <input  id="nInvoice" name="invoice2" class="hookbox ip"
                                            value="不开发票" type="radio">
                                            <label>
                                                不开发票
                                            </label>
                                        </div>
                                        <div class="eleRadio">
                                            <input name="invoice2" id="yInvoice" class="hookbox ip" value="普通发票"
                                            type="radio">
                                            <label>
                                                普通发票
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="con">
                                    <div class="txt">
										发票内容：<input name='remark' type='text' placeholder="请认真填写明细"/>
                                    </div>
                                    <div class="txt">
										发票抬头：<input name='invInfo' type='text' placeholder="单位名称"/>
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
							
								@foreach($db as $od)
									<input type="hidden" name='address_id' id="address_id" value="0">
									<input type="hidden" name="_token" value="{{ csrf_token()}}">
									<input type="hidden" name='uid'  value="{{ session('homeuser')->id }}">
									<input type="hidden" name='goodid[]'  value="{{ $od->gid }}">
									<input type="hidden" name='count'  value="{{ $od->count }}">
									<input type="hidden" name='price'  value="{{ $od->price }}">
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
								@endforeach
                                </div>
							</form>
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
                                        <li class="bold">
                                            应付总额：
                                            <span id="tatalCount">
                                                {{ $od->count*$od->price }}
                                            </span>
                                            元
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                            <div class="mailTo" id="abv">
                                <p >
                                    寄送至： 
                                </p>
                                <p>
                                     
                                </p>
                            </div
								     
                            <a href="javascript:void(0);" class="form_btn" id="orderSubmit" onclick='addorder()' title="立即下单"
                            data-monitor="gotoorder_placeorder_click">
                                <button onclick='addorder()' style=" float:right; border-radius:4px;width:150px; height:36px;color:#ffffff; font-size:20px;background-color:#FF8200; margin:10px 20px 0 0;">立即下单</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        	
        </ul>		
		<script type="text/javascript">
				$(".abc").click(function(){	
					var address_id = $(this).val();//获取地址表 id
					$("#address_id").val(address_id);//选择后的地址表id,赋值到form表单
					//alert(address_id);
					
					var address = $(this).data('values');//获取选择的地址内容
					var arr = address.split(",");//分解字符串到数组
					$("#abv").html('');//清空 底部的 寄送至标签内容
					var p1="<p>寄送至:"+arr[1]+"</p>";
					var p2="<p>"+arr[0]+"(收件人)"+arr[2]+"</p>";
					$("#abv").append(p1);
					$("#abv").append(p2);
				});
			</script>
			<!--[if lte IE 6]>
				<script src="https://s.ssl.qhmsg.com/static/f54f2caa703115b3/DD_belatedPNG_0.0.8a.js">
				</script>
				<script>
					DD_belatedPNG.fix("div, ul, img, li, input, a, span, i")
				</script>
			<![endif]-->
			<script>
				function addorder(){
					document.getElementById('order').submit();
				}
				
				function loadDistrict(upid){
				$.ajax({
					url:"{{URL('home/address')}}/"+upid,
					type:"get",
					dataType:"json",
					async:true,
					success:function(data){
						//alert("成功");
						if(data.length<1){
							return;
						}
						var select = "<select class='consignee-add-select' id='userAddress' name='userAddress[]'>";
						select += "<option value='0'>-请选择-</option>";
						for(var i=0;i<data.length;i++){
							select += "<option value='"+data[i].id+"'>";
							select += data[i].name;
							select += "</option>";
						}
						select +="</select>";
						//添加
						$(select).change(function(){
							$(this).nextAll("select").remove();
							var id = $(this).find("option:selected").val();
							loadDistrict(id);
						}).appendTo("#addressInfo");
					},
					error:function(data){
						alert(城市信息获取失败 , 请刷新后再试);
					}
				});
			}
		  
			loadDistrict(0);
			
			
			 //添加收货地址
			$("span.consignee-btn-add").click(function(){
				$(this).css({display:'none'});
				$("div.consignee_item_new").css({display:'block'});
				$("div.consignee-add").css({display:'block'});
				$("input[type=reset]").trigger("click");
				$("#consignee").attr({value:''});
				$("#phone").attr({value:''});
				$("#postcode").attr({value:''});
				$("#street").html('');
				$("#fid").attr("action","{{url('home/insertAdd')}}");
			});
			$("#consigneeCancelBtn").click(function(){
				$("span.consignee-btn-add").css({display:'block'});
				$("div.consignee_item_new").css({display:'none'});
				$("div.consignee-add").css({display:'none'});
				$("input[type=reset]").trigger("click");
			});
			
			function checkAddress(){
            //判断收货人是否为空
            //return false;
            if($("#consignee").val() == ''){
                SimplePop.alert("收货人姓名不能为空");
                return false;
            }
            
            //判断地址信息是否完整
            if($("option:selected").val() == '0'){
                SimplePop.alert("请选择您的完整地址信息");
                return false;
            }
            
            //判断手机号是否为空
            if($("#phone").val() == ''){
                SimplePop.alert("请填写您的手机号");
                return false;
            }
        }
        
			//正则验证邮编格式
			$("#postcode").blur(function(){
				if($(this).val() != '' ){
					
					var postcode = document.getElementById('postcode').value.trim();    
					reg=/^[1-9][0-9]{5}$/;  //开头不能为0,6位
					if(!reg.test(postcode)){
						SimplePop.alert("请填写正确的邮编格式");
						$("form#fid").attr({onsubmit:'return false'});
					}else{
						$("form#fid").attr({onsubmit:'return checkAddress()'});
					}
				}
			});
			//正则验证手机格式
			$("#phone").blur(function(){
				if($(this).val() != '' ){
					
					var phone = document.getElementById('phone').value.trim();    
					reg=/^1[3|4|5|7|8]\d{9}$/;
					if(!reg.test(phone)){
						SimplePop.alert("请填写正确的手机号码格式");
						$("form#fid").attr({onsubmit:'return false'});
					}else{
						$("form#fid").attr({onsubmit:'return checkAddress()'});
					}
				}
			});
			
			
			//删除收货地址
			function doDel(id){
				SimplePop.confirm("确认要删除吗?", { 
					confirm: function(){
							$("#mydeleteform").attr("action","{{url('home/delAdd')}}/"+id).submit();
						} 
				});
				
			}
				
				//修改收货地址
			function doEdit(id){
				$("div.consignee-add").css({display:'block'});
				$("span.consignee-btn-add").css({display:'block'});
				$("div.consignee-add").insertBefore("span.aaa");
				$("#fid").attr("action","{{url('home/editAdd')}}?id="+id);
				$.ajax({
					url:"{{ url('home/getAdd') }}/"+id,
					type:"GET",
					//async:false,
					dataType:'json',
					success:function(rel){
						var json = eval(rel);
						$("#consignee").attr({value:json.consignee});
						$("#phone").attr({value:json.phone});
						$("#postcode").attr({value:json.postcode});
						$("#street").html(json.street);
					},
					error:function(err){
						alert("Ajax请求失败!");
					},
				});
			}
			
		</script>
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
           /* $(function() {
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
            })*/
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
                    
						
					}else if ($("#yInvoice")[0].checked == true) {
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