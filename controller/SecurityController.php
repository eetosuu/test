<?php

namespace app\controller;

use app\model\UserProvider;
use JetBrains\PhpStorm\NoReturn;

class SecurityController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return include __DIR__ . '/../view/signin.php';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username'], $_POST['password'])) {
                ['username' => $username, 'password' => $password] = $_POST;
                $user = UserProvider::getByUsernameAndPassword($username, $password);
                if (empty($user)) {
                    $error = 'Пользователь не существует';

                    return include __DIR__ . '/../view/signin.php';
                } else {
                    $_SESSION['user'] = $user;
                    header('Location: /');
                    die();
                }
            }
        }
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: /");
        die();
    }
}