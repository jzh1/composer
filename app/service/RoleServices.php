<?php


namespace service;

use controller\BaseController;

class RoleServices extends BaseServices
{

    public function checkUrl($urlKeyString)
    {
        $baseC = new BaseController();
        try {
            // all rout string
            $url    = $_SERVER['REQUEST_URI'];
            $urlArr = explode('/', $url);
            // all token string
            $authToke = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
            if ($authToke) {
                $allToken = explode('_', $authToke);
                $token    = $allToken[1] ?? '';
            }

            // 验证token
            if (in_array($urlKeyString, $urlArr)) {
                if (isset($token)) {
                    $getToke = $baseC->checkToken($token);
                    if ($getToke) {
                        return ;
                    }
                    throw new \Exception('toke error');
                } else {
                    throw new \Exception('toke error');
                }
            }
        } catch (\Exception $e) {
            $baseC->error('',$e->getMessage());
        }
    }

}
