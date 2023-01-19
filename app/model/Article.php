<?php

namespace model;

class Article extends BaseDao
{
    private $table = 'article';

    /**
     * 获取所有模块信息
     *
     * @return array|bool
     */
    public function getForModularId($modularId = '')
    {
        if ($modularId){
            return $this->select($this->table, '*',['modular_id' => $modularId]);
        }

        return $this->select($this->table, '*');
    }

    /**
     * 获取 Balderdash 闲言信息
     *
     * @return array|bool
     */
    public function getBalderdashForModularId($modularId)
    {
        $returnData = [];

        $data = $this->select($this->table, '*',['modular_id' => $modularId]);
        foreach ($data as $item){
            $year = substr($item['created_at'],0,4);
            $item['md'] = toDateChineseForMD($item['created_at']);
            $returnData[$year][] = $item;
        }

        return $returnData;
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
