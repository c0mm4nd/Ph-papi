<?php
// define("ROOT", realpath(' /'));
define('CORE', 'core');

define('APP', 'app');

define('DEBUG', true);

include CORE.'/common/function.php';
include CORE.'/Ph-papi.php';

\core\core::run();