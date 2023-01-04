<?php

namespace controller;

use model\Modular;

class ModularController extends BaseController
{
    public $modularModel;

    public function __construct()
    {
        $this->modularModel = new Modular([]);
        parent::__construct();
    }

    public function add()
    {
        $params = $this->requestParams;
        $add = [
            'name'=>$params['name'],
            'mark'=>$params['mark'],
            'active'=>$params['active'],
            'created_at'=> date('Y-m-d H:i:s'),
        ];
        $returnData = $this->modularModel->insertData($add);
        if ($returnData->errorInfo()){
            $this->error($returnData->errorInfo(),$returnData->errorInfo()[2]);
        }

        $this->success('inset success');
    }

    public function edit()
    {
        $edit = [
            'name'=>$this->requestParams['name'],
            'mark'=>$this->requestParams['mark'],
            'active'=>$this->requestParams['active'],
            'updated_at'=> date('Y-m-d H:i:s'),
        ];

        $returnData = $this->modularModel->editById($edit,$this->requestParams['id']);
        if ($returnData->errorInfo()){
            $this->error($returnData->errorInfo(),$returnData->errorInfo()[2]);
        }

        $this->success('edit success');
    }

    public function getAll()
    {
        $Data = $this->modularModel->getAll();

        $this->success($Data);
    }

    // 获取用户列表
    public function getList()
    {
        $Data = $this->modularModel->getListByActivity();

        $this->success($Data);
    }
}
