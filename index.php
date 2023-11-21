<?php
define('SERVER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/feladat1/');
define('SITE_ROOT', 'http://localhost/feladat1/');

define('DB_CREDENTIALS', [
    'host'     => 'localhost',
    'dbname'   => 'feladat1',
    'username' => 'feladat1',
    'password' => 'feladat1'
]);

require_once(SERVER_ROOT . 'controllers/' . 'router.php');
?>