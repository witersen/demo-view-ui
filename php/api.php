<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('BASE_PATH', __DIR__);

date_default_timezone_set('PRC');

require_once BASE_PATH . '/app/core/controller.class.php';

/**
 * token
 */
$GlobalToken = isset($_SERVER['HTTP_TOKEN']) ? $_SERVER['HTTP_TOKEN'] : '';
define('GlobalToken', $GlobalToken);

/**
 * 控制器
 */
$controller_perifx = isset($_GET['c']) ? $_GET['c'] : ''; //控制器前缀
$controller_name = $controller_perifx . '.class'; //控制器名称
$controller_path = BASE_PATH . '/app/controller/' . $controller_name . '.php'; //控制器路径

/**
 * 方法
 */
$GlobalAction = isset($_GET['a']) ? $_GET['a'] : '';
define('GlobalAction', $GlobalAction);

/**
 * 请求参数即Request Payload
 * Content-Type: application/json
 */
$requestPayload = file_get_contents("php://input");
$requestPayload = !empty($requestPayload) ? json_decode($requestPayload, true) : array();

/**
 * 检查控制器和方法是否存在并实例化
 */
if (file_exists($controller_path)) {
    $controller = new $controller_perifx();
    if (is_callable(array($controller, $GlobalAction))) {
        //业务
        echo json_encode($controller->$GlobalAction($requestPayload));
    }
}
