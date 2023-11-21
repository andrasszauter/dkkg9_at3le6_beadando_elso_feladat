<?php

class Soapteszt_Controller
{
    private $soapteszt_model;
    private $baseName = "soapteszt";

    public function __construct()
    {
        $this->soapteszt_model = new SoapTeszt_Model();
    }

    public function main(array $vars)
    {
        $result = null;

        $ev = $_POST['ev'] ?? 1988;
        $het = $_POST['het'] ?? 1;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->soapteszt_model->huzas(
                $ev,
                $het
            );
        }

        $view = new View_Loader($this->baseName."_main");
        $view->assign('ev', $ev);
        $view->assign('het', $het);
        $view->assign('result', $result);
    }
}

?>