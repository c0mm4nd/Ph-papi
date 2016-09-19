<?php
namespace app\ctrl;

class indexCtrl extends \core\core
{
    public function index(){
        // print \core\lib\conf::get('CTRL','route');
        // $model = new $this->model();
        // var_dump($model);
        \core\lib\view::assign('data','data');
        \core\lib\view::display('index.html');
    }
}
