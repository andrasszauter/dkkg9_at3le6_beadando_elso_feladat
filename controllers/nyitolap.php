<?php

class Nyitolap_Controller
{
	public $baseName = 'nyitolap';
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>