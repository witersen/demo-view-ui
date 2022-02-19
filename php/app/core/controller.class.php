<?php

/*
 * 控制器基类，所有的控制器都要继承此类
 */

//require model
require_once BASE_PATH . '/app/model/connModel.class.php';

//require controller
require_once BASE_PATH . '/app/controller/user.class.php';

//require function
require_once BASE_PATH . '/app/function/public.function.php';

//require extension

class Controller
{

    public $databaseMedoo;
    public $thisUserName;
    public $thisUserId;
    public $thisResidentId;

    function __construct()
    {
        //数据库连接
        $this->databaseMedoo = (new connModel())->GetConn();
    }
}
