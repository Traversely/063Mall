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
        @if( session('delAdd') )
            <script type="text/javascript">
		        $(function(){
		            SimplePop.alert("{{ session('delAdd') }}");
		        });
		    </script>
        @endif
        <div class="user-body" style="background-color:#f2f2f2;">
            <div class="user-container">
                <div class="user-crumbs m-b-10">
                    <a href="{{url('home/address')}}">
                        首页
                    </a>
                    &gt; 收货地址
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
                            <a class="menu-item item-active" href="{{ url('home/address') }}" data-monitor="user_address_address">收货地址</a>
                        </div>
                        <div class="menu-title">
                            消息中心
                        </div>
                        <div class="menu-list">
                            <a class="menu-item" href="{{ url('home/message') }}" data-monitor="user_message_message">站内消息</a>
                        </div>
                    </div>
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
                                
                                <div class="consignee-item item-checked"> 
                                    <input type="hidden" class="hideAdd" name="consignee_realname" value="{{ $address->consignee }}"> 
                                    <input type="hidden" class="hideAdd" name="consignee_mobile" value="{{ $address->phone }}"> 
                                    <input type="hidden" class="hideAdd" name="consignee_province" value="{{ $address->province }}"> 
                                    <input type="hidden" class="hideAdd" name="consignee_city" value="{{ $address->city }}"> 
                                    <input type="hidden" class="hideAdd" name="consignee_county" value="{{ $address->district }}"> 
                                    <input type="hidden" class="hideAdd" name="consignee_county" value="{{ $address->township }}"> 
                                    <input type="hidden" class="hideAdd" name="consignee_address" value="{{ $address->street }}"> 
                                    <input type="hidden" class="hideAdd" name="consignee_postcode" value="{{ $address->postcode }}"> 
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
 @endsection