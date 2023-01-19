<?php

namespace controller;

use model\User;

class IndexController extends BaseController
{

    public function index()
    {
        $user = new User();
        $userData = $user->select('users', '*');
        $this->assign('title', '这是index的标题');
        $this->assign('users', $userData);

        $this->setWhere($this->requestParams);
        $this->getPublicParams('article','head','modular');

//        $this->display('index/index');
        $this->display($this->style.'/index/index');
    }

    public function test()
    {
        $user = new User([]);
        $userData = $user->select('users', '*');
        $this->assign('title', '这是index的标题');
        $this->assign('users', $userData);

        $this->getPublicParams('article','head','modular');

//        $this->display('index/index');
        $this->display($this->style.'/index/test');
    }

    public function title()
    {
        $user = new User([]);
        $userData = $user->select('users', '*');
        $this->assign('title', '这是index的标题');
        $this->assign('users', $userData);

        $this->success($userData);
        //$this->display('index/title');
        //$this->display('layui/node_modules/layui/dist/index/index');
    }

    // 获取用户列表
    public function getUserList()
    {
        $user = new User([]);
        $userData = $user->select('users', ['id','name']);

        $this->success($userData);
    }
}
