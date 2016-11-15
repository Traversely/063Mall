@extends('home.base')

@section('content')
        <script type="preload-script" src="{{asset('js/home/utils.js')}}">
        </script>
        <script type="preload-script" src="{{asset('js/home/jq-suggest.js')}}">
        </script>
        <script type="preload-script" src="{{asset('js/home/jq-suggest-client.js')}}">
        </script>
        <script id="tpl_nav" type="text/html">
            // < !--导航下拉start--><ul class = "sub-nav-list" > {
                // {
                    // each item as secondValue index
                // }
            // } < li > <a href = "{{secondValue.url}}"target = "_blank"data - monitor = 'home_title_goods{{id}}v{{index+1}}' > <img src = "{{secondValue.pic.indexOf('qhimg') ? secondValue.pic.replace('com/', 'com/dr/132_132_/') : secondValue.pic.indexOf('qhimg')}}" / ><span > {
                // {
                    // secondValue.name
                // }
            // } < /span>
                // <i>{{secondValue.price_sale}}元</i > </a>
        // </li > {
                // { / each
                // }
            // } < /ul>/
        </script>
        <div class="user-body">
            <div class="user-container">
                <div class="user-crumbs m-b-10">
                    <a href="#">
                        首页
                    </a>
                    &gt; 我的试用积分
                </div>
                <div class="clearfix_new">
                    <div class="user-menu m-r-20">
                        <div class="menu-title">
                            个人中心
                        </div>
                        <div class="menu-list">
                            <a class="menu-item" href="#" data-monitor="user_myorder_myorder">
                                我的订单
                            </a>
                            <a class="menu-item" href="#" data-monitor="user_mycoupon_mycoupon">
                                我的优惠券
                            </a>
                            <a class="menu-item" href="#" data-monitor="user_myfavorite_myfavorite">
                                我的喜欢
                            </a>
                            <a class="menu-item" href="#" data-monitor="user_try_try">
                                我的试用
                            </a>
                            <a class="menu-item item-active" href="#"
                            data-monitor="user_point_point">
                                试用积分
                            </a>
                            <a class="menu-item" href="#" data-monitor="user_book_book">
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
                            <a class="menu-item" href="#" data-monitor="user_notice_notice">
                                评论通知
                            </a>
                            <a class="menu-item" href="#" data-monitor="user_message_message">
                                站内消息
                            </a>
                        </div>
                        <div class="menu-title">
                            售后服务
                        </div>
                        <div class="menu-list">
                            <a class="menu-item" href="#"
                            data-monitor="user_returnlist_returnlist">
                                退货记录
                            </a>
                            <a class="menu-item" href="#"
                            data-monitor="user_barter_barter">
                                换货记录
                            </a>
                        </div>
                    </div>
                    <div class="user-main">
                        <div class="mod-kubi">
                            <div class="kubi-title">
                                <a class="title-link" href="#">
                                    什么是试用积分？
                                </a>
                                <span>
                                    您当前的试用积分：
                                    <b>
                                        0
                                    </b>
                                </span>
                            </div>
                            <div class="kubi-history clearfix_new">
                                <div class="history-tab">
                                    <a href="#" onclick="return false" class="tab-curr">
                                        <span data-tab="detail">
                                            试用积分明细
                                        </span>
                                    </a>
                                    <a class="" href="#" onclick="return false">
                                        <span data-tab="exchange">
                                            兑换记录
                                        </span>
                                    </a>
                                </div>
                                <div class="history-detail" style="display: block;" data-hasdata="1">
                                    <div style="text-align:center">
                                        暂无数据
                                    </div>
                                </div>
                                <div class="history-exchange" style="display: none;">
                                    <div style="text-align:center">
                                        暂无数据
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mod-kubi-faq" id="kubiFaq">
                            <div style="background:url(https://p.ssl.qhmsg.com/t0105e9d708f116c5b2.jpg) bottom right no-repeat">
                                <h3>
                                    什么是试用积分？
                                </h3>
                                <p style="line-height:30px;margin-bottom:10px">
                                    试用积分是用户在360商城试用、评论或参与活动等获得的奖励，用户可以在360商城定期举办的兑换活动中使用试用积分换取实物或虚拟奖品。
                                </p>
                                <h4>
                                    <em>
                                        ◆
                                    </em>
                                    试用积分可以通过以下几种方法获得:
                                </h4>
                                <p>
                                    1. 参加
                                    <a class="btn-link" href="#" target="_blank">
                                        免费试用&gt;&gt;
                                    </a>
                                    ，每期可以领取5试用积分，分享微博可再领5试用积分。
                                </p>
                                <p>
                                    2. 提交精品试用报告，根据报告的精彩程度奖励试用积分，最多10试用积分。
                                </p>
                                <p>
                                    3. 认真填写评论，超过100字的评论有机会获得5试用积分的奖励。
                                </p>
                                <p>
                                    4. 对360商城有突出贡献（试用产品分享、优秀反馈意见等）的用户，可以获得试用积分奖励。
                                </p>
                                <p>
                                    5. 参与360商城举办的各类活动有机会获得试用积分。
                                </p>
                            </div>
                            <h4>
                                <em>
                                    ◆
                                </em>
                                试用积分如何使用？
                            </h4>
                            <p>
                                为了回馈用户，360商城定期举办试用积分兑换活动，用户可以使用试用积分换取实物或虚拟产品。
                            </p>
                            <p>
                                兑换成功后，360商城会在10个工作日内发货，用户可以在 我的试用积分&gt;兑换记录 中查到换得的产品。
                            </p>
                            <p style="margin:20px 0">
                                <img src="{{asset('uploads/photos/home/t0153beb5ce98b839ce.jpg')}}">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input class="qtoken" name="qtoken" value="54b79e" type="hidden">
        <input class="real_qtoken" name="real_qtoken" value="0d773b6fab0643c872e2c8054244f36c"
        type="hidden">
        <input class="qtokentimestamp" name="qtokentimestamp" value="1471405178"
        type="hidden">
        <input class="sb_param" name="sb_param" value="b3fb72b3596507fba60772e32f8be7e8"
        type="hidden">
        <script src="jifen_files/qikoo-v.js">
        </script>
        <ul id="search-suggest-1471405165252" class="__mall_suggest__" style="width: 462px;">
        </ul>
        <!--[if lte IE 6]>
            <script src="https://s.ssl.qhmsg.com/static/f54f2caa703115b3/DD_belatedPNG_0.0.8a.js">
            </script>
            <script>
                DD_belatedPNG.fix("div, ul, img, li, input, a, span, i")
            </script>
        <![endif]-->
        <script src="{{asset('js/home/qikoo_page_mypoint.js')}}">
        </script>
 @endsection  
        
        
   