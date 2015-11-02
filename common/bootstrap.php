<?php

require_once SUCELIT_PATH.'/common/includes/functions.php';
require_once SUCELIT_PATH.'/common/autoload.php';

define('YII_ENABLE_EXCEPTION_HANDLER', FALSE);
define('YII_ENABLE_ERROR_HANDLER', FALSE);

// 注册类自动加载类
// common 自动加载
spl_autoload_register(array('Sucel\Common\AutoLoad', 'autoload'), true, false);

// 加载配置
loadGlobalConfig();

// 设置异常处理
initSystemHandler();

