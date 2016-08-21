<?php
/**
 * Created by PhpStorm.
 * User: Command
 * Date: 2016/8/21
 * Time: 13:28
 */
define("ROOT", realpath(' /'));
define('CORE', ROOT.'/core');
define('APP', ROOT.'/app');

define('DEBUG', true);

if (DEBUG) {
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}

include CORE.'/common/function.php';

include CORE.'/Ph-papi.php';

spl_autoload_register("\core\core::load");

\core\core::run();