<?php

namespace service;


class BaseServices
{
    public $redisServices;

    public function __construct()
    {
        $this->redisServices = new RedisServices();
    }


}
