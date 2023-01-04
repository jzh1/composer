<?php


namespace service;

use Predis\Client;

class RedisServices extends BaseServices
{
    public $redis;

    public function __construct()
    {
        $this->redis = new Client();
    }

    public function set($key,$value,$expireTTL='3000',$expireResolution='EX')
    {

        return $this->redis->set($key,$value,$expireResolution,$expireTTL);
    }

    public function get($key)
    {

        return $this->redis->get($key);
    }

}
