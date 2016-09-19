<?php 

namespace core\module;

/**
* 
*/
class admin
{
	static public function __construct(){
		
	}
	static public function pannel(){
		$adminConf = \core\lib\conf::all('admin');
		$adminName = $adminConf['ADMIN_NAME'];
		$adminPasswd = $adminConf['ADMIN_PASSWD'];
		\core\lib\view::display("admin.html");
	}

	static public function view(){

	} 

}

