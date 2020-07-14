<?php
namespace model;

use Medoo\Medoo;

class BaseDao extends Medoo{

    public function __construct(array $options)
    {
        $options=[
            'database_type' => 'mysql',
            'database_name' => 'erp',
            'prefix' => 'erp_',
            'server' => 'localhost',
            'username' => 'root',
            'password' => 'Admin.123456'
        ];

        parent::__construct($options);
    }

}
