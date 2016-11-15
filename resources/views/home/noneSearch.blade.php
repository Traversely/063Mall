@extends('home.base')
@section('mycss')
<link rel="stylesheet" href="{{asset('css/home/qikoo-v.css')}}">
<link rel="stylesheet" href="{{asset('css/home/search.css')}}">
<script src="{{asset('js/home/template.js')}}"></script>
<script>
	var searchHost="http://alalei.com"
</script>
<script>
	var _isindex = 0;
</script>
@endsection
@section('content')
<div class="product-list">
	<div class="search-box">
		<div class="search-nav">
			<span class="default_path">
				<a href="http://alalei.com/@" data-monitor="search_crumb_home">首页</a>
				<i>&gt;</i>
				<a href="http://alalei.com/home/good/list/0?search=" data-monitor="search_crumb_all">全部搜索结果</a>
			</span>
			<div class="breadcrumbs_box">
				<span class="sw_box"></span>
	            <span class="tag_box"></span>
			</div>
			<span class="qwords">{{$params['search']}}</span>
		</div>
	</div>
	<div class="filter-box" style="display: none;"> </div> 
	<div class="list-box"> 
		<div class="listwrap"> 
			<div class="list-container list-container-no-ret" data-monitor="search_goods_click">
			    <dl class="msg">
			        <dt class="fault-anzai"></dt>
			        <dd class="cont">抱歉，没有找到您搜索的相关商品</dd>
			    </dl> 
				<div class="hotlist">
				    <span class="list-title">热销推荐</span>
				    <div class="switcher clearfix">
				        <span class="left" onclick="nextRecommend()" style="width:53px;color:#666;">换一换</span>
				    </div>
				    <div class="itemlist" data-monitor="search_noresult_goods">
				        <ul id="recommend">
				        @foreach($ranks as $k=>$rank)
							<li class="item" id="li{{$k}}" style="display:{{$k>4?'none':'block'}}">
								<a style="text-decoration:none" target="_blank" href="{{url('home/good/detail').'/'.$rank->id}}">
									<img class="pic" src="{{asset($rank->picture)}}">
									<span class="title">{{$rank->good}}</span>
									<span class="price">{{$rank->price}}元</span>
								</a>
							</li>
				        @endforeach
				        </ul> 
				    </div>
				</div>
			</div>
		</div>
	</div>
	
@endsection
@section('myjs')
<script src="{{asset('js/home/1102.js')}}"></script>
<script src="{{asset('js/home/kkpager.min.js')}}"></script>
<script src="{{asset('js/home/search.js')}}"></script>
<script src="{{asset('js/home/search-client.js')}}"></script>
<script src="{{asset('js/home/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('js/home/qikoo-v.js') }}"></script>
<script type="text/javascript">
	// $(function(){
	// 	$.ajax({
	// 		url:'{{url("/home/good/rank")}}',
	// 		type:'get',
	// 		dataType:'json',
	// 		success:function(msg){
	// 			for(var i=0; i<msg.length; i++){
	// 				$('#recommend').append('<li class="item" id="li'+i+'"><a style="text-decoration:none" target="_blank" href="http://alalei.com/home/good/detail/'+msg[i].id+'"><img class="pic" src="http://alalei.com/'+msg[i].picture+'"><span class="title">'+msg[i].good+'</span><span class="price">'+msg[i].price+'元</span></a></li>')
	// 			}

				            
	// 		}
	// 	})
	// })

	function prevRecommend(){
		$('#li0, #li1, #li2, #li3, #li4').show();
		$('#li5, #li6, #li7, #li8, #li9').hide();
		$('.left').attr('onclick','nextRecommend()');
	}

	function nextRecommend(){
		$('#li0, #li1, #li2, #li3, #li4').hide();
		$('#li5, #li6, #li7, #li8, #li9').show();
		$('.left').attr('onclick','prevRecommend()');
	}
</script>
@endsection