<?php

require_once('config.php');

$GLOBALS['_pdo'] = false;

function get_pdo() {
    if ($GLOBALS['_pdo']) {
        return $GLOBALS['_pdo'];
    }
    try {
        $pdo = new PDO(
                    'mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE.';charset=utf8mb4',
                    MYSQL_USER, MYSQL_PASSWORD,
                    array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8mb4\' COLLATE \'utf8mb4_unicode_ci\';'
                    ));
        $GLOBALS['_pdo'] = $pdo;
    } catch (Exception $e) {
        http_response_code(500);
        die("Failed to connect database. Please contact the administrtor.");
    }
    return $pdo;
}


