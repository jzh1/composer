<?php
namespace controller;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

class TestController{

    public function test()
    {
        return [11,122,222,22];
    }

    public function httpRequest()
    {
        // 需要整体封装下请求
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://httpbin.org',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $url = 'http://jzh.composer.test/getUserList';
        $data['json'] = [];
        $data['headers'] = [];

        // $response = $client->get($url);
        $response = $client->request('GET', $url, $data);

        $body = json_decode($response->getBody()->getContents(), true);

        echo $body;
    }
}
