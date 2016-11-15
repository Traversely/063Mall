<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <title>网站后台管理</title>
        <!-- 告诉浏览器响应屏幕宽度 -->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="{{asset('myadmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <link href="{{asset('myadmin/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <!--<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->   
        <link href="{{asset('myadmin/bootstrap/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />    
        <!-- Theme style -->
        <link href="{{asset('myadmin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="{{asset('myadmin/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="{{asset('myadmin/plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="{{asset('myadmin/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="{{asset('myadmin/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="{{asset('myadmin/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="{{asset('myadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- 编辑器CSS样式 -->
        <link href="{{asset('froala/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('froala/css/froala_editor.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/home/simplepop.css')}}">
        <style type="text/css">
            h1,h2,h3,h4,h5,h6{font-family: 微软雅黑}
            .centertable{text-align:center;}
            .centertable th{text-align:center;}
        </style>
        <!-- jQuery 2.1.4 -->
        <script src="{{asset('myadmin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
        <script src="{{asset('js/home/simplepop.js')}}"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="{{asset('myadmin/bootstrap/js/html5shiv.min.js')}}"></script>
            <script src="{{asset('myadmin/bootstrap/js/respond.min.js')}}"></script>
        <![endif]-->
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="{{url('admin')}}" class="logo">
                    <!-- 对于侧边栏迷你50x50像素迷你标志 -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- 正常状态和移动设备标识 -->
                    <span class="logo-lg">网站后台管理</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">切换导航</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                </a>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                </a>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                </a>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{asset(session("adminuser")->photo)}}" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs">{{session("adminuser")->nickName}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{asset(session("adminuser")->photo)}}" class="img-circle" alt="User Image" />
                                        <p>
                                            {{ session("adminuser")->nickName ? session("adminuser")->nickName : session("adminuser")->name  }}-网站开发
                                            <small>会员于2012-11</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">追随者</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">销售</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">朋友</a>
                                        </div>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">简介</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{url('admin/logout')}}" class="btn btn-default btn-flat">退出</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset(session('adminuser')->photo)}}" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>{{ session("adminuser")->nickName ? session("adminuser")->nickName : session("adminuser")->name  }}</p>
                            <a href="{{url('admin/logout')}}"><i class="glyphicon glyphicon-log-out"></i> 退出</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">主导航</li>
                        <!--用户管理菜单-->
                        <li class="active treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i> <span>用户管理</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{url('admin/users')}}"><i class="fa fa-circle-o"></i> 浏览用户</a></li>
                                <li><a href="{{url('admin/admin')}}"><i class="fa fa-circle-o"></i> 查看管理员</a></li>
                                @if(session("adminuser")->auth == 1)
                                <li id="special"><a href="{{url('admin/admin/create')}}"><i class="fa fa-circle-o"></i> 添加管理员</a></li>
                                @endif
                            </ul>
                        </li>
                        
                        <!--站内信-->
                        <li class="active treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-envelope"></i> <span>站内信管理</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{url('admin/msg')}}"><i class="fa fa-circle-o"></i> 查看站内信</a></li>
                                <li><a href="{{url('admin/msg/create')}}"><i class="fa fa-circle-o"></i> 发送站内信</a></li>
                            </ul>
                        </li>

						<!--订单管理菜单-->
                        <li class="active treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-list-alt"></i> <span>订单管理</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{url('admin/order')}}"><i class="fa fa-circle-o"></i> 查看订单</a></li>
                            </ul>
                        </li>
                        
                        <!--商品板块管理菜单-->
                        <li class="active treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-bookmark"></i> <span>商品版块管理</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{url('admin/sect')}}"><i class="fa fa-circle-o"></i> 浏览版块</a></li>
                            </ul>
                        </li>

                        <!--商品管理菜单-->
                        <li class="active treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-barcode"></i> <span>商品管理</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{url('admin/good')}}"><i class="fa fa-circle-o"></i> 浏览商品</a></li>
                                <li class=""><a href="{{url('admin/good/no')}}"><i class="fa fa-circle-o"></i> 下架商品</a></li>
                                <li><a href="{{url('admin/good/create')}}"><i class="fa fa-circle-o"></i> 添加商品</a></li>
                            </ul>
                        </li>
                        <!--商品类别菜单-->
                        <li class="active treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-list"></i> <span>类别管理</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{url('admin/gtype')}}"><i class="fa fa-circle-o"></i> 浏览类别</a></li>
                                <li><a href="{{url('admin/gtype/create')}}"><i class="fa fa-circle-o"></i> 添加类别</a></li>
                            </ul>
                        </li>
                        <!--商品类别菜单-->
                        <li class="active treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i> <span>品牌管理</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{url('admin/brand')}}"><i class="fa fa-circle-o"></i> 浏览品牌</a></li>
                                <li><a href="{{url('admin/brand/create')}}"><i class="fa fa-circle-o"></i> 添加品牌</a></li>
                            </ul>
                        </li>
                        <!--Banner管理菜单-->
                        <li class="active treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-picture"></i> <span>Banner管理</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=""><a href="{{url('admin/banner')}}"><i class="fa fa-circle-o"></i> 查看Banner</a></li>
                                <li><a href="{{url('admin/banner/create')}}"><i class="fa fa-circle-o"></i> 添加Banner</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @section('content')
                页面主内容区
                @show
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>版本</b> 2.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed 工作室</a>.</strong> 保留所有权利.
            </footer>
            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class='control-sidebar-bg'></div>
        </div><!-- ./wrapper -->
        
        
        <!-- xdl-model提示框模板 -->
        <div id="xdl-alert" class="modal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="border-radius:10px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h5 class="modal-title" style="font-family:微软雅黑"><i class="fa fa-exclamation-circle"></i> [Title]</h5>
                    </div>
                    <div class="modal-body small">
                        <h4 style="font-family:微软雅黑;text-align:center">[Message]</h4>
                    </div>
                    <div class="modal-footer" >
                        <button type="button" class="btn btn-primary ok" data-dismiss="modal">[BtnOk]</button>
                        <button type="button" class="btn btn-default cancel" data-dismiss="modal">[BtnCancel]</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- xdl-model-end -->

        
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('myadmin/bootstrap/js/jquery-ui.min.js')}}" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          //$.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{asset('myadmin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>    
        <!-- Morris.js charts -->
        <script src="{{asset('myadmin/bootstrap/js/raphael-min.js')}}"></script>
        <script src="{{asset('myadmin/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <!-- Charts.js -->
        <script src="{{asset('myadmin/plugins/chartjs/Chart.min.js')}}" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="{{asset('myadmin/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('myadmin/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{{asset('myadmin/bootstrap/js/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('myadmin/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="{{asset('myadmin/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{asset('myadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="{{asset('myadmin/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="{{asset('myadmin/plugins/fastclick/fastclick.min.js')}}"></script>
        <!-- XDL-model-提示框 -->
        <script src="{{asset('myadmin/bootstrap/js/xdl-modal-alert-confirm.js')}}" type="text/javascript"></script> 
        <!-- AdminLTE App -->
        <script src="{{asset('myadmin/dist/js/app.min.js')}}" type="text/javascript"></script> 
        <!-- AdminLTE 仪表板演示(这只是用于演示目的)-->
        <!--
        <script src="{{asset('myadmin/dist/js/pages/dashboard.js')}}" type="text/javascript"></script>  
        -->
        <!-- AdminLTE 用于演示目的 -->
        <script src="{{asset('myadmin/dist/js/demo.js')}}" type="text/javascript"></script>   
        <!-- XDL-model-提示框 -->
        <script src="{{asset('myadmin/bootstrap/js/xdl-modal-alert-confirm.js')}}" type="text/javascript"></script> 
        @if(session("msg"))
            <script type="text/javascript">
                Modal.alert({msg: "{{session('msg')}}",title: ' 信息提示',btnok: '确定',btncl:'取消'});
            </script>
        @endif
        @yield('myscript')
    </body>
</html>