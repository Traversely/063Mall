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
        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-plus"></i> 添加Banner</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{url('admin/banner').'/'.$banner->id}}" method="post" enctype="multipart/form-data" onsubmit="return doSubmit()">
                {{ csrf_field('sectCreate') }}
                {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">商品ID</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$banner->gid}}" class="form-control" name="gid" id="inputEmail3" placeholder="请输入要链接到的商品ID">
                                <p id="remind" style="display:none">商品ID不能为空！</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-4">
                                <img src="{{asset(url($banner->picture))}}" width="360">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="picture" id="inputPassword3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">描述</label>
                            <div class="col-sm-4">
                                <textarea name="description" class="form-control" cols="30" rows="10">{{$banner->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">显示</label>
                            <div class="col-sm-4">
                                <select name="display" class="form-control" >
                                    <option value="1" {{$banner->display==1?'selected':''}}>是</option>
                                    <option value="0" {{$banner->display==1?'selected':''}}>否</option>
                                </select>
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
    //判断用户输入的Banner名称是否为空，为空则不能提交
    function doSubmit(){
        if($('#inputEmail3').val() == ''){
            $('#remind').css({display:'block',color:'red',fontFamily:'微软雅黑'});
            return false;
        }
    }
</script>

@endsection