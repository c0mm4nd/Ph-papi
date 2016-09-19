<?php 
namespace core\lib;

class view {
	static public $assign = array();
	static public function assign($name, $value){
		self::$assign[$name] = $value;
	}

	static public function display($text){
		$file = APP."/view/".$text;
		// print $file;
		// if (is_file($file)){
		// 	extract($this->assign);
		// 	include $file;
		// }else{
		// 	echo $text;
		// }
		\Twig_Autoloader::register();

		$loader = new \Twig_Loader_Filesystem(APP."/view");
		$twig = new \Twig_Environment($loader, array(
		    'cache' => APP.'/cache',
		));
		$template = $twig->loadTemplate($text);
		(self::$assign)?(self::$assign):Null;
		$template->display(self::$assign);
	}

	
}
