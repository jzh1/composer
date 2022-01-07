<?php


namespace service;


class TokenServices extends BaseServices
{

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

        return $this->redisServices->set($key, $value,3000);
    }

    public function getUserIdByToken($token)
    {

        return $this->redisServices->get($token);
    }

    public function generateToken($authType)
    {

    }

}
