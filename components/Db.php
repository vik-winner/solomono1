<?php

namespace Components;

use PDO;

/**
 * Class Db
 */
class Db {
    /**
     * Set connection to database
     * @return PDO
     */
    public static function getConnection() {

        $dsn = "mysql:host=" . DB_SETTINGS['host'] . ";dbname=" . DB_SETTINGS['dbname'];
        $db = new PDO($dsn, DB_SETTINGS['user'], DB_SETTINGS['password']);

        return $db;
    }
}
