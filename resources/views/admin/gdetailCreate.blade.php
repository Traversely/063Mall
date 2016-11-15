@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        商品列表
        <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">商品管理</a></li>
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
                    <h3 class="box-title"><i class="fa fa-plus"></i> 添加商品详情</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" id="goodForm" action="{{url('admin/good/detail').'/'.$gid}}" method="post" enctype="multipart/form-data" onsubmit="return doSubmit(this)">
                {{ csrf_field('goodCreate') }}
                <input type="hidden" name="gid" id="hid" value="{{$gid}}">
                    <div class="box-body">
                    <!--提示信息-->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-4">
                                <p id="remind" style="display:none">请填写完整信息，带 * 为必填！</p>
                            </div>
                        </div>
                    <!--商品型号-->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">型号 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="color" id="color">
                            </div>
                        </div>
                    <!--商品配置-->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">配置 <span style="color:red">&nbsp;&nbsp;</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="configuration" id="color">
                            </div>
                        </div>
                    <!--商品图片-->
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">图片 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" multiple name="picture[]" id="picture">
                                <p id="remindm" style="display:none">上传图片不能超过5张！</p>
                            </div>
                        </div>
                    <!--商品价格-->
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">价格 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="price" id="price">
                            </div>
                        </div>
                    <!--商品库存-->
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">库存 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="stock" id="stock">
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-offset-2 col-sm-1">
				            <button type="button" onclick="doContinue()" class="btn btn-primary">继续添加</button>
                        </div>
                        <div class="col-sm-1">
                            <button type="button" onclick="doFinish()" class="btn btn-primary">完成</button>
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
    function doSubmit(objForm){
        if($('#color').val() && $('#price').val() && $('#stock').val() && $('#picture').val()){
            //判断上传图片的个数，不能超过5个
            if(window.File && window.FileList) {
                var fileCount = objForm["picture[]"].files.length;
                if(fileCount > 5){
                    $('#remindm').css({display:'block',color:'red',fontFamily:'微软雅黑'});
                    return false;
                } else {
                    $('#remindm').hide();
                }
            }
            return true;
        }else{
            $('#remind').css({display:'block',color:'red',fontFamily:'微软雅黑'});
            return false;
        }
    }

    function doContinue(){
        $('#hid').val({{$gid}});
        $('#goodForm').submit();
    }

    function doFinish(){
        $('#hid').val('-'+{{$gid}});
        $('#goodForm').submit();
    }
</script>
<!--编辑器 JS 文件-->
<script src="{{asset('froala/js/froala_editor.min.js')}}"></script>
<!--[if lt IE 9]>
    <script src="{{asset('froala/js/froala_editor_ie8.min.js')}}"></script>
<![endif]-->
<script src="{{asset('froala/js/plugins/tables.min.js')}}"></script>
<script src="{{asset('froala/js/plugins/lists.min.js')}}"></script>
<script src="{{asset('froala/js/plugins/colors.min.js')}}"></script>
<script src="{{asset('froala/js/plugins/media_manager.min.js')}}"></script>
<script src="{{asset('froala/js/plugins/font_family.min.js')}}"></script>
<script src="{{asset('froala/js/plugins/font_size.min.js')}}"></script>
<script src="{{asset('froala/js/plugins/block_styles.min.js')}}"></script>
<script src="{{asset('froala/js/plugins/video.min.js')}}"></script>
<script src="{{asset('froala/js/langs/zh_cn.js')}}"></script>
<script type="text/javascript">
    //实现编辑器的汉化和图片的本地路径保存
    $(function(){
        $('#edit').editable({
            inlineMode: false, 
            alwaysBlank: true,
            language: "zh_cn",
            direction: "ltr",
            fileUploadURL:"{{asset(url('uploads/gdiscribe'))}"
        })
    });
</script>
@endsection