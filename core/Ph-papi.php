<?php
namespace core;

define('ROOT', dirname(dirname(__FILE__)));
define('CORE', __DIR__);
define("APP", ROOT.DIRECTORY_SEPARATOR.APP_DIRNAME);

include CORE.'/common/function.php';

class core {
    public static $classMap = array();

    static public function run(){
        include_once realpath(ROOT."/vendor/autoload.php");
        // self::validDebug();
        spl_autoload_extensions(".php");
        spl_autoload_register(array("self","load"));
        $logger = new \core\lib\log;
        $logger::init();
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlClass = formatPath('/ctrl/'.$ctrlClass.'Ctrl');
        $ctrlClassFile = APP.$ctrlClass.'.php';
        $ctrlClassNS = "\\app".$ctrlClass;
        if (is_file($ctrlClassFile)){
            include $ctrlClassFile;
            $ctrl = new $ctrlClassNS;
            $ctrl->$action();
        }else{
            throw new \Exception("Ctrl :".$ctrlClass."Not found");
        }
    }

    /**
     * 自动加载类库
     */
    static public function load($class){
        if (isset($classMap[$class])) {
            return true;
        }else{
            $file = ROOT.DIRECTORY_SEPARATOR.formatPath($class.".php");
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
