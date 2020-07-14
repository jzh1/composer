<?php
require('vendor/autoload.php');

use NoahBuscher\Macaw\Macaw;

Macaw::get('/', function (){
    echo 'this is /';
});

// 测试
Macaw::get('test', 'controller\TestController@test');
Macaw::get('index', 'controller\IndexController@test');
Macaw::get('user', 'controller\UserController@test');

Macaw::get('page', 'Controllers\demo@page');
Macaw::get('view/(:num)', 'Controllers\demo@view');

Macaw::dispatch();
