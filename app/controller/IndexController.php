<?php
namespace controller;

class IndexController extends BaseController {

    public function test()
    {
        $this->assign('var','这是var的值');
        $this->assign('title','这是index的标题');

        $this->assign('users',['user'=>'这是name','name2'=>'这是name','33333','4444']);


        $this->display('index');
    }
}
