<?php

namespace app\core;

class Db
{
    private static \PDO $db;

    public static function getDb(): \PDO
    {
        if (empty(self::$db)) {
            self::$db = new \PDO('mysql:host=localhost;dbname=db', 'root', '1234');
        }
        return self::$db;
    }
}