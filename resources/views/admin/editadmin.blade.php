@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-calendar"></i>
        用户管理
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">用户管理</a></li>
        <li class="active">编辑管理员信息</li>
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
                    <h3 class="box-title"><i class="fa fa-plus"></i> 编辑管理员信息</h3>
                </div><!-- /.box-header -->
                {{ $msg or "" }}
                <!-- form start -->
                <form class="form-horizontal" action="{{url('admin/admin')}}/{{$list->id}}" method="post" enctype="multipart/form-data" onsubmit="return doSubmit()">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token('addAdmin') }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"> 用 户 名</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" id="inputEmail3" value="{{ $list->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label"> 新 密 码</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" name="pass" id="inputPass" placeholder="请输入新密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">确认新密码</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" name="surepass" id="inputSurePass" placeholder="请确认新密码">
                                <span id="surepass" style="display:none">两次密码不一致</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label"> 权 限</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="auth">
                                    <option value="0" {{ $list->auth == 0 ? 'selected' : '' }} >普通管理员</option>
                                    <option value="1" {{ $list->auth == 1 ? 'selected' : '' }} >超级管理员</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label"> 昵 称</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nickName" id="inputPassword3" value="{{ $list->nickName }}">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label"> 头 像</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="photo" id="inputPassword3">
                            </div>
                            
                        </div>
                        <div class="form-group"></div>
                    
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-offset-2 col-sm-1">
                            <button type="submit" class="btn btn-primary">修改</button>
                        </div>
                        <div class="col-sm-1">
                            <button type="reset" class="btn btn-primary">重置</button>
                        </div>
                    </div><!-- /.box-footer -->
                </form>
                <div class="row"><div class="col-sm-12">&nbsp;</div></div>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->
@endsection

@section('myscript')
<script type="text/javascript">
    //判断用户输入的版块名称是否为空，为空则不能提交
    function doSubmit(){
        if($('#inputSurePass').val() !== $('#inputPass').val()){
            $('#surepass').css({display:'block',color:'red',fontFamily:'微软雅黑'});
            return false;
        }
    }
</script>
@endsection