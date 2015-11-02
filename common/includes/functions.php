<?php
/**
 * Created by PhpStorm.
 * User: jackeychen
 * Date: 11/2/15
 * Time: 10:46 AM
 */

function loadGlobalConfig() {
    global $globalConfig;

    $dbConfig = require_once SUCELIT_PATH.'/common/config/DB.php';
    $mongodbConfig = require_once SUCELIT_PATH.'/common/config/Mongodb.php';
    $redisConfig = require_once SUCELIT_PATH.'/common/config/Redis.php';
    $appConfig = require_once SUCELIT_PATH.'/common/config/App.php';

    $globalConfig['db'] = $dbConfig;
    $globalConfig['mongodb'] = $mongodbConfig;
    $globalConfig['redis'] = $redisConfig;
    $globalConfig['app'] = $appConfig;

    return $globalConfig;
}

function initSystemHandler() {
    set_exception_handler(array('Sucel\Common\Includes\ExceptionHandle', 'handleException'));
    set_error_handler(array('Sucel\Common\Includes\ErrorHandler', 'handleError'), error_reporting());
}

function dbConfig() {
    global $globalConfig;

    return $globalConfig['db'];
}

function redisConfig() {
    global $globalConfig;

    return $globalConfig['redis'];
}

function mongoDbConfig() {
    global $globalConfig;

    return $globalConfig['mongodb'];
}

function appConfig() {
    global $globalConfig;

    return $globalConfig['app'];
}

function isProduct() {
    return ENV == 'prod';
}

function getParam($values, $key, $default = '') {
    if (isset($values[$key])) return $values[$key];

    return $default;
}

function resourceURL($uri) {
    $projectName = PROJECT_NAME;
    $uri = $projectName.'/'. $uri;

    $appConfig = appConfig();
    $url = sprintf("http://%s/%s", $appConfig['static_server'], $uri);

    return $url;
}

function uploadURL($uri) {
    $appConfig = appConfig();
    return sprintf('http://%s/%s', $appConfig['upload_server'], $uri);
}

