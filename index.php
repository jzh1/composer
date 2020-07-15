<?php
require('vendor/autoload.php');

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', function (){
    echo 'this is /';
});

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

Macaw::get('page', 'Controllers\demo@page');
Macaw::get('view/(:num)', 'Controllers\demo@view');

Macaw::dispatch();
