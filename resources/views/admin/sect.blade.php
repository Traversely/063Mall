@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        商品版块列表
        <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">版块管理</a></li>
        <li class="active">版块列表</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-th"></i> 版块信息管理</h3>
                    <div class="box-tools">
                        <form action="{{url('admin/sect')}}" method="get">
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
                            <th>版块名称</th>
                            <th>状态</th>
                            <th>LOGO</th>
                            <th>版块管理</th>
                        </tr>
                        @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->type }}</td>
                            <td>{{ '1'==$v->display?'启用':'禁用' }}</td>
                            <td><img src="{{asset($v->logo)}}" width="30" data-toggle="modal" data-target="#myModal{{$v->id}}"></td>
                            <td>
                                <input type="button" value="商品管理" onclick="doAdd({{$v->id}})" class="btn btn-xs btn-primary">
                                <input type="button" value="编辑" onclick="doEdit({{$v->id}})" class="btn btn-xs btn-primary">
                                <input type="button" value="{{ '1'==$v->display?'禁用':'启用' }}" onclick="doDis({{$v->id}})" class="btn btn-xs btn-primary">
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="border-radius:10px">
                                        <div class="modal-header" style="margin-top:100px">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">查看版块LOGO</h4>
                                        </div>
                                        <div class="modal-body" style="text-align:center;">
                                            <img src="{{asset($v->logo)}}">
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $list->appends($params)->render() !!}
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<form action="" style="display:none;" id="delForm" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="_method" value="DELETE">
</form>
@endsection

@section("myscript")
<script type="text/javascript">
    function doDis(id){
        location.href="{{url('admin/sect/display').'/'}}"+id;
    }
    function doEdit(id){
        location.href="{{url('admin/sect').'/'}}"+id;
    }
    function doAdd(id){
        location.href="{{url('admin/sect/good').'/'}}"+id;
    }
</script>
@endsection