<?php
	//error_reporting(0);
	require 'lotto.php';
	require 'WSDLDocument/WSDLDocument.php';
	$wsdl = new WSDLDocument('Huzasok', "http://localhost/feladat1/soap/szerver.php", "http://localhost/feladat1/soap/");
	$wsdl->formatOutput = true;
	$wsdlfile = $wsdl->saveXML();
	echo $wsdlfile;
	file_put_contents ("lotto.wsdl" , $wsdlfile);
?>
