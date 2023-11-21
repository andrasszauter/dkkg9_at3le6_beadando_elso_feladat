<?php

$dbh = null;

function get_db_connection() {
    global $dbh;

    if (!$dbh) {
        $conn = 'mysql:host=' . DB_CREDENTIALS['host'] . ';dbname=' . DB_CREDENTIALS['dbname'];
        $dbh = new PDO($conn, DB_CREDENTIALS['username'], DB_CREDENTIALS['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    }

    return $dbh;
}

?>