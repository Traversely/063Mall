@extends('admin.base')

@section('content')
@if( session('delAdmin') )
    <script type="text/javascript">
        $(function(){
            SimplePop.alert("{{ session('delAdmin') }}");
        });
    </script>
@endif
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-calendar"></i>
        用户管理
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">管理员列表</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-th"></i> 用户信息管理</h3>
                    <div class="box-tools">
                        <form action="{{url('admin/admin')}}" method="get">
                            <div class="input-group" style="width:150px;">
                                <input type="text" name="search" class="form-control input-sm pull-right" placeholder="用户名"/>
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
                            <th>头像</th>
                            <th>权限</th>
                            <th>昵称</th>
                            <th style="width: 150px">操作</th>
                        </tr>
                        @foreach($list as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td style="vertical-align:middle;"><a href="javascript:;" data-toggle="modal" data-target="#photo{{ $admin->id }}" class="btn btn-xs"><img src="{{ asset($admin->photo) }}" height="40" class="img-rounded"/></a></td>
                            <td>{{ $admin->auth == 0 ? "普通管理员" : "超级管理员" }}</td>
                            <td>{{ $admin->nickName ? $admin->nickName : "" }}</td>
                            <td>
                                <input type="submit" value="删除" onclick="doDel({{$admin->id}})" {{ session('adminuser')->auth == 0 ? "disabled" : "" }} class="btn btn-xs btn-danger">
                                <!-- 普通管理员只能修改自己的信息 -->
                                @if( session('adminuser')->name != $admin->name && session('adminuser')->auth == 0 )
                                <input type="button" value="编辑" onclick="doEdit({{$admin->id}})" disabled class="btn btn-xs btn-primary">
                                @else
                                <input type="button" value="编辑" onclick="doEdit({{$admin->id}})" class="btn btn-xs btn-primary">
                                @endif
                            </td>
                        </tr>
                        <!-- modal静态框 -->
                        <div class="modal fade" id="photo{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                            <button type="button" class="close btn btn-default btn-lg" data-dismiss="modal"style="position:relative;right:400px;top:80px;background-color:#fff;">
                                <span aria-hidden="true" class="glyphicon glyphicon-remove" ></span>
                            </button>
                            <div class="modal-dialog" role="document" style="text-align:center;margin-top:100px;">
                                    <img src="{{ asset($admin->photo) }}" class="img-rounded" style="width:400px;"/>
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
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
<form action="" style="display:none;" id="mydeleteform" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="_method" value="DELETE">
</form>
<form action="" style="display:none;" id="myeditform" method="get">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</form>
@endsection

@section("myscript")
    <script type="text/javascript">
        function doDel(id){
            SimplePop.confirm("确定要删除吗？",{
                confirm: function(){ 
                    $("#mydeleteform").attr("action","{{url('admin/admin/')}}/"+id).submit(); 
                } 
            });
        }
        function doEdit(id){
            $("#myeditform").attr("action","{{ url('admin/admin') }}/"+id).submit();
        }
    </script>
@endsection