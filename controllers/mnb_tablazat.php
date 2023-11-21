<?php

class Mnb_Tablazat_Controller
{
    private $mnb_model;
    private $baseName = "mnb_tablazat";

    public function __construct()
    {
        $this->mnb_model = new Mnb_Model();
    }

    public function main(array $vars)
    {
        $view = new View_Loader($this->baseName."_main");
        $datumok = $this->mnb_model->datumok();
        $devizak = $this->mnb_model->devizak();

        $datum = $_POST['datum'] ?? date('Y-m', strtotime($datumok['endDate']));
        $deviza1 = $devizak[0];
        $deviza2 = $_POST['deviza2'] ?? $devizak[1];

        $result = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->mnb_model->arfolyamok(
                date('Y-m-01', strtotime($datum)),
                date('Y-m-t', strtotime($datum)),
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
        $view->assign('js',
            '<script src="' . SITE_ROOT . 'js/chartjs/chart.umd.min.js"></script>' . PHP_EOL .
            '<script src="' . SITE_ROOT . 'js/mnb_tablazat.js"></script>'
        );
    }
}

?>