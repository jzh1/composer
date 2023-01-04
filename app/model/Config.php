<?php

namespace model;

class Config extends BaseDao
{
    private $table = 'config';

    /**
     * get all
     *
     * @param
     * @return array|bool
     */
    public function getAll()
    {
        $returnData = [];
        $data =  $this->select($this->table, '*');
        foreach ($data as $item){
            $returnData[$item['name']] = $item['value'];
        }

        return $returnData;
    }

}
