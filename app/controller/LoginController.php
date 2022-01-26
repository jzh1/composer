<?php

namespace controller;

use model\User;
use JiaweiXS\WeApp\WeApp;

class LoginController extends BaseController
{
    /*public $userModel;

    public function __construct(User $_userModel)
    {
        parent::__construct();
        $this->userModel = $_userModel;
    }*/

    public function login()
    {
        $requestData = $this->requestParams;
        if (!isset($requestData['user'])){
            $this->error([],'user is null');
        }
        if (!isset($requestData['password'])){
            $this->error([],'password is null');
        }

        $userName=  $requestData['user'];
        $password=  $requestData['password'];

        $user = new User([]);
        $userData = $user->getUserByName($userName);
        if ($userData && isset($userData['password']) && $userData['password'] == md5($password)){

            $authType = 'user';
            $token = $this->getToken($authType,$userData['user']??'',$userData['id']??'');

            $this->success(['token'=>$token,'authType'=>$authType],'login success');
        }

        $this->error([],'login error');
    }

    public function appletLogin()
    {
        // 小程序授权码
        $secret = 'f18f83265e8eb3fc94651a6bfabaafb0';
        // 小程序ID
        $appid = 'wx8bbb78e953630e1a';
        // 收件人的opened
        $openid = 'oHJyK5RoB_ON-SM4dZRn5H-RU3ak';
        // 模版ID-备忘提醒模版
        //$template_id = '-tSZQ-s-RFjz3IftiADek6D-lwYq_JuHtMvSAlQe3ms';
        // 模版ID-日报提醒
        //$template_id = 'vRE-YooTPUqj04yv8j152YVoiPz9u0GOpOaLpRcKnps';
        // 模版ID-新日志提醒
        $template_id = '5cSvZieA-RcBJMlMB-pWAFJgcoGDq5s7s1je280iFDM';

        $requestData = $this->requestParams;
        if (!isset($requestData['code'])){
            $this->error([],'code is null');
        }

        // code
        $code = $requestData['code'];

        //创建一个小程序对象
        $weapp = new WeApp($appid,$secret,'./public/wx');
        //code 换取 session_key
        /*$sessionKey = $weapp->getSessionKey($code);
        if ($sessionKey){
            $sessionKeyArray = json_decode($sessionKey);
            $session_key = $sessionKeyArray->session_key;
            $openid = $sessionKeyArray->openid;
        }*/

        //发送模板消息
        //从‘小程序’获取一个‘模板消息’单例对象
        $templateMsg = $weapp->getTemplateMsg();
        $touser = $openid;
        $form_id = rand(100,900);
        $data = [
            /*'thing5' => [
                'value' => 'user notice',
            ],
            'time2' => [
                'value' => date('Y-m-d H:i:s'),
            ],*/
            // 新日志提醒
            'thing1' => [
                'value' => '江兆辉',
            ],
            'thing2' => [
                'value' => '对于未知应保持乐观和自信，对于已知应保持，谨慎和节制',
            ],
            'time3' => [
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
        $res_array = $templateMsg->sendSubscribe($touser,$template_id,$form_id,$data);

        $this->success($res_array,'success');

        $this->error([],'login error');
    }

    public function add()
    {
        $requestData = $this->requestParams;

    }

    // 获取用户列表
    public function getUserList()
    {
        $user = new User([]);
        $userData = $user->select('users', ['id','name']);

        $this->success($userData);
    }
}
