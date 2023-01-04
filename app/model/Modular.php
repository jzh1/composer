<?php

namespace model;

class Modular extends BaseDao
{
    private $table = 'modular';

    /**
     * 获取所有模块信息
     *
     * @return array|bool
     */
    public function getAll()
    {
        return $this->select($this->table, '*');
    }

    /**
     * 获取 启用的 模块信息
     *
     * @return array|bool
     */
    public function getListByActivity()
    {
        return $this->select($this->table, '*',['active' => 1]);
    }

    /**
     * 添加
     *
     * @param $data
     * @return bool|\PDOStatement
     */
    public function insertData($data)
    {
        return $this->insert($this->table, $data);
    }

    /**
     * 修改
     *
     * @param $data
     * @param $id
     * @return bool|\PDOStatement
     */
    public function editById($data,$id){

        return $this->update($this->table, $data,['id' => $id]);
    }

}
