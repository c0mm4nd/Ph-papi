<?php
/**
 * Created by PhpStorm.
 * User: Command
 * Date: 2016/8/21
 * Time: 14:45
 */
namespace core\lib;
class route{
    public $ctrl;
    public $action;
    public function __construct(){
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path = $_SERVER['REQUEST_URI'];
            $path_arr = explode('/', trim($path, '/'));
            P($path_arr);
            if (isset($path_arr[0])){ $this->ctrl = $path_arr[0];}else{ $this->ctrl  = 'index';}
            unset($path_arr[0]);
            if (isset($path_arr[1])){ $this->action = $path_arr[1];}else{$this->action  = 'index';}
            unset($path_arr[1]);
            // 多余部分URL处理
            $count = count($path_arr);
            $i=2;
            while ($i < $count){
                if (isset($path_arr[$i+1])){
                    $_GET[$path_arr[$i]] = $path_arr[$i+1];
                }
                $i = $i+2;
            }
            P($_GET);
        }else{
            $this->ctrl = 'index';
            $this->action  = 'index';
        }
    }
}