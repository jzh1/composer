<?php


namespace service;

use  service\RedisServices;

class TokenServices extends BaseServices
{
    public $redisServices;

    public function __construct()
    {
        $this->redisServices = new RedisServices();
    }

    public function checkToken($key)
    {
        $toke = $this->redisServices->get($key);
        if ($toke){
            return true;
        }

        return false;
    }

    public function setToken($key, $value)
    {

        return $this->redisServices->set($key, $value);
    }

    public function getUserIdByToken($token)
    {

        return $this->redisServices->get($token);
    }

    public function generateToken($type)
    {

    }

}
