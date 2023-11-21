<?php

class Mnb_arfolyamkeres_controller
{
    private $mnb_model;
    private $baseName = "mnb_arfolyamkeres";

    public function __construct()
    {
        $this->mnb_model = new Mnb_Model();
    }

    public function main(array $vars)
    {
        $view = new View_Loader($this->baseName."_main");
        $datumok = $this->mnb_model->datumok();
        $devizak = $this->mnb_model->devizak();

        $datum = $_POST['datum'] ?? $datumok['endDate'];
        $deviza1 = $devizak[0];
        $deviza2 = $_POST['deviza2'] ?? $devizak[1];

        $result = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->mnb_model->arfolyam(
                $datum,
                $deviza2
            );
        }

        $view->assign('startDate', $datumok['startDate']);
        $view->assign('endDate', $datumok['endDate']);
        $view->assign('devizak', $devizak);
        $view->assign('datum', $datum);
        $view->assign('deviza1', $deviza1);
        $view->assign('deviza2', $deviza2);
        $view->assign('result', $result);
        $view->assign('js', '<script src="' . SITE_ROOT . 'js/mnb_arfolyamkeres.js"></script>');
    }
}

?>