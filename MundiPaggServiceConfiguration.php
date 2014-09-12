<?php
	////// THIS FILE MUST REMAIN ON THE ROOT DIRECTORY //////

	// PATH VARIABLES
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	$SDK = "$DOCUMENT_ROOT\\MundiPaggService";
	$DATA_CONTRACTS = "$SDK\\DataContracts\\";
	$DATA_CONTRACTS_DEBIT = "$DATA_CONTRACTS\\Debit\\";
	$POST_NOTIFICATION = "$SDK\\PostNotification\\";
	$CONVERTERS = "$SDK\\Converters\\";
	$HELPERS = "$SDK\\Helpers\\";
	$SERVICE_CLIENT = "$SDK\\ServiceClient\\";
	
	
	// CONFIGURATION VARIABLES
	$MERCHANT_KEY = '00000000-0000-0000-0000-000000000000';
	
	$WSDL_URI_COLLECTION = array (
		'PRODUCTION' => "https://transaction.mundipaggone.com/MundiPaggService.svc?wsdl"
		//,'SANDBOX' => "" // Not implemented yet.
		,'LOCAL' => "$SDK\\LocalWSDL\\wsdl.xml"
	);
	
	$DEBIT_SERVICE_URI = "https://api.mundipaggone.com";

	$REPORT_SERVICE_URI = "https://api.mundipaggone.com";

	$DEFAULT_WSDL_URI = 'PRODUCTION';
	
	$OPERATION_TIME_OUT = 30;

	$ENABLE_WSDL_CACHE = true;
	
	$TRACE_SOAP_XML = false;

	$ENABLE_AUTO_SAVE_MESSAGES = false;
	
	$AUTO_SAVE_MESSAGES_PATH = "C:\\RequestResponseData\\";
	
	$STATUS_NOTIF_POST = "xmlStatusNotification";
?>