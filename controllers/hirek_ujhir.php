<?php

class Hirek_Ujhir_Controller {
    private $hirek_model;
    public $baseName = 'hirek_ujhir';

    public function __construct()
    {
        $this->hirek_model = new Hirek_Model();
    }

    public function main(array $vars)
    {
        if (!bejelentkezve()) {
            header('Location: ' . SITE_ROOT . 'belepes', true, 302);
            die();
        }

        $view = new View_Loader($this->baseName."_main");
        $validation_errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validation_errors = $this->validate();

            if (empty($validation_errors)) {
                $this->hirek_model->hir_hozzaad([
                    'cim'            => $_POST['cim'],
                    'tartalom'       => $_POST['tartalom'],
                    'felhasznalo_id' => felhasznalo_id()
                ]);
                header('Location: ' . SITE_ROOT . 'hirek', true, 302);
                die();
            }
        }

        $view->assign('validation_errors', $validation_errors);
    }

    public function validate()
    {
        $validation_errors = [];

        $cim = $_POST['cim'] ?? '';

        if (empty($cim)) {
            $validation_errors['cim'] = 'A cím megadása kötelező.';
        } else if (mb_strlen($cim) > 45) {
            $validation_errors['cim'] = 'A cím maximum 45 karakter lehet.';
        }

        $tartalom = $_POST['tartalom'] ?? '';

        if (empty($tartalom)) {
            $validation_errors['tartalom'] = 'A tartalom megadása kötelező.';
        }

        return $validation_errors;
    }
}

?>