@extends('admin.base')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="glyphicon glyphicon-envelope"></i>
        站内信管理
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#">站内信管理</a></li>
        <li class="active">发送站内信</li>
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
                    <h3 class="box-title"><i class="fa fa-th"></i> 发送站内信</h3>
                </div><!-- /.box-header -->
               
                <!-- form start -->
                <form class="form-horizontal" action="{{url('admin/msg')}}" method="post" enctype="multipart/form-data" onsubmit="return doSubmit()">
                    <input type="hidden" name="_token" value="{{ csrf_token('sendMsg') }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" id="inputTitle" placeholder="请输入标题">
                                <span id="title" style="display:none">&nbsp;&nbsp;&nbsp;标题不能为空！</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">内容</label>
                            <div class="col-sm-4">
                                <textarea rows="6"  class="form-control" name="content" id="inputContent" placeholder="请输入内容"></textarea>
                                <span id="content" style="display:none">&nbsp;&nbsp;&nbsp;内容不能为空！</span>
                            </div>
                        </div>
                        <!-- 发送人 -->
                        <input type="hidden" name="author" value="{{ session('adminuser')->nickName ? session('adminuser')->nickName : session('adminuser')->name  }}" />
                        <!-- 发送时间 -->
                        <input type="hidden" name="time" value="{{ time() }}" />
                        <div class="form-group"></div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-offset-2 col-sm-1">
                            <button type="submit" class="btn btn-primary">添加</button>
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
        if($('#inputTitle').val() == ''){
            $('#title').css({display:'block',color:'red',fontFamily:'微软雅黑'});
            return false;
        }
        
        if($('#inputContent').val() == ''){
            $('#content').css({display:'block',color:'red',fontFamily:'微软雅黑'});
            return false;
        }
    }
</script>
@endsection