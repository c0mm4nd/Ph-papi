<?php
/**
 * Created by PhpStorm.
 * User: Command
 * Date: 2016/8/21
 * Time: 13:36
 */
function P($var) {
    if  (is_bool($var)){
        var_dump($var);
    }elseif (is_null($var)){
        var_dump(NULL);
    } else {
        echo print_r($var, true);
    }
}

