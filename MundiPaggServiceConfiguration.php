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
	$MERCHANT_KEY = '8A2DD57F-1ED9-4153-B4CE-69683EFADAD5';
	
	$PRODUCTION_WSDL = "https://transaction.mundipaggone.com/MundiPaggService.svc?wsdl";
	$SANDBOX_WSDL = "$SDK\\LocalWSDL\\wsdl.xml";
	
	$ENABLE_WSDL_CACHE = true;
	
	$STATUS_NOTIF_POST = "xmlStatusNotification";

?>