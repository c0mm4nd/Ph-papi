<?php 
/*
 * 第三方模块列表 ,自动从文件夹拉取
 */
$moduleArray = scandir(CORE.'/module');
unset($moduleArray[0]);
unset($moduleArray[1]);
$moduleArray = array_values($moduleArray);
return $moduleArray;