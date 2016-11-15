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
			@{{each item as secondValue index}} 
			< li > <a href = "@{{secondValue.url}}"target = "_blank"data - monitor = 'home_title_goods@{{id}}v@{{index+1}}' > <img src = "@{{secondValue.pic.indexOf('qhimg') ? secondValue.pic.replace('com/', 'com/dr/132_132_/') : secondValue.pic.indexOf('qhimg')}}" / ><span > 
			@{{ secondValue.name}}
			< /span>
                <i>@{{secondValue.price_sale}}元</i > </a>
        </li > @{{ / each}} < /ul>/
        </script>
        <div class="gCart">
            <div class="hd">
                <h3>
                    我的购物车
                </h3>
            </div>
            <div class="bd">
                <div class="cartEmpty">
                    <a href="{{url('@')}}" title="马上去购物" class="toShoping">
                    </a>
                </div>
            </div>
        </div>
        <script id="tpl_zp" type="text/html">
            < div class = "wrap_zp" > <div class = "zp_sanjiao" > </div>
        <div class="zp_space"></div > 
		@{{ each buyfree as value key }} 
		< div class = "row_list_wrap"data - item_id_show = "@{{value.show_data.item_id}}" >
		@{{each value.data as v1 k1}} 
		< div class = "row row_list dn"data - item_id = "@{{v1.item_id}}" > <div class = "r1" > <img class = "item-img"src = "@{{v1.iteminfo.img_finish}}" / ><div class = "zp_info" > <span class = "icon_zp" > 赠品 < /span>
                        <p class="zp_title">@{{v1.iteminfo.title}}</p > 
						@{{ if value.data.length > 1}} 
					< span class = "zp_chose"data - item_id_buyfree = "@{{flat_keys(key, value)}}" > 选择其它赠品 < /span>
					@{{/ if }} < /div>
                </div > <div class = "r2"style = "font-size:12px;" > 
				@{{if ! v1.has_store }}
					售罄 
				@{{ /if}
    } < /div>
                <div class="r3">×{{v1.count}}</div > <div class = "r4" > </div>
                <div class="r5"></div > </div>
            @{{/each}} < /div>     
        @{{/each}} < /div>/
        </script>
        <script>
            function load_zp() {
                if (running_load_zp == 1) return;
                running_load_zp = !0;
                var e = "";
                location.href.indexOf("liyingying.qikoo.360.cn") > 0 || location.href.indexOf("duanqifeng.qikoo.360.com") > 0 ? e = "http://liyingying.qikoo.360.cn/shop/getbuyfreeinfo": e = "/shop/getbuyfreeinfo",
                $.ajax({
                    url: e,
                    dataType: "JSONP"
                }).done(function(e) {
                    running_load_zp = !1,
                    $(".wrap_zp").remove();
                    if (e.data == null) return;
                    $.each(e.data,
                    function(e, t) {
                        $.each(t.buyfree,
                        function(e, t) {
                            $.each(t.data,
                            function(e, t) {
                                t.item_amount < t.count ? t.has_store = !1 : t.has_store = !0
                            });
                            for (var n = 1; n < t.data.length; n++) t.data[n].item_amount < t.data[n].count && (t.data.length = n);
                            t.show_data = t.data[0]
                        })
                    }),
                    template.helper("flat_keys",
                    function(e, t) {
                        var n = [e];
                        return $.each(t.data,
                        function(e, t) {
                            n.push(t.item_id)
                        }),
                        n.join("-")
                    }),
                    $.each(e.data,
                    function(e, t) {
                        $(".wrap_row[data-item_id]").each(function() {
                            e == $(this).data("item_id") && ($(this).append($(template("tpl_zp", t))), $(this).data("zp_info", t.buyfree))
                        })
                    }),
                    $(".row_list").each(function() {
                        $(this).find(".zp_chose").length == 0 && $(this).removeClass("dn")
                    }),
                    $(".row_list_wrap").each(function() {
                        var e = $(this).data("item_id_show");
                        $(this).find(".row_list[data-item_id=" + e + "]").removeClass("dn")
                    }),
                    $("[data-item_id_buyfree]").each(function() {
                        var t = this;
                        $.each(e.data,
                        function(e, n) {
                            $.each(n.buyfree,
                            function(e, n) {
                                var r = [];
                                $.each(n.data,
                                function(e, t) {
                                    r.push(t.item_id)
                                }),
                                e + "-" + r.join("-") == $(t).data("item_id_buyfree") && $(t).data("items", n.data)
                            })
                        })
                    })
                })
            }
            function get_url_zp_info() {
                var e = {};
                return $(".row_list_wrap").each(function() {
                    var t = $(this).parents(".wrap_row");
                    e[$(t).data("item_id")] = {
                        zp_list: {}
                    }
                }),
                $(".row_list_wrap").each(function() {
                    var t = $(this).parents(".wrap_row"),
                    n = $(this).data("item_id_show"),
                    r = t.data("zp_info");
                    $.each(r,
                    function(r, i) {
                        $.each(i.data,
                        function(r, i) {
                            n == i.item_id && (e[$(t).data("item_id")].zp_list[i.item_id] = {
                                img_finish: i.iteminfo.img_index,
                                statu: "",
                                price_sale: i.iteminfo.price_sale,
                                item_num: i.item_num,
                                total: i.item_num * i.iteminfo.price_sale,
                                title: i.title
                            })
                        })
                    })
                }),
                e
            }
            var running_load_zp = !1;
            $(function() {
                load_zp()
            })
        </script>
        <style>
            .zp_list_wrap{overflow:hidden;position:absolute;width:9999px}.zp_list{background:#fff;cursor:pointer;float:left;height:350px;margin-right:20px;position:relative;text-align:center;width:275px}.zp_tubiao{background:url(https://p.ssl.qhmsg.com/t0182ffa0d3df64bd53.png)
            0 -30px;cursor:pointer;height:30px;left:4px;position:absolute;top:4px;width:30px}.close_dia{color:#fff;cursor:pointer;font-size:50px;position:fixed;right:20px;top:2px}.zp_dia{z-index:200}.zp_dia,.zp_dia_bg{height:100%;left:0;position:fixed;top:0;width:100%}.zp_dia_bg{background:#000;opacity:0.8;filter:alpha(opacity=80);z-index:199}.zp_btn_left,.zp_btn_right{background:url(https://p.ssl.qhmsg.com/t0182ffa0d3df64bd53.png)
            0 -63px;cursor:pointer;height:78px;left:50%;margin-left:-370px;position:absolute;top:44%;width:30px}.zp_btn_right{background-position:0
            -131px;margin-left:326px}.zp_tubiao.selected{background-position:0 0}
        </style>
        <script id="tpl_zp_dia" type="text/html">
            < div class = "zp_dia_bg" > </div>

    <div class="zp_dia">
        <div style="width:590px;margin:0 auto;position:relative;top:50%; margin-top:-250px;">
            <div style="text-align:center; color:#fff; font-size:30px;height:60px;line-height:60px;margin-bottom:30px;">选择赠品</div > <div style = "width:570px; overflow:hidden;height:350px;position:relative; " > <ul class = "zp_list_wrap" >

            @{{each items as value index}}
			
			< li class = "zp_list"data - item_id = "@{{value.item_id}}" > <img src = "@{{value.iteminfo.img_index}}"style = "width:250px; height:250px; " / ><p style = "font-size:16px; color:#333;line-height:24px;" > 
			@{{value.iteminfo.title}} < /p>
                        <p style="font-size:18px;color:#ff7800;">￥@{{value.iteminfo.price_sale}}</p > <div class = "zp_tubiao" > </div>
                    </li > {
                { / each
                }
            }

            < /ul>
            </div > <p style = "text-align:center;margin-top:30px;" > <span class = "zp_tubiao_sure"style = "display: inline-block; background-color: #c00; color: #fff; font-size: 24px; height: 40px; line-height: 40px; padding: 0 30px; cursor:pointer;" > 加入购物车 < /span></p > <div class = "zp_btn_left" > </div>
            <div class="zp_btn_right"></div > </div>
        <div class="close_dia">×</div > </div>/
        </script>
        <script>
            window.select_parent,
            $("body").on("click", ".zp_chose",
            function() {
                var e = this,
                t = $(this).parents(".row_list_wrap").data("item_id_show");
                select_parent = $(this).parents(".row_list_wrap"),
                $("body").append($(template("tpl_zp_dia", {
                    items: $(e).data("items")
                }))),
                $(".zp_list_wrap li[data-item_id=" + t + "]").find(".zp_tubiao").addClass("selected"),
                function() {
                    if ($(".zp_list_wrap li").length < 3) {
                        $(".zp_btn_left,.zp_btn_right").hide();
                        return
                    }
                    var e = 0,
                    t = $(".zp_list_wrap li").length,
                    n = 295;
                    $(".zp_btn_left").click(function() {
                        if ($(this).data("promise") != undefined && $(this).data("promise").state() != "resolved") return;
                        e -= 1,
                        e == -($(".zp_list_wrap li").length - 1) && (e = 0),
                        $(this).data("promise", $(".zp_list_wrap").stop().animate({
                            left: e * n
                        },
                        "slow").promise())
                    }),
                    $(".zp_btn_right").click(function() {
                        if ($(this).data("promise") != undefined && $(this).data("promise").state() != "resolved") return;
                        e == 0 && (e = -($(".zp_list_wrap li").length - 1)),
                        e += 1,
                        $(this).data("promise", $(".zp_list_wrap").stop().animate({
                            left: e * n
                        },
                        "slow").promise())
                    })
                } ()
            }),
            $("body").on("click", ".zp_list",
            function() {
                $(".zp_list .zp_tubiao").removeClass("selected"),
                $(this).find(".zp_tubiao").addClass("selected")
            }),
            $("body").on("click", ".zp_tubiao_sure",
            function() {
                var e;
                $(".zp_list_wrap li").each(function() {
                    $(this).find(".zp_tubiao").hasClass("selected") && (e = $(this))
                }),
                select_parent.find(".row_list").addClass("dn"),
                select_parent.find("[data-item_id=" + e.data("item_id") + "]").removeClass("dn"),
                select_parent.data("item_id_show", e.data("item_id")),
                $(".close_dia").click()
            }),
            $("body").on("click", ".close_dia",
            function() {
                $(".zp_dia,.zp_dia_bg").remove()
            })
        </script>
        
       
       
        <input type="hidden" class="qtoken" name="qtoken" value="5e9b6a101543c1a9d99594b8aedd1ac8">
        <input type="hidden" class="real_qtoken" name="real_qtoken" value="54b79e">
        <input type="hidden" class="qtokentimestamp" name="qtokentimestamp" value="1472119847">
        <input type="hidden" class="sb_param" name="sb_param" value="49dfb54840290d662d9eb1ae747f70a7">
        <script src="./shopcart1_files/qikoo-v.js">
        </script>
        <ul id="search-suggest-1472119836909" class="__mall_suggest__" style="width: 462px;">
        </ul>
        <!--[if lte IE 6]>
            <script src="https://s.ssl.qhmsg.com/static/f54f2caa703115b3/DD_belatedPNG_0.0.8a.js">
            </script>
            <script>
                DD_belatedPNG.fix("div, ul, img, li, input, a, span, i")
            </script>
        <![endif]-->
        <script>
            var time_jiange = 1000; //添加购物车间隔时间
            $(document).ready(function() {
                var showTotalPrice = function() {
                    var gAmount = 0;
                    $(".r4").children("span").each(function() {
                        gAmount += parseFloat($(this).text());
                    });
                    $(".gAmount").children("span").text(gAmount.toFixed(2));
                };
                var checkInputValue = function(_this, value) {
                    var _tr = _this.closest('.row');
                    var text = $.trim(value);
                    if ("" === text) {
                        return 1;
                    }
                    if (!/^\d+$/.test(text)) {
                        return 1;
                    }
                    var val = parseInt(text, 10);
                    var max = _tr.data('limit') | 0;
                    var storeNum = _tr.data('store') | 0;
                    if (val === 0) {
                        return 1;
                    }
                    if (max > 0 && val > max) {
                        qikoo.dialog.alert("购买数量超出限制!");
                        return max;
                    }
                    if (max == 0 && val > storeNum) {
                        qikoo.dialog.alert("购买数量超出库存!");
                        return storeNum;
                    }
                    return val;
                }
                var isSubmiting = false;
                var setInputNumToCart = function(_this, num) {
                    num = checkInputValue(_this, num);
                    if (isSubmiting) return;
                    var _tr = _this.closest('.row');
                    var price = parseFloat(_tr.find(".r2 span").text());
                    isSubmiting = true;
                    $.post("/shop/addtocart", {
                        item_id: _tr.data("item_id"),
                        setnum: 1,
                        num: num,
                        qtoken: "5e9b6a101543c1a9d99594b8aedd1ac8",
                        qtoken_timestamp: "1472119847"
                    },
                    function(data) {
                        isSubmiting = false;
                        load_zp();
                        if (data.errno == 0) {
                            _tr.find('.goodsCount').val(num);
                            _tr.find(".r4 span").text((num * price).toFixed(2));
                            showTotalPrice();
                        } else {
                            qikoo.dialog.alert(decodeURIComponent(data.errmsg));
                        }
                    },
                    'json');
                };
                var init = function() {
                    $("body").addClass("bgc_grey");
                    showTotalPrice();
                    $(".goodsCount").on("change",
                    function(e) {
                        var _this = $(e.target);
                        setInputNumToCart(_this, _this.val());
                    });

                    $(".decrement,.increment").click(function(e) {
                        if (new Date() - $(this).data('old_time') < time_jiange) {
                            return;
                        }
                        $(this).data('old_time', new Date());
                        var _this = $(this);
                        var _tr = _this.closest('.row'),
                        _input = _this.siblings(".goodsCount"),
                        curNum = parseInt(_input.val());
                        if (_this.attr("class") == "decrement") {
                            _this.parent(".gcIpt").next(".errTip").hide();
                            if (curNum > 1) {
                                setInputNumToCart(_input, curNum - 1);
                            } else {
                                var id = _tr.data('item_id');
                                qikoo.dialog.confirm('确定要删除此商品吗？',
                                function() {
                                    $.post("/shop/delfromcart", {
                                        item_id: id,
                                        qtoken: "5e9b6a101543c1a9d99594b8aedd1ac8",
                                        qtoken_timestamp: "1472119847"
                                    },
                                    function(dt) {
                                        if (dt.errno == 0) {
                                            window.location.reload();
                                        } else if (dt.errno == 40001) {
                                            qikoo.dialog.alert(decodeURIComponent(dt.errmsg));
                                        }
                                    },
                                    'json');
                                })
                            }
                        } else if (_this.attr("class") == "increment") {
                            setInputNumToCart(_input, curNum + 1);
                        }
                    });

                    $(".btn").children(".b2").click(function() {
                        //$.get("/shop/gotoorder", {}, function () {
                        location.href = "/shop/gotoorder?url_zp_info=" + encodeURI(JSON.stringify(get_url_zp_info()));
                        //});
                    });
                    $(".delOrder").click(function(e) {
                        _this = $(e.target);
                        tips.cartTip(_this);
                        dialogEle.find('a.console-btn-cancel,a.dialog-close').click(function() {
                            $(".dialog-delorder").remove();
                        });
                    });
                };
                init();
            });
            var tips = {
                cartTip: function(_this) {
                    var tpl = ['<div class="dialog-delorder">', '<div class="dialog-bar">', '温馨提示', '<a href="#" onclick="return false;" class="dialog-close" title="关闭"></a>', '</div>', '<div class="dialog-content">', '<p>确定从购物车中删除此商品？</p>', '</div>', '<div class="dialog-console">', '<a class="console-btn-confirm" href="#" onclick="return false;" title="确定">确定</a>', '<a class="console-btn-cancel" href="#" onclick="return false;" title="取消">取消</a>', '</div>', '</div>'].join('');
                    var dialogEle = $(tpl).appendTo('body');
                    var mainEle = dialogEle.filter('.dialog-delorder');
                    var top = _this.offset().top + 20;
                    var left = _this.offset().left;
                    mainEle.css('top', top);
                    mainEle.css('left', left);
                    dialogEle.filter('.dialog-bg').css('height', $(document).height());
                    dialogEle.find('a.console-btn-confirm').click(function() {
                        var id = _this.attr("item_id");
                        $.post("/shop/delfromcart", {
                            item_id: id,
                            qtoken: "5e9b6a101543c1a9d99594b8aedd1ac8",
                            qtoken_timestamp: "1472119847"
                        },
                        function(data) {
                            load_zp();
                            var dt = eval("(" + data + ")");
                            if (dt.errno == 0) {
                                //ga('ec:addProduct', {
                                //    'id': id,
                                //    'quantity': _this.parent().parent().find('.goodsCount').val()
                                //});
                                //ga('ec:setAction', 'remove');
                                //ga('send', 'event', 'cart', 'click', 'remove from cart');
                                window.location.reload();
                            } else if (dt.errno == 40001) {
                                qikoo.dialog.alert(decodeURIComponent(dt.errmsg));
                            }

                        });
                    });
                    dialogEle.find('a.console-btn-cancel,a.dialog-close').click(function() {
                        $(".dialog-delorder").remove();
                    });
                },
                warTip: function(txt) {
                    var tpl = ['<div class="dialog-war">', '<div class="dialog-bar">', '提示', '<a href="#" onclick="return false;" class="dialog-close" title="关闭"></a>', '</div>', '<div class="dialog-content">', '<p>' + txt + '</p>', '<div class="dialog-console">', '<a class="console-btn-confirm" href="#" onclick="return false;" title="确定">确定</a>', '</div>', '</div>', '</div>'].join('');
                    var dialogEle = $(tpl).appendTo('body');
                    var mainEle = dialogEle.filter('.dialog-war');
                    var left = ($(window).width() - mainEle.width()) / 2;
                    mainEle.css('left', left);
                    mainEle.css('top', '200px');
                    dialogEle.filter('.dialog-bg').css('height', $(document).height());
                    dialogEle.find('a.dialog-close,a.console-btn-confirm').click(function() {
                        $(".dialog-war").remove();
                    });
                }
            };
        </script>
        <script>
            var _mvq = window._mvq || [];
            window._mvq = _mvq,
            _mvq.push(["$setAccount", "m-251506-0"]),
            _mvq.push(["$setGeneral", "cartview", "", "", ""]),
            _mvq.push(["$logConversion"]),
            _mvq.push(["$addItem", "", "", "", ""]),
            _mvq.push(["$logData"])
        </script>
        
      
@endsection