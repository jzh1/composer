<?php
namespace controller;

use model\User;

class IndexController extends BaseController {

    public function test()
    {
        $user = new User([]);
        $userData = $user->select('users','*');

        $this->assign('var','这是var的值');
        $this->assign('title','这是index的标题');

        $this->assign('users',$userData);


        $this->display('index');
    }
}
