<?php
	//$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	$DOCUMENT_ROOT = "C:\\wamp\\www";
	
	$SDK = "$DOCUMENT_ROOT\\Sdk\\MundiPaggService";
	
	$ENTITY = "$SDK\\Entity\\";
	$LOCAL_WSDL = "$SDK\\LocalWSDL\\";
	$POST_NOTIFICATION = "$SDK\\PostNotification\\";
	$CONVERTERS = "$SDK\\Converters\\";
	$SERVICE_CLIENT = "$SDK\\ServiceClient\\";
	

	//const WSDL = 'https://transaction.mundipaggone.com/MundiPaggService.svc?wsdl';
	$PRODUCTION_WSDL = $LOCAL_WSDL . "wsdl.xml";
	$SANDBOX_WSDL = $LOCAL_WSDL . "wsdl.xml";
?>