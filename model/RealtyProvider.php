<?php

namespace app\model;

use app\core\Db;
use app\service\RealtyService;

class RealtyProvider
{
    public static function getRealtybyId($id)
    {
        $db = Db::getDb();

        $statement = $db->prepare(
            'SELECT * FROM realty WHERE id = :id LIMIT 1'
        );
        $statement->execute([
                'id' => $id
            ]
        );
        return $statement->fetchObject(Realty::class) ?: null;
    }

    public static function updateRealty(Realty $realty): void
    {
        $db = Db::getDb();

        $statement = $db->prepare(
            'UPDATE realty SET name = :name, address = :address, price = :price, description = :description, is_relevance = :is_relevance, street = :street, apartment = :apartment, home = :home WHERE id = :id'
        );
        $statement->execute([
                'id' => $realty->getId(),
                'name' => $realty->getName(),
                'address' => $realty->getAddress(),
                'price' => $realty->getPrice(),
                'description' => $realty->getDescription(),
                'is_relevance' => $realty->isRelevance(),
                'street' => $realty->getStreet(),
                'apartment' => $realty->getApartment(),
                'home' => $realty->getHome()
            ]
        );
    }

    public static function createRealty(Realty $realty)
    {
        $db = Db::getDb();

        $statement = $db->prepare(
            'INSERT INTO realty (name, address, description, price, path_img, is_relevance, street, apartment, home) VALUES (:name, :address, :description, :price,:path_img, :is_relevance, :street, :apartment, :home)'
        );
        $statement->execute([
                'name' => $realty->getName(),
                'address' => $realty->getAddress(),
                'description' => $realty->getDescription(),
                'price' => $realty->getPrice(),
                'path_img' => '2',
                'is_relevance' => $realty->isRelevance(),
                'street' => $realty->getStreet(),
                'apartment' => $realty->getApartment(),
                'home' => $realty->getHome()
            ]
        );
        $newRealty = $db->query(
            'SELECT * FROM realty WHERE id = LAST_INSERT_ID()'
        );
        return $newRealty->fetchObject(Realty::class) ?: null;
    }

    public static function getList($numberHome = null, $sort = null)
    {
        $db = Db::getDb();

        $sql = 'SELECT * FROM realty';

        if (!empty($numberHome)) {
            $sql .= ' WHERE home = :numberHome';
        }

        if (empty($_SESSION['user'])) {
            if (!empty($numberHome)) {
                $sql .= ' AND is_relevance = 1';
            } else {
                $sql .= ' WHERE is_relevance = 1';
            }
        }

        if (!empty($sort)) {
            $sql .= ' ORDER BY price ' . (($sort == 'DESC') ? 'DESC' : 'ASC');
        } else {
            $sql .= ' ORDER BY price DESC';
        }

        $statement = $db->prepare(
            $sql
        );

        if (!empty($numberHome)) {
            $statement->bindParam('numberHome', $numberHome);
        }

        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, Realty::class) ?: [];
    }

}