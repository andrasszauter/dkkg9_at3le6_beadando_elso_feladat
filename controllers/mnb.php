<?php

class Mnb_Controller
{
    public function main(array $vars)
    {
        header('Location: ' . SITE_ROOT . 'mnb_arfolyamkeres', true, 302);
        die();
    }
}

?>