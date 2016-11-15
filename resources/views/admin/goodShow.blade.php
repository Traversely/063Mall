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
        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> 添加板块</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{url('admin/sect').'/'.$sect->id}}" method="post" enctype="multipart/form-data" onsubmit="return doSubmit()">
                    {{ csrf_field('sectCreate') }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">版块名称</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" value="{{$sect->name}}" id="inputEmail3" placeholder="请输入版块名">
                                <p id="remind" style="display:none">版块名不能为空！</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">LOGO</label>
                            <div class="col-sm-4">
                                <img src="{{asset($sect->logo)}}" width="200">
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
				            <button type="submit" class="btn btn-primary">修改</button>
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
    //判断用户输入的版块名称是否为空，为空则不能提交
    function doSubmit(){
        if($('#inputEmail3').val() == ''){
            $('#remind').css({display:'block',color:'red',fontFamily:'微软雅黑'});
            return false;
        }
    }
</script>
@endsection