<?php
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"] . "\\..";
	
	$SDK = "$DOCUMENT_ROOT\\Sdk";
	
	$MAIN_CLASSES = "$SDK\\Classes\\";
	$LOCAL_WSDL = "$SDK\\SDK/LocalWSDL\\";
	$POST_NOTIFICATION = "$SDK\\PostNotification\\";
	$CONVERTERS = "$SDK\\Converters\\";
	$SOAP_SERVICE_CLIENT = "$SDK\\SoapServiceClient\\";
	$REST_SERVICE_CLIENT = "$SDK\\RestServiceClient\\";
	

	//const WSDL = 'https://transaction.mundipaggone.com/MundiPaggService.svc?wsdl';
	$PRODUCTION_WSDL = $LOCAL_WSDL . "wsdl.xml";
	$SANDBOX_WSDL = $LOCAL_WSDL . "wsdl.xml";
