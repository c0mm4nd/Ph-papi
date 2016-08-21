<?php
/**
 * Created by PhpStorm.
 * User: Command
 * Date: 2016/8/21
 * Time: 17:28
 */
namespace core\lib;
class model extends \PDO {
    public function __construct($dsn, $username, $passwd)
    {
        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e){
            P($e->getMessage());
        }

    }
}