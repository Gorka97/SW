<?php

require_once("nusoap-master/src/nusoap.php");
						
$soapclient = new nusoap_client('http://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl',true);
$email = $_GET['email'];
$result = $soapclient -> call('comprobar',array('x'=>$email));
if($result == 'SI'){
	echo ('SI');
}else{
	echo ('NO');
}
?>