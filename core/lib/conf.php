<?php
namespace core\lib;

class conf {
    static public $conf = array();
    static public function get($confItemName, $confFile){
        /**
         * 
         */
        if(isset(self::$conf[$confFile])){
            return self::$conf[$confFile][$confItemName];
        }else{
            $path = CORE.formatPath("/config/".$confFile.".php");
            if (is_file($path)){
                $conf = include $path;
                if (isset($conf[$confItemName])){
                    self::$conf[$confFile] = $conf;
                    return $conf[$confItemName];
                }else{
                    throw new \Exception('No This Item in Config'.$confItemName);
                }
            }else{
                throw new \Exception('Cannot find Config File : '.$confFile);
            }
        }
    }
    static public function all($confFile){
        if(isset(self::$conf[$confFile])){
            return self::$conf[$confFile][$confItemName];
        }else{
            $path = CORE.formatPath("/config/".$confFile.".php");
            if (is_file($path)){
                $conf = include $path;
                self::$conf[$confFile] = $conf;
                return $conf;
            }else{
                throw new \Exception('Cannot find Config File : '.$confFile);
            }
        }
    }
}