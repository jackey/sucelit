<?php
/**
 * Created by PhpStorm.
 * User: jackeychen
 * Date: 11/2/15
 * Time: 4:11 PM
 */

namespace Sucel\Service\Dao\User;

use Sucel\Common\Includes\Database\CDao;

class UserDao extends CDao {

    public function tableName() {
        return 't_user';
    }

    public function primaryKey() {
        return 'Fid';
    }

    /**
     * @param string $class
     * @return \CActiveRecord
     */
    public static function dao($class = __CLASS__) {
        return self::model($class);
    }


}