<?php
/**
 * Created by PhpStorm.
 * User: jackeychen
 * Date: 11/2/15
 * Time: 6:08 PM
 */

namespace Sucel\Common\Includes;

class ExceptionHandle {

    public static function handleException($exception) {
        // disable error capturing to avoid recursive errors
        restore_error_handler();
        restore_exception_handler();
        print_r($exception->getMessage());
        die();
    }
}