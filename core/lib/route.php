<?php
/**
 * Created by PhpStorm.
 * User: Command
 * Date: 2016/8/21
 * Time: 14:45
 */
namespace core\lib;
use \core\lib\conf;
class route{
    public $ctrl;
    public $action;
    public function __construct(){
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('/', trim($path, '/'));
            $count = count($pathArr);
            if (isset($pathArr[0])){ $this->ctrl = $pathArr[0];}else{ $this->ctrl  = 'index';}
            unset($pathArr[0]);
            if (isset($pathArr[1])){ $this->action = $pathArr[1];}else{$this->action  = conf::get('CTRL', 'route');}
            unset($pathArr[1]);
            // 多余部分URL处理
            $i=2;
            while($i < $count){
                if (isset($pathArr[$i+1])){
                    $_GET[$pathArr[$i]] = $pathArr[$i+1];
                }
                $i = $i+2;
            }
        }else{
            $this->ctrl = 'index';
            $this->action  = 'index';
        }
    }
}