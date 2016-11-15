<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//网站后台路由配置
Route::get('/admin/login',"Admin\LoginController@login");   //加载后台登录页面
Route::post('/admin/dologin',"Admin\LoginController@doLogin");   //执行后台登录
Route::get('/admin/logout',"Admin\LoginController@logout");   //执行后台退出
Route::get('/admin/getcode',"Admin\LoginController@getCode"); //加载验证码


//后台用户模块路由组
Route::group(['prefix' => 'admin','middleware' => 'admin'], function () {
	
    Route::get('/',"Admin\IndexController@index");  //后台首页
    Route::get('/config/{status}',"Admin\IndexController@config");  //后台首页
    
    Route::resource('users','Admin\UserController');   //后台用户管理
    Route::resource('admin','Admin\AdminController');   //后台管理员管理
    Route::resource('msg','Admin\MsgController');   //后台站内信管理

    Route::resource('order','Admin\OrderController');	//后台订单管理
    Route::resource('orderdetail','Admin\OrderDetailController');	//后台订单详情管理
	Route::get('order/orderdetail/{id}','Admin\OrderController@orderdetail');	//查看订单信息详情

    Route::resource('sect','Admin\SectController');		//后台商品版块管理
    Route::get('sect/display/{id}','Admin\SectController@display');	//后台商品版块显示与隐藏
    Route::get('sect/good/{id}','Admin\SectController@goodShow'); //显示板块下商品
    Route::post('sect/good/{id}','Admin\SectController@goodAdd'); //添加板块下商品

    Route::resource('good','Admin\GoodController');     //后台商品管理
    Route::get('good/ajax/{id}','Admin\GoodController@ajax');		//处理 Ajax 请求，获取商品分类
    Route::get('good/detail/{id}','Admin\GoodController@detailCreate');		//加载添加商品详情页
    Route::post('good/detail/{id}','Admin\GoodController@detailStore');		//添加商品详情
    Route::get('good/detail/ajax/{id}','Admin\GoodController@detailAjax');		//处理 Ajax 请求，获取商品详情
    Route::get('good/detail/display/{id}','Admin\GoodController@onSale');		//执行商品下架的操作
    Route::get('good/detail/show/{id}','Admin\GoodController@detailShow');		//加载商品详细信息修改页
    Route::post('good/update/detail','Admin\GoodController@detailUpdate');		//执行商品详细信息修改的操作
    Route::get('good/detail/delete/{id}','Admin\GoodController@detailDelete');		//执行商品详细信息修改的操作
    Route::get('good/picture/ajax/{id}','Admin\GoodController@pictureAjax');        //处理 Ajax 请求，获取商品图片
    Route::post('good/uploads','Admin\GoodController@detailUploads');		//处理 Ajax 请求，获取商品图片

    Route::resource('gtype','Admin\GtypeController');		//后台商品分类管理
    Route::get('gtype/child','Admin\GtypeController@createChild');	//后台商品分类添加子类页
    Route::post('gtype/child','Admin\GtypeController@storeChild');	//后台商品分类执行添加子类
    Route::get('gtype/ajax/{id}','Admin\GtypeController@ajax');		//处理 Ajax 请求

    Route::resource('brand','Admin\BrandController');		//后台商品品牌管理

    Route::resource('banner','Admin\BannerController');		//后台banner管理
    Route::get('banner/display/{id}','Admin\BannerController@display');	//前台banner显示与隐藏

});



Route::group(['middleware'=>'old'],function(){
//网站前台路由配置
Route::get('/',"Home\IndexController@index");  //前台首页
Route::get('/home/ajax',"Home\IndexController@newsAjax");  //前台新品速递 Ajax 处理
Route::get('/home/search/ajax',"Home\IndexController@searchAjax");  //搜索 Ajax 处理
Route::get('/home/typeBar/ajax',"Home\IndexController@typeBarAjax");  //类别导航 Ajax 处理
Route::get('/shop/getcartnum',"Home\IndexController@getcartnum");   //获取购物车商品数量
Route::get('/shop/getshopcart',"Home\IndexController@getshopcart");   //获取购物车商品
Route::get('/suggest/{search}',"Home\IndexController@suggest");   //提示搜索内容
Route::get('/text/module/index/id/{md}',"Home\IndexController@placeholder");   //提示搜索内容
Route::get('/shop/getbuyfreeinfo',"Home\IndexController@getbuyfreeinfo");   //提示搜索内容

Route::post('/home/dologin',"Home\StageController@doLogin");   //执行前台登录
Route::resource('/home/losePass',"Home\LosePassController");   //加载前台找回密码页
Route::get('/home/loseAjax/{email}',"Home\StageController@isExist");   //判断邮箱是否存在
Route::get('/home/dologout',"Home\StageController@dologout");   //执行前台退出
Route::get('/home/getcode',"Home\StageController@getCode"); //加载验证码

Route::post('/home/emailRegister',"Home\StageController@doEmailRegister");   //执行前台注册
Route::get('/home/checkEmail/{email}',"Home\StageController@doCheckEmail");    //注册时邮箱验证
Route::get('/home/checkName/{name}',"Home\StageController@doCheckName");    //注册时用户名验证

Route::get('/home/good/list/{type}','Home\GoodController@goodlist');   //商品列表
Route::get('/home/good/list/{type}/brand/{brand}','Home\GoodController@brandSearch');   //按品牌搜索商品
Route::get('/home/good/list/{type}/price','Home\GoodController@priceOrder');   //商品列表价格排序
Route::get('/home/good/list/{type}/sales','Home\GoodController@salesOrder');   //商品列表价格排序
Route::get('/home/good/rank','Home\GoodController@getRank');   //获取商品排行

Route::get('/home/good/detail/{id}',"Home\GoodController@detail");  //商品详情
Route::get('/home/good/detail/ajax/{id}',"Home\GoodController@detailAjax");  //处理 Ajax 查询
Route::get('/home/good/fav/ajax/{id}',"Home\GoodController@checkFav");    //Ajax 查询是否收藏商品
Route::get('/home/good/fav/{id}',"Home\GoodController@favourite");    //Ajax 查询是否收藏商品



//前台模块路由组
Route::group(['prefix' => 'home','middleware' => 'login'], function () {

    Route::get('/address',"Home\AddController@index");  //查看收货地址
    Route::post('/insertAdd',"Home\AddController@store");  //执行添加收货地址
    Route::get('/delAdd/{id}',"Home\AddController@delAdd");  //执行删除收货地址
    Route::get('/getAdd/{id}',"Home\AddController@getAdd");  //获取收货地址信息
    Route::post('/editAdd',"Home\AddController@editAdd");  //执行修改收货地址信息
    Route::get('/address/{upid}',"Home\AddController@find");    //加载城市级联信息
    
    Route::resource('/myfavourite','Home\FavController');    //查看我的喜欢
    Route::resource('/message','Home\MsgController');       //站内信管理
    Route::get('/read/{id}','Home\MsgController@read');       //改变站内信状态为已读
    Route::get('/noread/{id}','Home\MsgController@noread');       //改变站内信状态为未读
    Route::get('/delMsg/{id}','Home\MsgController@delMsg');       //删除站内信
    Route::get('/delMsgDetail/{id}','Home\MsgController@delMsgDetail');
    Route::get('/notice/{id}','Home\MsgController@notice');
    
    Route::resource('/userInfo',"Home\UserInfoController"); //个人信息展示页
    Route::get('/editNick/{nick}',"Home\UserInfoController@editNick"); //修改昵称
    Route::get('/checkPass/{pass}',"Home\UserInfoController@checkPass"); //检查密码是否输入正确
    
    Route::resource('/changeInfo',"Home\ChangeInfoController"); //修改个人信息展示页
    Route::resource('/changeEmail',"Home\ChangeEmailController"); //修改邮箱

    Route::resource('/userPhoto',"Home\UserPhotoController"); //修改头像页
    
	Route::resource('myorder','Home\OrderController'); //我的订单
	Route::get('cart/del/{id}','Home\CartController@destroy'); //删除购物车商品
	Route::get('cart/del1','Home\CartController@del'); //删除所有购物车商品
	Route::get('order/shopcar','Home\CartController@index'); //我的购物车
	Route::post('order/addcar/{id}','Home\CartController@store'); //详情页添加购物车
	Route::get('order/addto/{id}','Home\CartController@addto'); //购物车中改变购买数量
	Route::get('order/addstore','Home\OrdertController@addstore'); //下单页添加收货地址
	Route::post('order/balance','Home\CartController@balance'); //去结算
	Route::get('order/shopcar/ordersucc/{id}','Home\CartController@ordersucc'); //付款页
});

});