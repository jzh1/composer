<?php
require('vendor/autoload.php');

use NoahBuscher\Macaw\Macaw;
use service\RoleServices;

/*Macaw::get('/', function (){
    echo 'this is /';
});*/


// 后台路径 todo 暂时注释不验证
$backstage = 'admin——test';
// 用户管理
$user = $backstage.'/user/';
// 文章管理
$user = $backstage.'/article/';

// 验证路由
$role = new RoleServices();
$role->checkUrl($backstage);

/**
 *  用户
 */
// 登陆
Macaw::post('login', 'controller\LoginController@login');

/**
 *  模块
 */
// 获取所有模块
Macaw::get('modular/list', 'controller\ModularController@getList');
Macaw::get( $backstage.'/modular/all', 'controller\ModularController@getAll');
Macaw::post($backstage.'/modular/add', 'controller\ModularController@add');
Macaw::post($backstage.'/modular/edit', 'controller\ModularController@edit');





/**
 * ------------------------------------------------ 以下为测试路由 ------------------------------------------------
 */
// 测试
$index = 'index';
$admin = 'admin';
// 首页
Macaw::get($index.'/index', 'controller\IndexController@index');
// 闲言
Macaw::get($index.'/balderdash', 'controller\IndexController@balderdash');
// about me
Macaw::get($index.'/aboutMe', 'controller\IndexController@aboutMe');
Macaw::get('test', 'controller\TestController@test');
Macaw::get($index.'/title', 'controller\IndexController@title');


// 后端路由
Macaw::get($admin.'/index', 'controller\AdminIndexController@index');

// http 请求测试
Macaw::get('httpRequest', 'controller\TestController@httpRequest');
// 模版文件、数据库链接查询
Macaw::get('index', 'controller\IndexController@test');
// 获取用户列表
Macaw::get('getUserList', 'controller\IndexController@getUserList');
// 测试方法
Macaw::get('user', 'controller\UserController@test');

Macaw::dispatch();


