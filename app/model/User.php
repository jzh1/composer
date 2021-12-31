<?php

namespace model;

class User extends BaseDao
{
    private $table = 'users';

    /**
     * 根据用户name 获取用户信息
     *
     * @param $userName
     * @return array|bool
     */
    public function getUserByName($userName)
    {
        return $this->get($this->table, '*', ['name' => $userName]);
    }

}
