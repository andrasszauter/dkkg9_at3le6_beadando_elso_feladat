<?php

class Kilepes_Controller {
    public $baseName = 'kilepes';

    public function main(array $vars)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            kijelentkeztet();
            header('Location: ' . SITE_ROOT, true, 302);
            die();
        }
    }
}

?>