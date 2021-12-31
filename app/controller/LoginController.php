<?php

namespace controller;

use model\User;

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
            // todo 需要加
            $token = 'sfafsafsdffdfsfsf';
            $authType = 'user';
            $this->success(['token'=>$token,'authType'=>$authType],'login success');
        }

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
