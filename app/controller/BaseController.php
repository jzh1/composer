<?php
namespace controller;

class BaseController{

    protected $twig;
    protected $data = [];

    // 构造方法
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__).'/view');
        $this->twig = new \Twig\Environment($loader, [
            // 'cache' => '/path/to/compilation_cache',
        ]);
    }

    // 模版赋值
    public function assign($var,$value = null)
    {
        if (is_array($var)){
            $this->data = array_merge($this->data,$var);
        }else{
            $this->data[$var] = $value;
        }
    }

    // 模版关联
    public function display($template)
    {
        echo $this->twig->render($template.'.html', $this->data);
    }

    // 成功的调用方法
    public function success()
    {
        echo 'success';
    }

    // 失败的调用方法
    public function error()
    {
        echo 'error';
    }
}
