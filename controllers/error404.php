<?php

class Error404_Controller
{
	public $baseName = 'error404';
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName.'_main');
	}
}

?>