<?php

namespace app\controller;

use app\core\Db;
use app\model\RealtyProvider;

class MainController
{
    public function index()
    {
        $realtyAll = RealtyProvider::getList();

        include __DIR__ . '/../view/main.php';
    }

    public function error($message = 'Not found')
    {
        return $message;
    }

    public function getUsers()
    {
        $db = Db::getDb();

        $stmt = $db->query("SELECT * FROM user");
        while ($row = $stmt->fetch()) {
            echo '<pre>';
            print_r($row);
        }
        die;
    }
}