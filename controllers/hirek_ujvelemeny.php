<?php

class Hirek_Ujvelemeny_Controller
{
    private $hirek_model;
    public $baseName = 'hirek_ujvelemeny';

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

        if (isset($vars[0]) && is_numeric($vars[0])) {
            $hir_id = ($vars[0]);
        } else {
            http_response_code(404);
            die();
        }

        $view = new View_Loader($this->baseName."_main");
        $validation_errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validation_errors = $this->validate();

            if (empty($validation_errors)) {
                $this->hirek_model->velemeny_hozzaad([
                    'hir_id'   => $hir_id,
                    'felhasznalo_id' => felhasznalo_id(),
                    'tartalom' => $_POST['tartalom']
                ]);

                header('Location: ' . SITE_ROOT . 'hirek/' . $hir_id, true, 302);
                die();
            }
        }

        $view->assign('validation_errors', $validation_errors);
        $view->assign('hir_id', $hir_id);
    }

    public function validate()
    {
        $validation_errors = [];

        $tartalom = $_POST['tartalom'] ?? '';

        if (empty($tartalom)) {
            $validation_errors['tartalom'] = 'A tartalom megadása kötelező.';
        }

        return $validation_errors;
    }
}

?>