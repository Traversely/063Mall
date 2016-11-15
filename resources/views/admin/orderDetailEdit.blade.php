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
                <form class="form-horizontal" action="{{url('admin/orderdetail').'/'.$orderdetails->id}}" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="id" readonly value="{{$orderdetails->id}}" id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">订单ID不能修改！</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">订单ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="oid" readonly value="{{$orderdetails->oid}}" id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">用户ID不能修改！</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">付款方式</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="pay" value="@if($orderdetails->pay == 0) 支付宝 @elseif($orderdetails->pay == 1) 储蓄卡 @elseif($orderdetails->pay == 2) 信用卡 @else($orderdetails->pay == 3) 货到付款 @endif" id="inputEmail3" placeholder="请输入版块名">
                                
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">配送信息</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="deliver"  value="@if($orderdetails->deliver == 0) 普通快递 @elseif($orderdetails->pay == 1) 邮政 @elseif($orderdetails->pay == 2) CMS @else($orderdetails->pay == 3) 自取 @endif" id="inputEmail3" placeholder="请输入版块名">
                               
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">是否发票</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="invoice"  value="@if($orderdetails->invoice == 0) 不开发票 @elseif($orderdetails->invoice == 1) 开发票 @endif" id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">商品ID不能修改！</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">发票类型</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="invType" value="@if($orderdetails->invType == 0) 个 人 @elseif($orderdetails->invType == 1) 单 位 @endif" id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">订单ID不能修改！</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">单位发票抬头</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="invInfo" value="{{$orderdetails->invInfo}}" id="inputEmail3"> 
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">订单备注</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="remark" value="{{$orderdetails->remark}}" id="inputEmail3" >
                               
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">订单操作者</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="operator" value="{{$orderdetails->operator}}" id="inputEmail3" >
                               
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
<form action="" style="display:none;" id="detailForm" method="get">
    
</form>
@endsection
