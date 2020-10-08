<?php

namespace Models;

use Components\Db;

/**
 * Class Product
 */
class Product {
    /**
     * Return Product list
     *
     * @return array
     */
    public static function getProductsList() {
        $db = Db::getConnection();

        $result = $db->query('SELECT name, date, price FROM products;');

        return $result->fetchAll();
    }

    /**
     * Return products list for ajax request
     *
     * @param array $params
     * @return array
     */
    public static function getSortProductsByCategory($params = []) {
        $db = Db::getConnection();

        $query = "SELECT name, date, price FROM products";

        if (isset($params['category_id'])) {
            $query .= " WHERE category={$params['category_id']}";
        }

        if (isset($params['sort'])) {
            switch ($params['sort']) {
                case "cheapest":
                    $query .= " ORDER BY price ASC;";
                    break;
                case "alphabetically":
                    $query .= " ORDER BY name ASC;";
                    break;
                case "newest":
                    $query .= " ORDER BY date DESC;";
                    break;
            }
        }

        $result = $db->query($query);

        return $result->fetchAll();
    }

}
