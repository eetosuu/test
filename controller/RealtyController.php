<?php

namespace app\controller;

use app\core\Db;
use app\model\Realty;
use app\model\RealtyProvider;
use app\service\RealtyService;

class RealtyController
{
    public function view()
    {
        $realty = RealtyProvider::getRealtybyId($_GET['id']);
        return include __DIR__ . '/../view/realty.php';
    }

    public function edit()
    {
        if (!empty($_SESSION['user'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $realty = RealtyProvider::getRealtybyId($_GET['id']);
                return include __DIR__ . '/../view/edit-realty.php';
            } else {
                $addressArray = RealtyService::parsingAddress($_POST['address']);
                $realty = (new Realty())
                    ->setId($_GET['id'])
                    ->setName($_POST['name'])
                    ->setAddress($_POST['address'])
                    ->setPrice($_POST['price'])
                    ->setDescription($_POST['description'])
                    ->setIsRelevance($_POST['is_relevance'])
                    ->setApartment($addressArray['apartment'])
                    ->setHome($addressArray['home'])
                    ->setStreet($addressArray['street']);


                RealtyProvider::updateRealty($realty);
                header("Location: /realty/view?id={$_GET['id']}");
            }
        } else {
            header("Location: /");
        }
    }

    public function create()
    {
        if (!empty($_SESSION['user'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                return include __DIR__ . '/../view/create-realty.php';
            } else {
                $addressArray = RealtyService::parsingAddress($_POST['address']);
                $realty = (new Realty())
                    ->setName($_POST['name'])
                    ->setAddress($_POST['address'])
                    ->setPrice($_POST['price'])
                    ->setDescription($_POST['description'])
                    ->setIsRelevance($_POST['is_relevance'])
                    ->setPathImg('6')
                    ->setApartment($addressArray['apartment'])
                    ->setHome($addressArray['home'])
                    ->setStreet($addressArray['street']);
                $newRealty = RealtyProvider::createRealty($realty);
                header("Location: /realty/view?id={$newRealty->getId()}");
            }
        } else {
            header("Location: /");
        }
    }

    public function updateList()
    {
        $requestBody = json_decode(file_get_contents('php://input'), true);

        $numberHome = $requestBody['number_home'] ?? null;
        $sortRealty = $requestBody['sort'] ?? null;

        $result = RealtyProvider::getList($numberHome, $sortRealty);

        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

}