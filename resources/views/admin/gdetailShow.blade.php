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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-th"></i> 商品详情编辑</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                        <table class="table table-bordered centertable">
                            <tr>
                                <th style="width:60px">ID</th>
                                <th>型号</th>
                                <th>库存</th>
                                <th>价格</th>
                                <th>操作</th>
                            </tr>
                            @foreach($list as $v)
                            <form action="{{url('admin/good/update/detail')}}" method="post">
                            <input type="hidden" name="id" value="{{$v->id}}">
                            {{ csrf_field('detailUpdate') }}
                            <tr>
                                <td>{{ $v->id }}</td>
                                <td>
                                    <span style="cursor:pointer;"  onclick="getGdetail({{$v->id}})"  data-toggle="modal" data-target="#myModal">
                                        {{ $v->color }}
                                    </span>
                                </td>
                                <td><input type="text" name="stock" value="{{ $v->stock }}" size="7" onchange="doEdit({{$v->id}})"></td>
                                <td>￥<input type="text" name="price" value="{{ $v->price }}" size="7" onchange="doEdit({{$v->id}})"></td>
                                <td>
                                    <input type="submit" id="editBut{{$v->id}}" value="修改" disabled="true" onclick="doUpdate({{$v->id}})" class="btn btn-xs btn-primary">
                                    <input type="button" value="删除" onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">
                                </td>
                            </tr>
                            </form>
                            @endforeach
                        </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $list->render() !!}
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-header" style="margin-top:50px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="font-family:微软雅黑;">商品图片</h4>
            </div>
            <div class="modal-body" style="text-align:center">
                <img src="" id="img" height="480">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="lastImg()">上一张</button>
                <button type="button" class="btn btn-primary" onclick="nextImg()" >下一张</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section("myscript")
<script type="text/javascript">

    var data = new Array();
    var img = $('#img');

    //Ajax 技术实现获取商品对应的图片信息
    function getGdetail(id){
        img.attr('src','');
        $('#tid').empty();
        $.ajax({
           type:"GET",
            url:"{{url('admin/good/picture/ajax')}}/"+id,
       dataType:"text",
        success:function(res){
                    eval('data ='+res);
                    img.attr('src','http:\/\/alalei.com\/'+data[0]);
                },
          error:function(){
                    alert("Ajax加载失败！");
                }
        });
    }

    //实现按钮翻图 上一页
    function lastImg(){
        for (var i=0; i<data.length; i++){
            if(('http:\/\/alalei.com\/'+data[i]) == img.attr('src')){
                if(i == 0){
                    img.attr('src','http:\/\/alalei.com\/'+data[data.length-1]);
                    return;
                }
                img.attr('src','http:\/\/alalei.com\/'+data[i-1]);
                return;
            }
        }
    }

    //实现按钮翻图 下一页
    function nextImg(){
        for (var i=0; i<data.length; i++){
            if(('http:\/\/alalei.com\/'+data[i]) == img.attr('src')){
                if(i == (data.length-1)){
                    img.attr('src','http:\/\/alalei.com\/'+data[0]);
                    return;
                }
                img.attr('src','http:\/\/alalei.com\/'+data[i+1]);
                return;
            }
        }
    }

    //当 input 元素内的值发生改变时，设置修改按钮为可用
    function doEdit(id){
        $('#editBut'+id).attr('disabled',false);
    }

    //实现删除功能
    function doDel(id){
        location.href="{{url('admin/good/detail/delete').'/'}}"+id;
    }
</script>
@endsection