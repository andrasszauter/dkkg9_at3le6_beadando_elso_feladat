<?php
require("lotto.php");
$server = new SoapServer("lotto.wsdl");
$server->setClass('Huzasok');
$server->handle();
?>