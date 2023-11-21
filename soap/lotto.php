<?php

define('DB_CREDENTIALS', [
    'host'     => 'localhost',
    'dbname'   => 'feladat1',
    'username' => 'feladat1',
    'password' => 'feladat1'
]);

class Nyeremeny {
    /**
     * @var integer
     */
    public $talalat;

    /**
     * @var integer
     */
    public $darab;

    /**
     * @var double
     */
    public $ertek;
}

class Huzott {
    /**
     * @var integer
     */
    public $szam;
}

class Huzas {
    /**
     * @var integer
     */
    public $ev;

    /**
     * @var integer
     */
    public $het;

    /**
     * @var Nyeremeny[]
     */
    public $nyeremenyek;

    /**
     * @var Huzott[]
     */
    public $huzottak;

    /**
     * @var integer
     */
    public $hibakod;

    /**
     * @var string
     */
    public $uzenet;
}

class Huzasok {
    /**
     * @param integer $ev
     * @param integer $het
     * @return Huzas
     */
    public function getHuzas($ev, $het) {
        $eredmeny = [
            "ev" => 0,
            "het" => 0,
            "nyeremenyek" => [],
            "huzottak" => [],
            "hibakod" => 0,
            "uzenet" => "",
        ];

        try {
            $conn = 'mysql:host=' . DB_CREDENTIALS['host'] . ';dbname=' . DB_CREDENTIALS['dbname'];
            $dbh = new PDO($conn, DB_CREDENTIALS['username'], DB_CREDENTIALS['password'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

            $eredmeny["ev"] = $ev;
            $eredmeny["het"] = $het;

            $stmt = $dbh->prepare('SELECT id FROM huzas WHERE ev = ? AND het = ?');
            $stmt->execute([$ev, $het]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $huzas_id = $result['id'];

            $stmt = $dbh->prepare('SELECT talalat, darab, ertek FROM nyeremeny WHERE huzasid = ? ORDER BY talalat');
            $stmt->execute([$huzas_id]);
            $eredmeny["nyeremenyek"] = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt = $dbh->prepare('SELECT szam FROM huzott WHERE huzasid = ? ORDER BY szam');
            $stmt->execute([$huzas_id]);
            $eredmeny["huzottak"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            $eredmeny["hibakod"] = 1;
            $eredmeny["uzenet"] = $e->getMessage();
        }

        return $eredmeny;
    }
}
?>