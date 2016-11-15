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
        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> 修改订单信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{url('admin/order').'/'.$order->id}}" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="id" readonly value="{{$order->id}}" id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">订单ID不能修改！</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">用户ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="uid" readonly value="{{$order->uid}}" id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">用户ID不能修改！</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">商品ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="gid" readonly value="{{$order->gid}}" id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">商品ID不能修改！</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">数量</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="count" readonly value="{{$order->count}}" id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">订单ID不能修改！</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">价格</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="price" readonly value="{{$order->price}}" id="inputEmail3" placeholder="请输入版块名">
                                
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">状态</label>
                            <div class="col-sm-4">
                                <select	name='status' class="form-control">
									<option value= 0 >未付款</option>
									<option value= 1 >未发货</option>
									<option value= 2 >已签收</option>
									<option value= 3 >未评价</option>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">下单时间</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="time" readonly value='{{date("Y-m-d",$order->time)}}' id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">订单ID不能修改！</p>
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-offset-2 col-sm-1">
				            <button type="submit" class="btn btn-primary">修改</button>
                        </div>
		                <div class="col-sm-1">
				            <button type="reset" class="btn btn-primary">重置</button>
			            </div>
                </form>
                    </div><!-- /.box-footer -->
		        <div class="row">
                    <div class="col-sm-12">&nbsp;</div>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div><!-- /.row -->
</section><!-- /.content -->
@endsection
