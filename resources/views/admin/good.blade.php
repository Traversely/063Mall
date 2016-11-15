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
                    <h3 class="box-title"><i class="fa fa-th"></i> 商品信息管理</h3>
                    <div class="box-tools">
                        <form action="{{url('admin/good')}}" method="get">
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
                            <th>商品</th>
                            <th>类别</th>
                            <th>品牌</th>
                            <th>销量</th>
                            <th>状态</th>
                            <th>上新时间</th>
                            <th>管理</th>
                        </tr>
                        @foreach($list as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>
                                <span style="cursor:pointer;"  onclick="getGdetail({{$v->id}})"  data-toggle="modal" data-target="#myModal">
                                    {{ $v->good }}
                                </span>
                            </td>
                            <td>{{ $v->type1.'-'.$v->type2.'-'.$v->type3 }}</td>
                            <td>{{ $v->brand }}</td>
                            <td>{{ $v->sale }}</td>
                            <td>{{ '1'==$v->onSale?'销售':'下架' }}</td>
                            <td>{{ date('Y-m-d',$v->time) }}</td>
                            <td>
                                <input type="button" value="添加详情" onclick="doEdit({{$v->id}})" class="btn btn-xs btn-primary">
                                <input type="button" value="{{ '1'==$v->onSale?'下架':'销售' }}" onclick="doDis({{$v->onSale==1?$v->id:'-'.$v->id}})" class="btn btn-xs btn-{{ '0'==$v->onSale?'primary':'danger' }}">
                            </td>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:10px">
            <div class="modal-header" style="margin-top:150px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="font-family:微软雅黑;"></h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered centertable" id="tid">
                        
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="editBut">编辑</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section("myscript")
<script type="text/javascript">

    //跳转到添加详情页，并将商品 ID 传过去
    function doEdit(id){
        location.href="{{url('admin/good/detail').'/'}}"+id;
    }

    //设置商品的销售、下架
    function doDis(id){
        location.href="{{url('admin/good/detail/display').'/'}}"+id;
    }

    //获取商品对应的详细商品信息
    function getGdetail(id){
        var model = '';
        var data = null;
        
        //将表格和标题置空
        $('#tid').empty();
        $('#myModalLabel').html(''); 

        //利用 Ajax 获取商品对应的详细商品信息
        $.ajax({
           type:"GET",
            url:"{{url('admin/good/detail/ajax')}}/"+id,
       dataType:"text",
        success:function(res){
                    
                    //利用得到的值创建数组对象 data
                    eval('data ='+res);

                    //拼装表格内容字符串
                    model = '<tr><th>型号</th><th>库存</th><th>价格</th></tr>';

                    //遍历 data 数组，并将值插入表格
                    for (var i=0; i<data.length; i++){
                        model += '<tr><td>'+ data[i].color +'</td><td>'+ data[i].stock +'</td><td>￥'+ data[i].price +'</td></tr>';
                    }

                    //设置标题内容
                    $('#myModalLabel').html(data[0].good);

                    //将表格内容插入 table 元素内
                    $('#tid').append(model);

                    //设置编辑按钮跳转至编辑商品详情页面 
                    $('#editBut').click(function(){
                        location.href="{{url('admin/good/detail/show').'/'}}"+id;
                    })

                },
          error:function(){
                    alert("Ajax加载失败！");
                }
        });
    }
</script>
@endsection