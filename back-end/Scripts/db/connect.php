<?php 

namespace Apps;
class connect{
    public $con;
    function __construct() {
        try {
            $this->con = new \PDO($_ENV["DSN"].":host=".$_ENV["HOST"].";dbname=".$_ENV["DBNAME"].";user=".$_ENV["USERNAME"].";password=".$_ENV["PASSWORD"].";port=".$_ENV["PORT"]);
            $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            print_r($e->getMessage());
        }
    }
}