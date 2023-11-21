<?php

class Hirek_Model
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = get_db_connection();
    }

    public function hir_listaz()
    {
        $stmt = $this->dbh->prepare('SELECT h.id, cim, letrehozas_idopontja, bejelentkezes FROM hirek h INNER JOIN felhasznalok f ON h.felhasznalo_id = f.id');
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hir_lekerdez($id)
    {
        $stmt = $this->dbh->prepare('SELECT h.id, cim, tartalom, letrehozas_idopontja, bejelentkezes FROM hirek h INNER JOIN felhasznalok f ON h.felhasznalo_id = f.id WHERE h.id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function velemenyek_lekerdez_hirhez($hir_id)
    {
        $stmt = $this->dbh->prepare('SELECT v.id, tartalom, letrehozas_idopontja, bejelentkezes FROM velemenyek v INNER JOIN felhasznalok f ON v.felhasznalo_id = f.id WHERE v.hir_id = ?');
        $stmt->execute([$hir_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hir_hozzaad($data)
    {
        $stmt = $this->dbh->prepare('INSERT INTO hirek(cim, tartalom, felhasznalo_id, letrehozas_idopontja) VALUES (?,?,?,NOW())');
        $stmt->execute([
            $data['cim'],
            $data['tartalom'],
            $data['felhasznalo_id']
        ]);
    }

    public function velemeny_hozzaad($data)
    {
        $stmt = $this->dbh->prepare('INSERT INTO velemenyek(hir_id, felhasznalo_id, tartalom, letrehozas_idopontja) VALUES(?,?,?,NOW())');
        $stmt->execute([
            $data['hir_id'],
            $data['felhasznalo_id'],
            $data['tartalom'],
        ]);
    }
}

?>