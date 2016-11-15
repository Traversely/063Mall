@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
@if( session('freeze') )
    <script type="text/javascript">
        $(function(){
            SimplePop.alert("{{ session('freeze') }}");
        });
    </script>
@endif
@if( session('deluser') )
    <script type="text/javascript">
        $(function(){
            SimplePop.alert("{{ session('deluser') }}");
        });
    </script>
@endif
<section class="content-header">
    <h1>
        <i class="glyphicon glyphicon-user"></i>
        用户管理
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">用户列表</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-th"></i> 用户信息浏览</h3>
                    <div class="box-tools">
                        <form action="{{url('admin/users')}}" method="get">
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
                            <th>昵称</th>
                            <th>头像</th>
                            <th>性别</th>
                            <th>年龄</th>
                            <th>邮箱</th>
                            <th>手机</th>
                            <th>优惠券</th>
                            <th>积分</th>
                            <th>状态</th>
                            <th>上次登录</th>
                            <th style="width: 150px">操作</th>
                        </tr>
                        @foreach($list as $users)
                        <tr>
                            <td style="vertical-align:middle;">{{ $users->id }}</td>
                            <td style="vertical-align:middle;">{{ $users->name }}</td>
                            <td style="vertical-align:middle;">{{ $users->nickName }}</td>
                            <td style="vertical-align:middle;"><a href="javascript:;" data-toggle="modal" data-target="#photo{{ $users->id }}" class="btn btn-xs"><img src="{{ asset($users->photo) }}" height="40" class="img-rounded"/></a></td>
                            <td style="vertical-align:middle;">{{ $users->sex }}</td>
                            <td style="vertical-align:middle;">{{ $users->age }}</td>
                            <td style="vertical-align:middle;">{{ $users->email }}</td>
                            <td style="vertical-align:middle;">{{ $users->phone }}</td>
                            <td style="vertical-align:middle;">{{ $users->coupon }}</td>
                            <td style="vertical-align:middle;">{{ $users->integral }}</td>
                            <td style="vertical-align:middle;">{{ $users->status == 0 ? "已冻结" : "正常使用" }}</td>
                            <td style="vertical-align:middle;">{{ date("Y-m-d H:i:s",$users->lastLogin) }}</td>
                            <td style="vertical-align:middle;">
                                <input type="submit" value="删除" onclick="doDel({{$users->uid}})" class="btn btn-xs btn-danger">
                                <input type="submit" value="{{ $users->status == 0 ? '解冻' : '冻结' }}" onclick='doEdit({{$users->id}})' class='btn btn-xs btn-primary'>
                            </td>
                        </tr>
                        <!-- modal静态框 -->
                        <div class="modal fade" id="photo{{ $users->id }}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                            <button type="button" class="close btn btn-default btn-lg" data-dismiss="modal"style="position:relative;right:400px;top:80px;background-color:#fff;">
                                <span aria-hidden="true" class="glyphicon glyphicon-remove" ></span>
                            </button>
                            <div class="modal-dialog" role="document" style="text-align:center;margin-top:100px;">
                                    <img src="{{ asset($users->photo) }}" class="img-rounded" style="width:400px;"/>
                                
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
<form action="" style="display:none;" id="myeditform" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="_method" value="PUT">
</form>
@endsection

@section("myscript")
    <script type="text/javascript">
        function doDel(id){
            SimplePop.confirm("确认要删除吗?",{
                confirm: function(){ 
                    $("#mydeleteform").attr("action","{{ url('admin/users/') }}/"+id).submit(); 
                } 
            });
        }
        
        
        function doEdit(id){
            $("#myeditform").attr("action","{{ url('admin/users') }}/"+id).submit();
        }
    </script>
@endsection