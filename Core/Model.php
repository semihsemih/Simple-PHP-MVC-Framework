<?php


namespace Core;

use PDO;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $host = 'localhost:3307';
            $dbname = 'mvc';
            $username = 'root';
            $password = 'secret';

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            } catch (\PDOException $error) {
                echo $error->getMessage();
            }
        }

        return $db;
    }
}