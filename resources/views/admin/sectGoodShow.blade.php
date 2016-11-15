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
        <li><a href="#">版块商品管理</a></li>
        <li class="active">商品列表</li>
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
                    <h3 class="box-title"><i class="fa fa-plus"></i> {{$sect->type}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{url('admin/sect/good').'/'.$sect->id}}" method="post" onsubmit="return doSubmit()">
                    {{ csrf_field('sectGoodAdd') }}
                    <div class="box-body">
                        <div class="col-sm-2"></div>
                        <p id="remind">请选择要在首页展示的商品，不能超过6个</p>
                        <div class="form-group">
                            @foreach($goods as $good)
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">
                                <input type="checkbox" name="good[]" {{$good->onsale==1?'checked':''}} value="{{$good->id}}">
                                <label>{{$good->good}}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-offset-2 col-sm-1">
				            <button type="submit" class="btn btn-primary">确认</button>
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
        if($(':checked').length > 6){
            $('#remind').css({color:'red',fontFamily:'微软雅黑'});
            return false;
        }
    }
</script>
@endsection