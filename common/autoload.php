<?php
/**
 * Created by PhpStorm.
 * User: jackeychen
 * Date: 11/2/15
 * Time: 11:09 AM
 */

namespace Sucel\Common;

class AutoLoad {

    public static function autoload($class) {
        $parts = explode("\\", $class);

        if (count($parts) > 1 && strtolower($parts[0]) == 'sucel') {
            array_shift($parts);
            $className = ucfirst(array_pop($parts));
            array_walk($parts, function ($v) {
                return strtolower($v);
            });
            $classFile = SUCELIT_PATH.'/'. implode(DIRECTORY_SEPARATOR, $parts).'/'. $className.'.php';
            if (is_file($classFile)) require_once $classFile;
        }
    }
}

