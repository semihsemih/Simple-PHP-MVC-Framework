<?php


namespace Core;

use PDO;
use App\Config;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';

        if ($db === null) {
            try {
                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
            } catch (\PDOException $error) {
                echo $error->getMessage();
            }
        }

        return $db;
    }
}