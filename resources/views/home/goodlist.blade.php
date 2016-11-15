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
			<span class="qwords">
			@if($goods->type == 0)
				@if(isset($params['brand']))
				{{empty($params['search'])?$params['brand']:($params['search'].' > '.$params['brand'])}}
				@else
				{{empty($params['search'])?'全部':$params['search']}}
				@endif
			@else
				@if(isset($params['brand']))
				{{$goods->typeName.' > '.$params['brand']}}
				@else
				{{$goods->typeName}}
				@endif
			@endif
			</span>
		</div>
	</div>
	<div class="filter-box" style="display: block;">
        <div class="filter js-cates" data-monitor="search_fenlei_click">
            <div class="hint">分类:</div>
            <div class="option_box unspread">
            @foreach($searchType as $v)
                <a class="" href="{{url('home/good/list').'/'.$v->id}}" title="{{$v->type}}">{{$v->type}}</a>
            @endforeach
                <div class="find_more">				
                    <span class="spread_icon">
                        <img class="up" src="{{asset('uploads/public/home/t015f4bcc45a14cddc3.png')}}">
                        <img class="down" src="{{asset('uploads/public/home/t01b76f029538d8f9df.png')}}">			
                    </span>查看更多				
                </div>
            </div>
        </div>
        <div class="filter js-options clearfix" data-monitor="">
            <div class="hint">品牌: </div>
            <div class="option_box unspread">
            	@foreach($goods->brand as $brand)
            	@if($goods->type == 0)
                <a href="http://alalei.com/home/good/list/0?search={{$params['search']}}&brand={{$brand}}" title="{{$brand}}">{{$brand}}</a>
                @else
                <a href="http://alalei.com/home/good/list/{{$goods->type}}?brand={{$brand}}" title="{{$brand}}">{{$brand}}</a>
                @endif
                @endforeach
                <div class="find_more" style="display: block;">				
                    <span class="spread_icon">
                        <img class="up" src="{{asset('uploads/public/home/t015f4bcc45a14cddc3.png')}}">
                        <img class="down" src="{{asset('uploads/public/home/t01b76f029538d8f9df.png')}}">
                    </span>
                </div>
            </div>
        </div>
        <div class="filter js-sort last">
            <span class="hint">排序: </span>
            @if($goods->type == 0)
            <a class="active" href="http://alalei.com/home/good/list/0?search={{$params['search']}}&brand={{$params['brand']}}&saleorder=desc" data-monitor="home_paixu_sort1">销量<span id="order">↓</span></a>
            <a class="active" href="http://alalei.com/home/good/list/0?search={{$params['search']}}&brand={{$params['brand']}}&saleorder=asc" data-monitor="home_paixu_sort1">销量<span id="order">↑</span></a>
            <a class="active" href="http://alalei.com/home/good/list/0?search={{$params['search']}}&brand={{$params['brand']}}&priceorder=desc" data-monitor="home_paixu_sort1">价格<span id="order">↓</span></a>
            <a class="active" href="http://alalei.com/home/good/list/0?search={{$params['search']}}&brand={{$params['brand']}}&priceorder=asc" data-monitor="home_paixu_sort1">价格<span id="order">↑</span></a>
            @else
            <a class="active" href="http://alalei.com/home/good/list/{{$goods->type}}?brand={{$params['brand']}}&saleorder=desc" data-monitor="home_paixu_sort1">销量<span id="order">↓</span></a>
            <a class="active" href="http://alalei.com/home/good/list/{{$goods->type}}?brand={{$params['brand']}}&saleorder=asc" data-monitor="home_paixu_sort1">销量<span id="order">↑</span></a>
            <a class="active" href="http://alalei.com/home/good/list/{{$goods->type}}?brand={{$params['brand']}}&priceorder=desc" data-monitor="home_paixu_sort1">价格<span id="order">↓</span></a>
            <a class="active" href="http://alalei.com/home/good/list/{{$goods->type}}?brand={{$params['brand']}}&priceorder=asc" data-monitor="home_paixu_sort1">价格<span id="order">↑</span></a>
            @endif
        </div>
    </div>
    <div class="list-box">
	    <div class="listwrap">
		    <div class="list-container" data-monitor="search_goods_click">
			    <ul class="list">
			    @foreach($goods as $good)
				    <li class="list-item">
				        <dl class="desc">
				            <dt class="pic">				
				                <a target="_blank" href="{{url('home/good/detail').'/'.$good->id}}">				
				                    <img class="lazy" data-size="180_180_" src="{{asset($good->picture)}}" alt="{{$good->good}}" style="display: block;">
				                </a>
				            </dt>
				            <dd class="cont">				
				            <a target="_blank" style="text-decoration:none" title="{{$good->good}}" href="{{url('home/good/detail').'/'.$good->id}}">				
				                <span class="title">				
				                    {{$good->good}}	
				                </span>
				                <span class="price">
				                @if($good->minprice == $good->maxprice)
				                    ￥ {{$good->minprice}}
				                @else				
				                    ￥ {{$good->minprice}} ~ {{$good->maxprice}}
				                @endif	
				                </span>
								<span style="font-size:12px;margin-left:50px;">销量 {{$good->sale}}</span>
				            </a>
				            </dd>
				        </dl>
				    </li>
				    @endforeach
				</ul>
			</div>
			<div class="layer flexbox" style="display: none;">加载中......</div>
		</div>
<style type="text/css">
	.pagination>li:first-child>a, .pagination>li:first-child>span{border-radius: 0px;}
	.pagination>li:last-child>a, .pagination>li:last-child>span{border-radius: 0px;}
	.pagination li span{margin-left:10px;}
	.pagination li a{margin-left:10px;color:black;}
	.pagination li a:hover{border-color:#23ac38;background:#fff;}
	.pagination .active span{border-color:#23ac38;background:#23ac38;}
	.pagination .active span:hover{border-color:#23ac38;background:#23ac38;}
</style>
		<div style="margin:20px auto;text-align:center;">
		{!! $goods->appends($params)->render() !!}
		</div>
	</div>
</div>
@endsection
@section('myjs')
<script type="text/javascript">
	$('.pagination>li:first-child>a, .pagination>li:first-child>span').html('上一页');
	$('.pagination>li:last-child>a, .pagination>li:last-child>span').html('下一页');
</script>
<script src="{{asset('js/home/1102.js')}}"></script>
<script src="{{asset('js/home/kkpager.min.js')}}"></script>
<script src="{{asset('js/home/search.js')}}"></script>
<script src="{{asset('js/home/search-client.js')}}"></script>
<script src="{{asset('js/home/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('js/home/qikoo-v.js')}}"></script>
@endsection