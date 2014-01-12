<?php
	////// THIS FILE MUST REMAIN ON THE ROOT DIRECTORY //////

	// PATH VARIABLES
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	$SDK = "$DOCUMENT_ROOT\\MundiPaggService";
	$DATA_CONTRACTS = "$SDK\\DataContracts\\";
	$POST_NOTIFICATION = "$SDK\\PostNotification\\";
	$CONVERTERS = "$SDK\\Converters\\";
	$SERVICE_CLIENT = "$SDK\\ServiceClient\\";
	
	
	// CONFIGURATION VARIABLES
	$MERCHANT_KEY = '00000000-0000-0000-0000-000000000000';
	
	$WSDL_URI_COLLECTION = array (
		'PRODUCTION' => "https://transaction.mundipaggone.com/MundiPaggService.svc?wsdl"
		//,'SANDBOX' => "" // Not implemented yet.
		,'LOCAL' => "$SDK\\LocalWSDL\\wsdl.xml"
	);
	
	$DEFAULT_WSDL_URI = 'PRODUCTION';
	
	$ENABLE_WSDL_CACHE = true;
	
	$TRACE_SOAP_XML = false;
	
	$STATUS_NOTIF_POST = "xmlStatusNotification";

?>