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
                    <h3 class="box-title"><i class="fa fa-plus"></i> 添加商品</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" id="goodForm" action="{{url('admin/good')}}" method="post" enctype="multipart/form-data" onsubmit="return doSubmit(this)">
                {{ csrf_field('goodCreate') }}
                    <div class="box-body">
                    <!--提示信息-->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-4">
                                <p id="remind" style="display:none">请填写完整信息，带 * 为必填！</p>
                            </div>
                        </div>
                    <!--商品名称-->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">名称 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="good" id="good">
                                <p id="remind1" style="display:none">商品名称不能为空！</p>
                            </div>
                        </div>
                    <!--商品类别-->
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">类别 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <select name="type1" id="s1" class="form-control">
                                    <option value="">-请选择-</option>
                                    @foreach($type1 as $k1=>$v1)
                                    <option value="{{$k1}}">{{$v1}}</option>
                                    @endforeach
                                </select><br>
                                <select name="type2" id="s2" class="form-control">
                                    <option value="">-请选择-</option>
                                </select><br>
                                <select name="type3" id="s3" class="form-control">
                                    <option value="">-请选择-</option>
                                </select>
                                <p id="remind2" style="display:none">请选择商品类别！</p>
                            </div>
                        </div>
                    <!--商品品牌-->
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">品牌 <span style="color:red">*</span></label>
                            <div class="col-sm-4">
                                <select name="brand" class="form-control" id="brand">
                                    <option value="">-请选择-</option>
                                    @foreach($brand as $k1=>$v1)
                                    <option value="{{$k1}}">{{$v1}}</option>
                                    @endforeach
                                </select>
                                <p id="remind3" style="display:none">请选择商品品牌！</p>
                            </div>
                        </div>
                    <!--商品状态-->
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">状态 <span style="color:red">&nbsp;&nbsp;</span></label>
                            <div class="col-sm-4">
                                <select name="onSale" class="form-control">
                                    <option value="0" selected>下架</option>
                                    <option value="1">销售</option>
                                </select>
                            </div>
                        </div>
                    <!--商品描述-->
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">商品描述</label>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9" style="margin-left:210px;"> 
                                <section id="editor" class="form-group" style="width:600px;">
                                    <textarea id='edit' name="detail" style="margin-top: 30px;"></textarea>
                                </section>
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-offset-2 col-sm-1">
				            <button type="submit" class="btn btn-primary">添加详情</button>
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
        if($('#good').val() && $('#s1').val() && $('#s2').val() && $('#s3').val() && $('#brand').val()){
            $('#remind').hide();
            return true;
        }else{
            $('#remind').css({display:'block',color:'red',fontFamily:'微软雅黑'});
            return false;
        }
    }

    //创建三级类别的联动
    var s1 = document.getElementById("s1");
    var s2 = document.getElementById("s2");
    var s3 = document.getElementById("s3");
    //获取类别一的改变，并获取类别二的值，创建 option 对象插入 s2 下拉框内
    s1.onchange = function(){
        var v = this.value;
        $.ajax({
           type:"GET",
            url:"{{url('admin/good/ajax')}}/"+v,
       dataType:"text",
        success:function(res){
                    eval('var data ='+res);
                    //当类别一发生变化时，置空类别二和类别三的值
                    s2.length=1;
                    s3.length=1;
                    for (key in data){
                        s2.add(new Option(data[key],key));
                    }
                },
          error:function(){ //失败的回调函数
                    alert("Ajax加载失败！");
                }
        });
    }

    //获取类别二的改变，并获取类别三的内容
    s2.onchange = function(){
        var v = this.value;
        $.ajax({
           type:"GET",
            url:"{{url('admin/good/ajax')}}/"+v,
       dataType:"text",
        success:function(res){
                    eval('var data ='+res);
                    s3.length=1;
                    for (key in data){
                        s3.add(new Option(data[key],key));
                    }
                },
          error:function(){ //失败的回调函数
                    alert("Ajax加载失败！");
                }
        });
    }
</script>
<script type="text/javascript">
    //实现编辑器的汉化和图片的本地路径保存
    $(function(){
        $('#edit').editable({
            inlineMode: false, 
            alwaysBlank: true,
            language: "zh_cn",
            direction: "ltr",
            theme: 'gray',
            height: '200px'
        })
    });
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
@endsection