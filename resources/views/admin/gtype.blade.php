@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        商品类别列表
        <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">类别管理</a></li>
        <li class="active">类别列表</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-th"></i> 类别信息管理</h3>
                    <div class="box-tools">
                        <form action="{{url('admin/gtype')}}" method="get">
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
                            <th width="120">分类树</th>
                            <th>路径</th>
                            <th>名称</th>
                            <th>商品数量</th>
                            <th>类别管理</th>
                        </tr>
                        @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>
                            @for($i=0; $i < $v->level; $i++)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @endfor
                                <img src="{{'0'==$v->level?url('uploads/public/admin/fection.gif'):url('uploads/public/admin/section.gif')}}">
                            </td>
                            <td>{{ $v->path }}</td>
                            <td>{{ $v->type }}</td>
                            <td>{{ $v->goodNum }}</td>
                            <td>
                                <input type="button" value="编辑" data-toggle="modal" data-target="#myEditModal{{$v->id}}" class="btn btn-xs btn-primary">
                                <input type="button" value="添加子分类" {{$v->level==2?'disabled':''}} data-toggle="modal" data-target="#myModal{{$v->id}}" class="btn btn-xs btn-primary">
                                <input type="submit" value="删除" onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <form action="{{url('admin/gtype/child')}}" method="post">
                                    <input type="hidden" name="pid" value="{{$v->id}}">
                                    {{ csrf_field('addChild') }}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="border-radius:10px">
                                            <div class="modal-header" style="margin-top:200px">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">添加子类别</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label">类别名称</label>
                                                    <div class="col-sm-4" style="position:relative;top:-10px;">
                                                        <input type="text" class="form-control" name="type" id="inputPassword3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <button type="submit" class="btn btn-primary">添加</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="myEditModal{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <form action="{{url('admin/gtype').'/'.$v->id}}" method="post">
                                    <input type="hidden" name="pid" value="{{$v->id}}">
                                    {{ csrf_field('updateType') }}
                                    {{ method_field('PUT') }}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="border-radius:10px">
                                            <div class="modal-header" style="margin-top:200px">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">修改类别</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label">类别名称</label>
                                                    <div class="col-sm-4" style="position:relative;top:-10px;">
                                                        <input type="text" class="form-control" name="type" value="{{$v->type}}" id="inputPassword3">
                                                    </div>
                                                </div>
                                                @if($v->pid == 0)
                                                <br><br><span style="margin-left:20px;margin-top:10px;">如需修改前台版块LOGO请前往版块管理！</span>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <button type="submit" class="btn btn-primary">修改</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
    function doDel(id){
        $.ajax({
            type:'GET',
            url:'{{url("admin/gtype/ajax")."/"}}'+id,
            success:function(msg){
                if(msg){
                    alert(msg);
                }else{
                    if(confirm('确定要删除吗？')){
                        $("#delForm").attr("action","{{url('admin/gtype/')}}/"+id).submit(); 
                    }
                }
            }
        });
    }
    function doEdit(id){
        location.href="{{url('admin/gtype').'/'}}"+id;
    }
</script>
@endsection