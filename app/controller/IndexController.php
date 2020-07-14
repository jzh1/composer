<?php
namespace controller;

class IndexController extends BaseController {

    public function test()
    {
        $this->assign('var','这是var的值');
        $this->assign('data','这是data的值');
        $this->assign('test','这是test的值');

        $this->display('index');
    }
}
