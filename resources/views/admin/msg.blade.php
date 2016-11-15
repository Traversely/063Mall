@extends('admin.base')

@section('content')
@if( session('delmsg') )
    <script type="text/javascript">
        $(function(){
            SimplePop.alert("{{ session('delmsg') }}");
        });
    </script>
@endif
@if( session('addmsg') )
    <script type="text/javascript">
        $(function(){
            SimplePop.alert("{{ session('addmsg') }}");
        });
    </script>
@endif
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-calendar"></i>
        站内信管理
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">站内信管理</a></li>
        <li class="active">查看站内信</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-th"></i> 查看站内信</h3>
                    <div class="box-tools">
                        <form action="{{url('admin/msg')}}" method="get">
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
                            <th>标题</th>
                            <th>作者</th>
                            <th>发送时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($list as $msg)
                        <tr>
                            <td>{{ $msg->id }}</td>
                            <td>{{ $msg->title }}</td>
                            <td>{{ $msg->author }}</td>
                            <td>{{ date("Y-m-d H:i:s",$msg->time) }}</td>
                            <td>
                                <input type="button" value="删除" onclick="doDel({{$msg->id}})" class="btn btn-xs btn-danger">
                                <input type="button" value="查看" data-toggle="modal" data-target="#showMsg{{ $msg->id }}" class="btn btn-xs btn-primary">
                            </td>
                            <!-- modal静态框 -->
                            <div class="modal fade" id="showMsg{{ $msg->id }}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="border-radius:0px;background-color:#F0F5DE;margin-top:130px;">
                                    <button type="button" class="close" data-dismiss="modal" style="margin-right:10px;margin-top:6px;"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="gridSystemModalLabel" style="text-align:center;">{{ $msg->title }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-10">
                                                        <p>&nbsp;&nbsp;&nbsp;&nbsp;{{$msg->content}}</p><br/><br/>
                                                        <p style="text-align:right">发送人: {{ $msg->author }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                                        <p style="text-align:right">{{ date("Y-m-d H:i:s",$msg->time) }}</p>
                                                        <p></p>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
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
<form action="" style="display:none;" id="mydeleteform" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="hidden" name="_method" value="DELETE">
</form>
<form action="" style="display:none;" id="myshowform" method="get">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</form>
@endsection

@section("myscript")
    <script type="text/javascript">
        function doDel(id){
            SimplePop.confirm("确认要删除吗?",{
                confirm: function(){ 
                    $("#mydeleteform").attr("action","{{url('admin/msg/')}}/"+id).submit(); 
                } 
            });
        }
        function showMsg(id){
            //$("#myshowform").attr("action","{{ url('admin/msg') }}/"+id).submit();
            $("div.fade").modal({backdrop:'static'});
        }
    </script>
    
    
@endsection