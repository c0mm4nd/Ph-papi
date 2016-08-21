<?php
/**
 * Created by PhpStorm.
 * User: Command
 * Date: 2016/8/21
 * Time: 17:28
 */
namespace core\lib;
use core\lib\conf;

class model extends \PDO {
    public function __construct()
    {   
        $dbinfo = conf::all('database');

        $dsn = $dbinfo['DSN'];
        $username = $dbinfo['USERNAME'];
        $passwd = $dbinfo['PASSWORD'];
        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e){
            P($e->getMessage());
        }

    }
}