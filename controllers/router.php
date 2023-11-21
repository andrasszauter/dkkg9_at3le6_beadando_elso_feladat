<?php

spl_autoload_register(function ($className) {
	$file = SERVER_ROOT.'models/'.strtolower($className).'.php';
	if(file_exists($file))
	{ include_once($file); }
	else
	{ die("File '$file' containing class '$className' not found."); }
});

include(SERVER_ROOT . 'includes/menu.inc.php');
include(SERVER_ROOT . 'includes/db.inc.php');
include(SERVER_ROOT . 'includes/session.inc.php');
include(SERVER_ROOT . 'includes/validation.inc.php');

$page = "nyitolap";
$subpage = "";
$vars = array();

$request = $_SERVER['QUERY_STRING'];

if($request != "")
{
	$params = explode('/', $request);
	$page = array_shift($params);
	
	if(array_key_exists($page, Menu::$menu) && count($params)>0)
	{
		$subpage = array_shift($params);
		if(! (array_key_exists($subpage, Menu::$menu) && Menu::$menu[$subpage][1] == $page))
		{
			$vars[] = $subpage;
			$subpage = "";
		}
		
	}
	
	foreach($params as $p)
	{
		$vars[] = $p;
	}
}

$controllerfile = $page.($subpage != "" ? "_".$subpage : "");
$target = SERVER_ROOT.'controllers/'.$controllerfile.'.php';
if(! file_exists($target))
{
	$controllerfile = "error404";
	$target = SERVER_ROOT.'controllers/error404.php';
}

include_once($target);
$class = ucfirst($controllerfile).'_Controller';
if(class_exists($class))
	{ $controller = new $class; }
else
	{ die('class does not exists!'); }

$controller->main($vars);
?>