<?php

namespace Models;

use Components\Db;

/**
 * Class Category
 */
class Category {
    /**
     * Return categories
     * @return array
     */
    public static function getCategoriesList () {
        $db = Db::getConnection();

        $result = $db->query(
            'SELECT c.id, c.name, count(*) AS count
                      FROM categories AS c
                      INNER JOIN products AS p ON p.category = c.id
                      GROUP BY p.category;');

        return $result->fetchAll();
    }
}
