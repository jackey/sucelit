<?php
/**
 * Created by PhpStorm.
 * User: jackeychen
 * Date: 11/2/15
 * Time: 10:46 AM
 */

// 表配置
$tables = array(
    't_user' => array('db' => 'sucelit_db','mk' => ''),
);

$config = array();

// 正式数据库
if (isProduct()) {
    $connection = array(
        'driver' => 'mysql',
        'user' => 'root',
        'password' => 'admin',
        'charset' => 'utf8mb4',
        'master' => array(
            'host' => '127.0.0.1',
        ),
        'slaves' => array(
            array(
                'host' => '127.0.0.1',
                'user' => 'root',
                'password' => 'admin',
                'charset' => 'utf8mb4'
            ),
        ),
        'tables' => $tables
    );
    $config = array(
        'connection' => $connection,
        'tables' => $tables
    );
}
// 测试数据库
else {
    $connection = array(
        'driver' => 'mysql',
        'user' => 'root',
        'password' => 'admin',
        'charset' => 'utf8mb4',
        'port' => '3360',
        'master' => array(
            'host' => '127.0.0.1',
        ),
        'slaves' => array(
            array(
                'host' => '127.0.0.1',
                'user' => 'root',
                'password' => 'admin',
                'port' => '3360',
                'charset' => 'utf8mb4'
            ),
        ),
        'tables' => $tables
    );
    $config = array(
        'connection' => $connection,
        'tables' => $tables
    );
}

return $config;