<?php

class User extends Controller
{

    function __construct()
    {
        /*
         * 避免子类的构造函数覆盖父类的构造函数
         */
        parent::__construct();
        /*
         * 其它自定义操作
         */
    }

    /**
     * 获取用户列表
     */
    function GetUserList($requestPayload)
    {
        //Medoo框架
        $list = $this->databaseMedoo->select('user', [
            'userName',
            'userAge',
            'userAddress',
        ]);

        //返回
        $data['status'] = 1;
        $data['message'] = '成功';
        $data['data'] = $list;
        return $data;
    }
}
