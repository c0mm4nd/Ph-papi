<?php
namespace core;

class core {
    public static $classMap = array();

    static public function run(){
        include_once "/vendor/autoload.php";
        self::validDebug();
        spl_autoload_register("self::load");
        \core\lib\log::init();
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlClass = APP.'/ctrl/'.$ctrlClass.'Ctrl';
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

    /**
     * 自动加载类库
     */
    static public function load($class){
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

    /**
     * DEBUG
     */
    static private function validDebug(){
        if (DEBUG) {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
            ini_set('display_error', 'On');
        } else {
            ini_set('display_error', 'Off');
        }
    }
}
