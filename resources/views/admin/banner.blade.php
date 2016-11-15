@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Banner列表
        <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">Banner管理</a></li>
        <li class="active">Banner列表</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-th"></i> Banner管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered centertable">
                        <tr>
                            <th style="width:60px">ID</th>
                            <th>图片</th>
                            <th>链接商品</th>
                            <th>描述</th>
                            <th>显示</th>
                            <th>Banner管理</th>
                        </tr>
                        @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td><img src="{{ asset(url($v->picture)) }}" width="200" data-toggle="modal" data-target="#myModal{{$v->id}}"></td>
                            <td>{{ $v->gid }}</td>
                            <td>{{ $v->description }}</td>
                            <td>{{ '1'==$v->display?'是':'否' }}</td>
                            <td>
                                <input type="button" value="编辑" onclick="doEdit({{$v->id}})" class="btn btn-xs btn-primary">
                                <input type="button" value="{{ '1'==$v->display?'禁用':'启用' }}" onclick="doDis({{$v->id}})" class="btn btn-xs btn-primary">
                                <input type="submit" value="删除" onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{$v->id}}" tabindex="-1" style="text-align:center" role="dialog" aria-labelledby="myModalLabel">
                                <img src="{{asset($v->picture)}}" style="width:90%;margin-top:200px">
                            </div>
                        </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $list->render() !!}
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
            $("#delForm").attr("action","{{url('admin/banner/')}}/"+id).submit(); 
        }
    }
    function doDis(id){
        location.href="{{url('admin/banner/display').'/'}}"+id;
    }
    function doEdit(id){
        location.href="{{url('admin/banner').'/'}}"+id;
    }
</script>
@endsection