<?php
namespace controller;

use model\Article;
use model\Config;
use model\Modular;
use service\TokenServices;

class BaseController{

    protected $twig;
    protected $data = [];
    public $getParams = [];
    public $postParams = [];
    public $requestParams = [];
    // token
    public $tokenServices;
    // 前端风格
    public $style = 'layui';

    // 构造方法
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__).'/view');
        $this->twig = new \Twig\Environment($loader, [
            // 'cache' => '/path/to/compilation_cache',
        ]);

        $this->tokenServices = new TokenServices();

        $this->params();
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

    /**
     * 成功的调用方法
     * 适用与接口
     * @param $data
     * @param $message
     * @return void
     */
    public function success($data,$message = 'success')
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

    /**
     * 失败的调用方法
     * @param $data
     * @param $message
     * @return void
     */
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

    /**
     * 获取参数
     * get 和 post 参数组合
     * @return void
     */
    public function params(){
        $this->getParams = $_GET;
        $this->postParams = $_POST;
        $this->requestParams = array_merge($this->getParams,$this->postParams);
    }

    public function getUserIdByToken($token){

        return $this->tokenServices->getUserIdByToken($token);
    }

    public function setToken($key,$value){
        return $this->tokenServices->setToken($key,$value);
    }

    /**
     *  生成并且返回token
     *
     * @param $authType
     * @param $userName
     * @param $value
     * @param string $module
     * @return string token
     */
    public function getToken($authType,$userName,$value,$module = 'user:'){
        $key = $authType.'_'.$userName.'_'.time().rand(10000000,999999999);
        $keyMd5 = md5($key);
        $this->tokenServices->setToken($module.$keyMd5,$value);

        return $keyMd5;
    }

    /**
     * 验证token 是否存在
     *
     * @param $key
     * @param string $module
     * @return bool
     */
    public function checkToken($key,$module = 'user:'){

        return $this->tokenServices->checkToken($module.$key);
    }

    /**
     * 公共参数的string
     *
     * @param ...$data
     * @return void
     */
    public function getPublicParams(...$data){
        foreach ($data as $item){
            switch ($item){
                case 'article':
                    $articleObj = new Article();
                    $article = $articleObj->getAll();
                    $this->assign('article',$article);
                break;
                case 'head':
                    $headObj = new Config();
                    $head = $headObj->getAll();
                    $this->assign('head',$head);
                break;
                case 'modular':
                    $modularObject = new Modular();
                    $modular = $modularObject->getAll();
                    $this->assign('modular',$modular);
                    $this->assign('modular_left',12 - (count($modular) *2 ));
                break;
            }

        }
    }
}
