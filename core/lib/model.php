<?php
/**
 * Created by PhpStorm.
 * User: Command
 * Date: 2016/8/21
 * Time: 17:28
 */
namespace core\lib;
use core\lib\conf;

class model extends \medoo {
    public function __construct()
    {   
        $dbConf = conf::all('database');
        $db = parent::__construct($dbConf);
        // $dsn = $dbinfo['DSN'];
        // $username = $dbinfo['USERNAME'];
        // $passwd = $dbinfo['PASSWORD'];
        // try{
        //     parent::__construct($dsn, $username, $passwd);
        // }catch (\PDOException $e){
        //     P($e->getMessage());
        // }
        return $db;

    }
}