<?php
/**
 * Created by PhpStorm.
 * User: jackeychen
 * Date: 11/2/15
 * Time: 10:29 AM
 */

use Sucel\Service\Dao\User\UserDao;

class IndexController extends WxController {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionError() {
        print 'error';
    }
}