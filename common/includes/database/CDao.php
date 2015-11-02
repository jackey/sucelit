<?php
/**
 * Created by PhpStorm.
 * User: jackeychen
 * Date: 11/2/15
 * Time: 3:44 PM
 */

namespace Sucel\Common\Includes\Database;

class CDao extends \CActiveRecord{

    static $_dbConnections;
    static $_dbConfig;

    public function __construct($scenario='insert') {
        parent::__construct($scenario);

        if (empty(CDao::$_dbConfig)) {
            CDao::$_dbConfig = dbConfig();
        }
    }

    public function _selectServer($dbConfig) {
        $useSlave = !empty($dbConfig['slaves']);

        if (!$useSlave) {
            $slaves = array(
                $dbConfig['master']
            );
        }
        else $slaves = $dbConfig['slaves'];

        // TODO:: Slave 选择算法
        $slave = $slaves[0]; // 暂时选择第一个

        if (empty($slave['charset'])) $slave['charset'] = getParam($dbConfig, 'charset', 'utf8mb4');
        if (empty($slave['password'])) $slave['password'] = getParam($dbConfig, 'password');
        if (empty($slave['user'])) $slave['user'] = getParam($dbConfig, 'user');
        if (empty($slave['port'])) $slave['port'] = getParam($dbConfig, 'port');

        return $slave;

    }

    public function getDbConnection() {
        $tableName = $this->tableName();
        $dbConfig = CDao::$_dbConfig;

        $tableConfig = getParam($dbConfig['tables'], $tableName);
        if (empty($tableConfig)) throw new \CDbException("表 {$tableName} 没有配置 (参考common/config/DB.php)");

        if (empty(CDao::$_dbConnections[$tableName])) {
            $dbName = getParam($tableConfig, 'db');
            $dbServer = $this->_selectServer($dbConfig['connection']);

            $dsn = "mysql:dbname={$dbName};host=".$dbServer['host'];
            $conn = new \CDbConnection($dsn, $dbServer['user'], $dbServer['password']);
            CDao::$_dbConnections[$tableName] = $conn;
        }

        return CDao::$_dbConnections[$tableName];
    }
}