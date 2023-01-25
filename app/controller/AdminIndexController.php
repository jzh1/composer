<?php

namespace controller;

use model\Article;
use model\User;

class AdminIndexController extends BaseController
{

    public function index()
    {
        $user = new User();
        $userData = $user->select('users', '*');
        $this->assign('title', '这是index的标题');
        $this->assign('users', $userData);

        $this->getPublicParams('article','head','modular');

//        $this->display('index/index');
        $this->display($this->style.'/admin/index');
    }

    public function articleList()
    {
        $user = new User();
        $userData = $user->select('users', '*');
        $this->assign('title', '这是index的标题');
        $this->assign('users', $userData);

        $this->getPublicParams('article','head','modular');

//        $this->display('index/index');
        $this->display($this->style.'/admin/articleList');
    }

    public function articleListData()
    {
        $dataModel = new Article();
        $data = $dataModel->getForModularId();

        return $this->success($data);
    }

    public function title()
    {
        $user = new User([]);
        $userData = $user->select('users', '*');
        $this->assign('title', '这是index的标题');
        $this->assign('users', $userData);

        //$this->display('index/title');
        $this->display('layui/node_modules/layui/dist/index/index');
    }

    // 获取用户列表
    public function getUserList()
    {
        $user = new User([]);
        $userData = $user->select('users', ['id','name']);

        $this->success($userData);
    }
}
