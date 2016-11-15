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
        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> 添加类别</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{url('admin/gtype')}}" method="post" enctype="multipart/form-data" onsubmit="return doSubmit()">
                {{ csrf_field('gtypeCreate') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">类别名称</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="type" id="inputEmail3" placeholder="请输入类别名">
                                <p id="remind" style="display:none">类别名不能为空！</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">锚点名称</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="target" id="inputEmail3" placeholder="请输入锚点名">
                                <p style="color:green;margin-top:8px">锚点名默认选取类别名称前两个字！</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">LOGO</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="logo" id="inputPassword3">
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-offset-2 col-sm-1">
				            <button type="submit" class="btn btn-primary">添加</button>
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
@endsection
@section('myscript')
<script type="text/javascript">
    //判断用户输入的类别名称是否为空，为空则不能提交
    function doSubmit(){
        if($('#inputEmail3').val() == ''){
            $('#remind').css({display:'block',color:'red',fontFamily:'微软雅黑'});
            return false;
        }
    }
</script>
@endsection