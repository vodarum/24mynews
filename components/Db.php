<?php
class Db
{
    public static function getConnection()
    {
        $parametrsPath = ROOT . '/components/config/db_parametrs.php';
        $parametrs = require($parametrsPath);
        $dsn = "mysql:host={$parametrs['host']};dbname={$parametrs['dbname']}";
        $db = new PDO($dsn, $parametrs['user'], $parametrs['password']);
        return $db;
    }
}