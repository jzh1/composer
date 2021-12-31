<?php
require('vendor/autoload.php');

use NoahBuscher\Macaw\Macaw;

/*Macaw::get('/', function (){
    echo 'this is /';
});*/


// 后台路径
$backstage = 'admin/';
// 用户管理
$user = $backstage.'user/';
// 文章管理
$user = $backstage.'user/';


Macaw::post('login', 'controller\LoginController@login');

// 测试
Macaw::get('test', 'controller\TestController@test');
// http 请求测试
Macaw::get('httpRequest', 'controller\TestController@httpRequest');
// 模版文件、数据库链接查询
Macaw::get('index', 'controller\IndexController@test');
// 获取用户列表
Macaw::get('getUserList', 'controller\IndexController@getUserList');
// 测试方法
Macaw::get('user', 'controller\UserController@test');

Macaw::dispatch();


