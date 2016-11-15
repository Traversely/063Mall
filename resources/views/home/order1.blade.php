@extends('home.base')
@section('content')
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



        <script type="preload-script" src="{{asset('js/home/utils.js')}}">
        </script>
        <script type="preload-script" src="{{asset('js/home/jq-suggest.js')}}">
        </script>
        <script type="preload-script" src="{{asset('js/home/jq-suggest-client.js')}}">
        </script>
		<script id="tpl_nav" type="text/html"><!--导航下拉 start--> 
		<ul class="sub-nav-list">
    
		</ul></script>
	
        <div class="user-body">
            <div class="user-container">
                <div class="user-crumbs m-b-10">
                    <a href="{{url('@')}}">
                        首页
                    </a>
                    &gt; 我的订单
                </div>
                <div class="clearfix_new">
                    <div class="user-menu m-r-20">
                        <div class="menu-title">
                            个人中心
                        </div>
                        <div class="menu-list">
                            <a class="menu-item item-active" href="#"
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
                                我的积分
                            </a>
                            <a class="menu-item" href="http://mall.360.com/user/book" data-monitor="user_book_book">
                                我的预约
                            </a>
                            <a class="menu-item" href="#" data-monitor="user_address_address">
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
                        <div class="order-main clearfix_new">
                            <h1 style="border:0">
                                我的订单
                                <a href="#" data-monitor="user_myorder_consult" onclick="showServiceSelector()"
                                class="inline-kefu">
                                </a>
                                <a href="#" class="phone-order-link">
                                    <img src="{{asset('uploads/photos/home/t0132f8f9dcf7c9c494.png')}}" alt="查看360手机商城订单">
                                </a>
                            </h1>
							
                            <div class="mod-user-list">
								
                                <ul id="ul_order_type" class="order_type" style="margin-bottom:20px;padding:0 0 0 10px">
                                    <li data-order_type="-1" _class="cur" data-status="-1" class="enable">
                                        <a data-monitor="user_myorder_allstatus" class="order_type_title" data-href="/user/myorder/?status=-1"
                                        href="#">
                                            全部订单
                                            <span style="display:none" class="order_type_count">
                                                
                                            </span>
                                        </a>
                                    </li>
                                    <li data-order_type="0" _class="disable" data-status="0" class="enable">
                                        <a data-monitor="user_myorder_waitpay" class="order_type_title" data-href="/user/myorder/?status=0"
                                        href="#">
                                            待付款
                                            <span class="order_type_count" style="color: rgb(255, 120, 0);">
											
                                            </span>
                                        </a>
                                    </li>
                                    <li data-order_type="1" _class="disable" data-status="1">
                                        <a data-monitor="user_myorder_waitgoods" class="order_type_title" data-href="/user/myorder/?status=1">
                                            待发货
                                            <span class="order_type_count" style="color: rgb(255, 120, 0);">
											
                                            </span>
                                        </a>
                                    </li>
                                    <li data-order_type="2" _class="enable" data-status="3">
                                        <a data-monitor="user_myorder_getgoods" class="order_type_title" data-href="/user/myorder/?status=3">
                                            已发货
                                            <span class="order_type_count" style="color: rgb(255, 120, 0);">
											
                                            </span>
                                        </a>
                                    </li>
                                    <li data-order_type="3" _class="enable" data-status="4">
                                        <a data-monitor="user_myorder_allover" class="order_type_title" data-href="/user/myorder/?status=4">
                                            已完成
                                            <span class="order_type_count" style="color: rgb(255, 120, 0);">
											
                                            </span>
                                        </a>
                                    </li>
                                    
                                </ul>
                                <table style="" width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                        <tr class="list-title">
                                            <th class="list-col1">
                                                订单信息
                                            </th>
                                            <th class="list-col2">
                                                订单金额
                                            </th>
                                            <th class="list-col3">
                                                订单状态
                                            </th>
                                            <th class="list-col4">
                                                操作
                                            </th>
                                        </tr>
                                    </tbody>
                                    <tbody>
										<tr>
											<td>您目前还没有下订单</td>
										</tr>
										
                                    </tbody>
                                    
                                </table>
							
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
   
        <input class="qtoken" name="qtoken" value="54b79e" type="hidden">
        <input class="real_qtoken" name="real_qtoken" value="b170697f27b678b100c5c198b0bdd854"
        type="hidden">
        <input class="qtokentimestamp" name="qtokentimestamp" value="1471954788"
        type="hidden">
        <input class="sb_param" name="sb_param" value="1bd2c0d009301518daecd3ed150da81a"
        type="hidden">
        <script src="{{asset('js/home/qikoo-v.js')}}">
        </script>
        <ul id="search-suggest-1471954776834" class="__mall_suggest__" style="width: 462px;">
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
        <script>
			function doDel(id){
				if(confirm('确定要删除吗？')){
					$("#delForm").attr("action","{{url('/home/order/del')}}/"+id).submit(); 
				}
			}
		
            $(function() {
                var li = $('#ul_order_type.order_type li');
                li.removeClass('cur,disable,enable');
                var status = '{% int($smarty.get.status)%}';
                li.each(function() {
                    if (status == '') {
                        status = -1;
                    }
                    var val = parseInt($(this).find('span.order_type_count').html());

                    if (val > 0) {
                        $(this).addClass('enable');
                        var link = $(this).find('a');
                        $(link).attr('href', $(link).data('href'));
                        if ($(this).attr("data-order_type") == 0) {
                            $(this).find(".order_type_count").css("color", "#ff7800")
                        }
                        if ($(this).attr("data-order_type") == 3) {
                            $(this).find(".order_type_count").css("color", "#82c92f")
                        }
                    } else if (val == 0) {
                        $(this).addClass('disable');
                    }

                    if (status == $(this).data('status')) {
                        $(this).removeClass('cur,disable,enable');
                        $(this).addClass("cur");
                    }
                })
            });

            //订单追踪
            $(function() {
                var show = false;
                var ctimer = 0;
                var waiting = 1000; //等待时间
                var curEle = null; //当前对象
                $('body').mouseover(function(e) {
                    curEle = e.target;
                });

                $('.order_info_click').each(function() {
                    $(this).click(function() {

                        var _this = this;

                        $('#wuliu').css({
                            left: $(_this).position().left - 360,
                            top: $(_this).position().top + 30
                        }).show();
                        $('#wuliu .order_info_ul').hide();
                        $('#wuliu .loading').show();
                        //return ;
                        $.getJSON('/user/orderhis', {
                            id: $(_this).data('id')
                        }).done(function(data) {

                            $('#wuliu .order_info_ul').html('');

                            var str = ''
                            for (var i = 0; i < data.data.length; i++) {
                                str += '<li><div class="order_info_time">' + data.data[i].acceptTime + '</div><div class="order_info_text">' + data.data[i].acceptAddress + '</div></li>'
                            }

                            $('#wuliu .order_info_ul').show().html(str);
                            $('#wuliu .loading').hide();

                            $('#wuliu').css({
                                left: $(_this).position().left - 360,
                                top: $(_this).position().top + 30
                            }).show();

                            $('.order_info_click').unbind('mouseleave');

                            $(_this).mouseleave(function() {
                                clearTimeout(ctimer);
                                ctimer = setTimeout(function() {
                                    if ($('#wuliu').find(curEle).length > 0) {
                                        $('#wuliu').unbind('mouseleave');
                                        $('#wuliu').mouseleave(function() {
                                            ctimer = setTimeout(function() {
                                                $('#wuliu').hide();
                                            },
                                            waiting);
                                        });
                                    } else {
                                        $('#wuliu').hide();
                                    }
                                },
                                waiting);
                            });
                        });
                    });
                });
            });

            $(function() {
                $('.countdonw_time').each(function() {
                    var _this = this;
                    Timer({
                        milliseconds: $(this).data('countdown_time'),
                        interval: 500,
                        immediately: true,
                        callback: function(milliseconds, desc) {
                            $(_this).html(desc.hours + '时' + desc.minutes + "分" + desc.second + "秒")
                        },
                        fnEnd: function() {
                            $(_this).addClass('countdonw_time_disable');
                            $('.fukuan_info').hide();
                        }
                    }).run();
                });
            });

            $(function() {
                $('.fukuan_info').hover(function() {
                    var _this = this;
                    $("#countdown_tip").css({
                        left: $(_this).position().left - 100,
                        top: $(_this).position().top - 70
                    }).show();
                },
                function() {
                    $("#countdown_tip").hide();
                });
            });

            $('.console-cancel').click(function() {
                var ele = $(this);
                if (ele.attr('data-paied') == 1) {
                    paiedDialog(ele.attr('data-id'));
                } else {
                    qikoo.popConfirm(ele, '您确定取消本订单吗？',
                    function() {
                        $.post('/user/cancelmyorder?id=' + ele.attr('data-id') + '&token=fe19c480539b2c8b5c885dd8a6648d4b',
                        function(data) {
                            if (data.result == 0) {
                                qikoo.dialog.alert('取消订单失败:' + data.msg);
                            } else {
                                window.location.reload();
                            }
                        },
                        'json')
                    })
                }
            });

            // $('.item-pay').click(function(){
            // 	qikoo.dialog.payNotice();
            // })
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
                });
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
                });

                ele.find('.console-btn-cancel').click(function() {
                    qikoo.dialog.hide();
                });

                $('body').click(function() {
                    $('.select-list').hide();
                })
            };

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
                });
            })
        </script>
   
      
        <script>
            window.NTKF_PARAM && (NTKF_PARAM.orderid = ""); //订单ID
            
        </script>
@endsection