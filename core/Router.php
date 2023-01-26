<?php

namespace app\core;

use app\controller\MainController;
use app\exception\ErrorNotFound;

class Router
{
    public static function go()
    {
        try {
            if (empty($_SERVER['REQUEST_URI']) || $_SERVER['REQUEST_URI'] == '/') {
                return (new MainController())->index();
            }

            $requestUriExplode = explode('/', $_SERVER['REQUEST_URI']);

            if (empty($requestUriExplode[1]) || empty($requestUriExplode[2])) {
                throw new ErrorNotFound();
            }

            $controller = $requestUriExplode[1];
            $action = $requestUriExplode[2];

            if (str_contains($action, '?')) {
                $action = explode('?', $action)[0];
            }

            if (empty($action)) {
                throw new ErrorNotFound();
            }

            $controllerPath = "\\app\\controller\\" . $controller . 'controller';
            if (!class_exists($controllerPath)) {
                throw new ErrorNotFound();
            }

            if (!method_exists($controllerPath, $action)) {
                throw new ErrorNotFound();
            }
        } catch (ErrorNotFound $e) {
            return (new MainController())->error();
        }

        return (new $controllerPath())->$action();
    }
}