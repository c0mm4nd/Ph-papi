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
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlClass = MODULE.'/ctrl/'.$ctrlClass.'Ctrl';
        $ctrlClassFile = $ctrlClass.'.php';
        $ctrlClassNS = fileToNS($ctrlClassFile);
        if (is_file($ctrlClassFile)){
            include $ctrlClassFile;
            $ctrl = new $ctrlClassNS;
            $ctrl->$action();
        }else{
            throw new \Exception("Ctrl".$ctrlClass."Not found");
        }
    }
    
    static public function load($class){
        // 自动加载类库
        if (isset($classMap[$class])) {
            return true;
        }else{
            $file = $class.".php";
            if (is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }
    }
}
