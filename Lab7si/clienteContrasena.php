<?php

require_once("nusoap-master/src/nusoap.php");

						
$soapclient = new nusoap_client('http://localhost/Lab7si/comprobarContrasena.php?wsdl',true);
$result2 = $soapclient -> call('comprobar',array('x'=>$_GET['pass']));

if($result2 == 'VALIDO'){
	echo ('VALIDO');
}else{
	echo ('INVALIDO');
};
?>