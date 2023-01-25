<?php

namespace controller;

use model\Article;
use model\User;

class IndexController extends BaseController
{

    /**
     * 首页，模块跳转的页面数据
     *
     * @return void
     */
    public function index()
    {
        $this->setWhere($this->requestParams);
        $this->getPublicParams('article','head','modular');

//        $this->display('index/index');
        $this->display($this->style.'/index/index');
    }

    /**
     * 闲言
     *
     * @return void
     */
    public function balderdash()
    {
        $this->setWhere($this->requestParams);
        $this->getPublicParams('balderdash','head','modular');

        $this->display($this->style.'/index/balderdash');
    }

    /**
     * 关于我
     *
     * @return void
     */
    public function aboutMe()
    {
        $this->setWhere($this->requestParams);
        $this->getPublicParams('article','head','modular');

        $this->display($this->style.'/index/aboutMe');
    }

    /**
     * 文章
     *
     * @return void
     */
    public function article()
    {
        $params = $this->requestParams;
        if (!isset($params['id'])){

            return;
        }

        $this->getPublicParams('article','head','modular');

        $article = new Article();
        $articleInfo = $article->getForId($params['id']);
        //$articleInfo['content'] = substr($articleInfo['content'],2,strlen($articleInfo['content'])-1);
        // dd($articleInfo['content']);
        $this->assign('articleInfo', $articleInfo);

        $this->display($this->style.'/index/article');
    }

    /**
     * 单纯的测试页面
     *
     * @return void
     */
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
