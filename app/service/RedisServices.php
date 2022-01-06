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

    public function set($key,$value)
    {

        return $this->redis->set($key,$value);
    }

    public function get($key)
    {

        return $this->redis->get($key);
    }

}
