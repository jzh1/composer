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
    public function success($data,$message)
    {
        header('Content-Type:application/json; charset=utf-8');

        $returnData['code'] = 200;
        $returnData['message'] = $message;
        $returnData['data'] = $data;
        if (is_array($returnData)){
            echo  json_encode($returnData,JSON_UNESCAPED_UNICODE);
            die();
        }

        echo  'error';die();
    }

    // 失败的调用方法
    public function error($data,$message)
    {
        header('Content-Type:application/json; charset=utf-8');
        $returnData['code'] = 400;
        $returnData['message'] = $message;
        $returnData['data'] = $data;
        if (is_array($returnData)){
            echo  json_encode($returnData,JSON_UNESCAPED_UNICODE);
            die();
        }

        echo 'error';
        die();
    }
}
