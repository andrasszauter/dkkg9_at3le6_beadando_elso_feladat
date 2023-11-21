<?php

class View_Loader
{
    private $data = array();
    private $render = FALSE;

    public function __construct($viewName)
    {
        $file = SERVER_ROOT . 'views/' . strtolower($viewName) . '.php';
        if (file_exists($file))
        {
            $this->data['render'] = $file;
            $this->data['selectedItems'] = explode("_", $viewName);
        }        
    }

    public function assign($variable , $value)
    {
        $this->data[$variable] = $value;
    }

    public function __destruct()
    {
        $viewData = $this->data;
        include(SERVER_ROOT . 'views/page_main.php');
    }
}

?>