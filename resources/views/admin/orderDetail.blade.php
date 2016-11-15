@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        订单管理列表
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin/order') }}"><i class="fa fa-dashboard"></i> 首页</a></li>
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
                <h3 class="box-title"><i class="fa fa-th"></i> 订单详情管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered centertable">
                        <tr>
                            <th style="width:60px">ID</th>
                            <th style="width:60px">订单ID</th>
                            <th style="width:60px">收货地址ID</th>
                            <th>付款方式</th>
                            <th>配送信息</th>
                            <th>是否发票</th>
                            
                            <th>单位发票抬头</th>
                            <th>订单备注</th>
                            <th>订单操作者</th>
                            <!--<th>操作</th>-->
							
                        </tr>
                       
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->oid }}</td>
                            <td>{{ $v->aid }}</td>
                            <td>@if($v->pay == 0) 支付宝 @elseif($v->pay == 1) 储蓄卡 @elseif($v->pay == 2) 信用卡 @else($v->pay == 3) 货到付款 @endif</td>
                            <td>@if($v->deliver == 0) 普通快递 @elseif($v->pay == 1) 邮政 @elseif($v->pay == 2) CMS @else($v->pay == 3) 自取 @endif</td>
                            <td>@if($v->invoice == 0) 开发票 @elseif($v->invoice == 1) 不开发票 @endif</td>
                            
                            <td>{{ $v->invInfo }}</td>
							<td>
							<!-- Button trigger modal -->
							<span  data-toggle="modal" data-target="#myModal">
							  {{ $v->remark }}
							</span>
								
							</td>
                            <td>{{ $v->operator }}</td>
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">订单备注信息</h4>
							  </div>
							  <div class="modal-body">
								<p>{{ $v->remark }}&hellip;</p>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								
							  </div>
							</div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
                       
                    </table>
                </div><!-- /.box-body -->
                
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

</section><!-- /.content -->

@endsection
