@extends('home.base')
@section('mycss')
<link rel="stylesheet" href="{{asset('css/home/index.css')}}">
<link rel="stylesheet" href="{{asset('css/home/qikoo-v-index.css')}}">
<link rel="stylesheet" href="{{asset('css/home/index-style.css')}}">
<script>
	var _isindex = 1;
</script>
@endsection
@section('content')
<script>	page_type="index";		</script>
<div class="mod-index">
	<div class="mod-banner">
		<div class="banner-slide">
			<div class="slideBox">
				<a class="slider-film " data-monitor="home_lunbo_lb1" style="display:block; background-image:url({{asset($banner[0]->picture)}}); background-position:center;background-repeat:no-repeat;" href="#" target="_blank"></a>
				@foreach($banner as $k=>$v)
				@if($k > 0)
				<a class="slider-film js-lazyload" data-monitor="home_lunbo_lb{{$k+1}}" style=" background-image:url({{asset($v->picture)}}); background-position:center;background-repeat:no-repeat;" href="#" target="_blank" data-original="{{asset($v->picture)}}"></a>
				@endif
				@endforeach
			</div>
			<a href="#" onclick="return false" class="slide-prev" data-monitor="home_lunbo_prev" style="display: inline;"></a>
			<a href="#" onclick="return false" class="slide-next" data-monitor="home_lunbo_next" style="display: inline;"></a>
			<div class="slide-point" data-monitor="home_lunbo_change" style="display: block; margin-left: -82.5px;">
				<a href="javascript:;" onclick="return false;" class="curr-point"></a>
				@foreach($banner as $k=>$v)
				@if($k > 0)
				<a href="javascript:;" onclick="return false;"></a>
				@endif
				@endforeach
			</div>
		</div>
	</div>
	<div class="side-category">
		<ul class="categorylist" data-asort="1">
		@foreach($type[0] as $type1)
			<li class="sub-item menu1 odd" data-monitor="home_fenlei_tab1">
				<a target="_blank" style="text-decoration:none" href="{{url('home/good/list/').'/'.$type1->id}}" class="category-a">{{$type1->type}}</a>
				<div class="left-sub-list" style="display:none">
					<div class="second-level-box">
						@foreach($type[1] as $type2)
						@if($type2->pid == $type1->id)
						<dl class="second-level">
							<dt>
								<a style="text-decoration:none" href="{{url('home/good/list/').'/'.$type2->id}}" target="_blank">{{$type2->type}}</a>
								<i>&gt;</i>
							</dt>
							<dd>
								@foreach($type[2] as $type3)
								@if($type3->pid == $type2->id)
								<a style="text-decoration:none" href="{{url('home/good/list/').'/'.$type3->id}}" target="_blank">{{$type3->type}}</a>
								@endif
								@endforeach
							</dd>
						</dl>
						@endif
						@endforeach
					</div>
					<div class="single-item">
						<a href="#">
							<img data-size="240_400_" src="https:p.ssl.qhmsg.com/t0169d9f4b681742514.jpg">
						</a>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="topad">
		<ul>
			<li>
				<a href="#" target="_blank" data-monitor="home_lunbo_resource01">
					<img src="{{asset('uploads/public/home/t013ae6c1a7578e50a7.png')}}">
				</a>
			</li>
			<li>
				<a href="#" target="_blank" data-monitor="home_lunbo_resource02">
					<img src="{{asset('uploads/public/home/t01546cd48526130ba5.png')}}">
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="part-myproducts" id="part-360ziyouitems">
<ul class="part-container">  <li>
<a href="http://mall.360.com/shouji/q5" target="_blank" data-monitor="home_own_goods1">
<img class="js-lazyload" data-size="240_320_" src="https://p.ssl.qhmsg.com/t01fa4c52d2d1ec193b.jpg" style="display: block;">
</a>  </li>
<li>
<a href="http://mall.360.com/ac/badilong" target="_blank" data-monitor="home_own_goods2">
<img class="js-lazyload" data-size="240_320_" src="https://p.ssl.qhmsg.com/t014c63429ce7988185.png" style="display: block;">
</a>  </li>
<li>
<a href="http://mall.360.com/ac/360luyou" target="_blank" data-monitor="home_own_goods3">
<img class="js-lazyload" data-size="240_320_" src="https://p.ssl.qhmsg.com/t01ef53b6ccd38ee31b.png" style="display: block;">
</a>  </li>
<li>
<a href="http://mall.360.com/ac/shexiangji" target="_blank" data-monitor="home_own_goods4">
<img class="js-lazyload" data-size="240_320_" src="https://p.ssl.qhmsg.com/t01aec6573e4ffe90a4.png" style="display: block;">
</a>  </li>
<li>
<a href="http://mall.360.com/ac/che2" target="_blank" data-monitor="home_own_goods5">
<img class="js-lazyload" data-size="240_320_" src="https://p.ssl.qhmsg.com/t01ee71eaa144382dc0.png" style="display: block;">
</a>  </li>
</ul>
</div>


<div class="part-activitys" id="part-360activity">
	<div class="part-container">
		<span class="vline"></span>
		<span class="vicon"></span>
		<span class="part-title">特价商品</span>
		<span class="vicon"></span>
		<span class="vline"></span>
	</div>
	<ul class="part-container">
		<li class="ac0">
			<a href="#" target="_blank" data-monitor="home_activity_ziyuanwei01">
				<img class="js-lazyload" src="https:p.ssl.qhmsg.com/t01d7dece4c79fd65f4.jpg">
			</a>
		</li>
		<li class="ac1">
			<a href="#" target="_blank" data-monitor="home_activity_ziyuanwei02">
				<img class="js-lazyload" src="https:p.ssl.qhmsg.com/t011f3f740b0d2d42df.jpg">
			</a>
		</li>
		<li class="ac2">
			<a href="#" target="_blank" data-monitor="home_activity_ziyuanwei03">
				<img class="js-lazyload" src="https:p.ssl.qhmsg.com/t01aec37eff7d9c8d12.jpg">
			</a>
		</li>
		<li class="ac3">
			<a href="#" target="_blank" data-monitor="home_activity_ziyuanwei04">
				<img class="js-lazyload" src="https:p.ssl.qhmsg.com/t01f891f86e5c41f8d7.jpg">
			</a>
		</li>
		<li class="ac4">
			<a href="#" target="_blank" data-monitor="home_activity_ziyuanwei05">
				<img class="js-lazyload" src="https:p.ssl.qhmsg.com/t016c9a102f8bd0a01f.jpg">
			</a>
		</li>
		<li class="ac5">
			<a href="#" target="_blank" data-monitor="home_activity_ziyuanwei06">
				<img class="js-lazyload" src="https:p.ssl.qhmsg.com/t01fdd80c649c6addad.jpg">
			</a>
		</li>
	</ul>
</div>

@foreach($type[0] as $k=>$type1)

<div class="part-smart" id="part-floor_cat_{{$k+1}}">
	<div class="part-container">
		<div class="part-title">{{$type1->type}}</div>
		<a href="{{url('home/good/list').'/'.$type1->id}}" target="_blank" class="indexmore" data-monitor="home_floor1_more">更多</a>
	</div>
	<div class="part-container">
		<div class="part-left">
			<a class="part-left1" href="{{url('home/good/list').'/'.$type1->id}}" target="_blank" data-monitor="home_floor1_ac01">
				<img class="js-lazyload" data-size="240_390_" src="{{asset($type1->logo)}}">
			</a>
			<a class="part-left2" href="#" target="_blank" data-monitor="home_floor1_ac02">
				<img class="js-lazyload" data-size="240_140_" src="https:p.ssl.qhmsg.com/t011d759c35aad52e17.jpg">
			</a>
		</div>
		<div class="part-center">
			<ul class="part-list">
				@foreach($type1->goods as $good)
				<li class="part-list-item">
					<a style="text-decoration:none" class="part-info" href="{{url('home/good/detail').'/'.$good->id}}" target="_blank" data-monitor="home_floor1_goods01">
						<span class="info">{{$good->good}}</span>
						<span class="price">
							<i class="yen">￥</i>{{$good->price}}
						</span>
						<img class="js-lazyload pimg" data-size="164_164_" src="{{asset($good->picture)}}">
					</a>
				</li>
				@endforeach
			</ul>
		</div>
		<div class="part-right">
			<p class="part-suggest-title">热销排行</p>
			<div class="part-suggest">
				<div class="slideBox">
					<div class="slider-film" style="display: none;" >
					<span {{$m=0}}></span>
					@foreach($type1->ranks as $rank)
					@if($m % 4 == 0 && $m != 0)
					</div>
					<div class="slider-film" style="display: none;">
					@endif
					<span {{$m++}}></span>
						<a style="text-decoration:none" href="{{url('home/good/detail').'/'.$rank->id}}" target="_blank" data-monitor="home_floor1_tuijian1">
							<dl style="height:110px">
								<dt>
									<img class="js-lazyload" data-size="72_72_" src="{{$rank->picture}}" style="display: inline;">
								</dt>
								<dd class="title">{{$rank->good}} </dd>
								<dd class="info">{{$rank->config}} </dd>
								<dd class="price">
									<i class="yen">￥</i>{{$rank->price}}
								</dd>
							</dl>
						</a>
					@endforeach
					</div>
				</div>
				<div class="slide-point" data-monitor="home_floor1_tuijianchange" style="display: block;">
					<a href="javascript:;" onclick="return false;" class="curr-point"></a>
					@for($i=1; $i < $m / 4; $i++)
					<a href="javascript:;" onclick="return false;" class=""></a>
					@endfor
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach

<div class="part-newproducts" id="part-newproducts" style="padding-bottom:30px">
	<div class="part-container">
		<span class="part-title">新品速递</span>
	</div>
	<div class="part-container">
		<ul class="new-list"></ul>
		<div style="text-decoration:none;">
			<a class="showmore" href="javascript:;" data-url="{{url('home/ajax')}}" data-monitor="home_new_more">查看更多</a>
			<div class="nomore" style="display:none">没有更多了</div>
		</div>
	</div>
</div>
<div class="elevator_box">
	<ul class="elevator_list">
		<li class="elevator1" data-id="part-360activity" data-monitor="left_1f_click">
			<a href="javascript:;">1F<br> 活动</a>
		</li>

		@foreach($type[0] as $k=>$v)

		<li class="elevator{{$k+2}}" data-id="part-floor_cat_{{$k+1}}" data-monitor="left_{{$k+2}}f_click">
			<a href="javascript:;">{{$k+2}}F<br> {{$v->target}}</a>
		</li>

		@endforeach

		<li class="elevator{{$k+3}}" data-id="part-newproducts" data-monitor="left_{{$k+3}}f_click">
			<a href="javascript:;">{{$k+3}}F<br>新品</a>
		</li>
	</ul>
</div>
@endsection
@section('myjs')
<script>
	$(function(){indexPage.init()})
</script>
<script src="{{ asset('js/home/qikoo-v.js') }}"></script>
<script src="{{ asset('js/home/index.js') }}"></script>
@endsection