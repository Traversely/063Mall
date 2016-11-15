@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        品牌列表
        <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">品牌管理</a></li>
        <li class="active">品牌列表</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-th"></i> 品牌信息管理</h3>
                    <div class="box-tools">
                        <form action="{{url('admin/brand')}}" method="get">
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
                            <th>名称</th>
                            <th>简介</th>
                            <th>推广</th>
                            <th>显示</th>
                            <th>品牌管理</th>
                        </tr>
                        @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->brand }}</td>
                            <td>{{ $v->info }}</td>
                            <td>{{ '1'==$v->popularize?'是':'否' }}</td>
                            <td>{{ '1'==$v->display?'是':'否' }}</td>
                            <td>
                                <input type="button" value="编辑" onclick="doEdit({{$v->id}})" class="btn btn-xs btn-primary">
                                <input type="submit" value="删除" onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">
                            </td>
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
    function doDel(id){
        if(confirm('确定要删除吗？')){
            $("#delForm").attr("action","{{url('admin/brand/')}}/"+id).submit(); 
        }
    }
    function doEdit(id){
        location.href="{{url('admin/brand').'/'}}"+id;
    }
</script>
@endsection