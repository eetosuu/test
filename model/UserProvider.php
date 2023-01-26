<?php

namespace app\model;

use app\core\Db;

class UserProvider
{
    public static function getByUsernameAndPassword(string $username, string $password): ?User
    {
        $db = Db::getDb();
        $statement = $db->prepare(
            'SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1'
        );
        $statement->execute([
                'username' => $username,
                'password' => md5($password)
            ]
        );
        return $statement->fetchObject(User::class) ?: null;
    }
}