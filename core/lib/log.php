<?php
namespace core\lib;

date_default_timezone_set('PRC');

class log {

    static public function init(){
        $drive = 'file';
        self::log('Ph-papi Init');
        $class = "\core\lib\drive\log\\";
    }

    static public function log($message, $logFile = 'log.txt'){
    	$logPath = CORE.formatPath('/log/');
    	if ( !is_dir($logPath)){
    		mkdir($logPath, '0777', true);
    		P('mkdir S!');
    	}
    	$message = "[" . date('H:i:s @ Y-m-d') . "]: " . $message . "\r\n";
    	file_put_contents($logPath.$logFile, $message,  FILE_APPEND | LOCK_EX);
    }
}