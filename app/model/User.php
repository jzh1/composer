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


    /**
     * 获取 启用的用户信息
     *
     * @return array|bool
     */
    public function getListByActivity()
    {
        return $this->select($this->table, '*',['active' => 1]);
    }

}
