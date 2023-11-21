<?php

class Hirek_Controller {
    private $hirek_model;
    public $baseNameListaz = 'hirek';
    public $baseNameMutat = 'hir';

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
            $id = ($vars[0]);
            $hir = $this->hirek_model->hir_lekerdez(($id));

            if ($hir != false) {
                $this->mutat($hir);
                return;
            }
        }

        $this->listaz();
    }

    public function listaz()
    {
        $hirek = $this->hirek_model->hir_listaz();
        $view = new View_Loader($this->baseNameListaz."_main");
        $view->assign('hirek', $hirek);
    }

    private function mutat($hir)
    {
        $view = new View_Loader($this->baseNameMutat."_main");
        $view->assign('hir', $hir);

        $velemenyek = $this->hirek_model->velemenyek_lekerdez_hirhez($hir['id']);
        $view->assign('velemenyek', $velemenyek);
    }
}

?>