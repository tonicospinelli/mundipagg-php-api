<?php
	//$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	$DOCUMENT_ROOT = "C:\\wamp\\www";
	
	$SDK = "$DOCUMENT_ROOT\\MundiPaggService";
	
	$MAIN_CLASSES = "$SDK\\Classes\\";
	$LOCAL_WSDL = "$SDK\\SDK/LocalWSDL\\";
	$POST_NOTIFICATION = "$SDK\\PostNotification\\";
	$CONVERTERS = "$SDK\\Converters\\";
	$SERVICE_CLIENT = "$SDK\\ServiceClient\\";
	

	//const WSDL = 'https://transaction.mundipaggone.com/MundiPaggService.svc?wsdl';
	$PRODUCTION_WSDL = $LOCAL_WSDL . "wsdl.xml";
	$SANDBOX_WSDL = $LOCAL_WSDL . "wsdl.xml";
?>