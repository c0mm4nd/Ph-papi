<?php 
namespace core\lib;
use \core\lib\conf;
/**
* module
*/
class module{
	
	static public $list;
	static function getList(){
		// 加载module
		// 返回module清单给route
		self::$list = \core\lib\conf::all('module');
		return self::$list;
	}

    static public function initModuleRoute($moduleName){
    	if (@file_exists(CORE.formatPath('/module/'.$moduleName.'/route.php'))){
        	include_once(CORE.formatPath('/module/'.$moduleName.'/route.php')); 
        }
    }

    static public function initModuleModel($moduleName){
    	if (@file_exists(CORE.formatPath('/module/'.$moduleName.'/model.php'))){
        	include_once(CORE.formatPath('/module/'.$moduleName.'/model.php')); 
        }
    }
}

