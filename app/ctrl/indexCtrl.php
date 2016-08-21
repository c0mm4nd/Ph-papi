<?php
/**
 * Created by PhpStorm.
 * User: Command
 * Date: 2016/8/21
 * Time: 16:38
 */
namespace app\ctrl;

class indexCtrl{
    public function index(){
        print \core\lib\conf::get('CTRL','route');
        $model = new \core\lib\model();

    }
}
