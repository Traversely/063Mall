@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        订单管理列表
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">订单管理</a></li>
        <li class="active">订单列表</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-th"></i> 订单信息管理</h3>
    				<div class="box-tools">
                        <form action="{{url('admin/order')}}" method="get">
                            <div class="input-group" style="width:150px;">
                                <input type="text" name="search" class="form-control input-sm pull-right" />
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
				
                <div class="box-body">
                    <table class="table table-bordered centertable">
                        <tr>
                            <th style="width:60px">ID</th>
                            <th>用户名</th>
                            <th>商品名</th>
                            <th>数量</th>
                            <th>价格</th>
                            <th>状态</th>
                            <th>下单时间</th>
                            <th>操作</th>
                        </tr>
						
                        @foreach($order as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->good }}</td>
                            <td>{{ $v->count }}</td>
                            <td>{{ $v->price }}</td>
                            <td>@if($v->status == 0) 未付款 @elseif($v->status == 1) 未发货 @elseif($v->status == 2) 已签收 @else($v->status == 3)未评价 @endif</td>
                            <td>{{ date("Y-m-d  H:i:s",$v->time) }}</td>
                            <td>
								<a href="{{url('admin/order/orderdetail/')}}/{{$v->id}}"><input type="button" value="查看详情" class="btn btn-xs btn-danger"></a>
                                <input type="button" value="编辑" onclick="doEdit({{$v->id}})" class="btn btn-xs btn-primary">
                                <!--<input type="submit" value="删除" onclick="doDel({{$v->id}})" class="btn btn-xs btn-primary">
								-->
                            </td>
                        </tr>
                        @endforeach
						
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $order->appends($params)->render() !!}
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<form action="" style="display:none;" id="delForm" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="_method" value="DELETE">
</form>
<form action="" style="display:none;" id="editForm" method="get">
    
</form>
<form action="" style="display:none;" id="detailForm" method="get">
    
</form>
@endsection

@section("myscript")
<script type="text/javascript">
    function doDel(id){
        if(confirm('确定要删除吗？')){
            $("#delForm").attr("action","{{url('admin/order/')}}/"+id).submit(); 
        }
    }
   
    function doEdit(id){
		$("#editForm").attr("action",'{{url("admin/order/")}}/'+id).submit(); 
        
    }
</script>
@endsection