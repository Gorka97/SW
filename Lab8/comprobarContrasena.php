<?php

	require_once('nusoap-master/src/nusoap.php');
	
	$ns="http://localhost/Lab5";
	$server = new soap_server;
	$server->configureWSDL('comprobar',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	$server->register('comprobar',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);
	
	function comprobar ($x){
		$fp = file_get_contents('toppasswords.txt','r');
		$result = strrpos($fp,$x);
		if($result === false){
			return 'VALIDO';
		}else{
			return 'INVALIDO';
		}
		
	}
	if(!isset($HTTP_RAW_POST_DATA))$HTTP_RAW_POST_DATA=file_get_contents('php://input');
		$server->service($HTTP_RAW_POST_DATA);

?>