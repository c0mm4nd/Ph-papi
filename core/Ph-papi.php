<?php
/**
 * Created by PhpStorm.
 * User: Command
 * Date: 2016/8/21
 * Time: 13:47
 */
namespace core;

class core {
    public static $classMap = array();

    static public function run(){
        $route = new \core\lib\route();
        P($route);
    }
    static public function load($class){
        // 自动加载类库
        if (isset($classMap[$class])) {
            return true;
        }else{
            //  $class = str_replace('\\', '/', $class);
            //  P($class);
            $file = $class.".php";
            // print $file;
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            }else{
                // print "???";
                return false;
            }
        }
    }
}
