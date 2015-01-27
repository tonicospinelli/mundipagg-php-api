<?php

/**
* @author: Matheus
* @version: 1.0
* revision: 2013/11/29
* 
* This client consumes the MundiPagg One Service, using Soap.
*/
class MundiPaggService_ServiceClient_SoapClient implements MundiPaggService_ServiceClient_IClient {
	private $soapClient = null;
	private $converter = null;
	private $isClosed = false;
	
	private $showXmlData = false;
	
	/**
	* @param string $wsdlUri WSDL contract location.
	* @param MundiPaggService_Converters_ISoapConverter $converter The object used to convert data in requests and responses.
	* @param bool $traceSoapXml Indicates if the program must trace the Xml request and response.
	*/
	public function __construct($wsdlUri = NULL, MundiPaggService_Converters_ISoapConverter $converter = NULL, $traceSoapXml = NULL) {

		global $TRACE_SOAP_XML, $CONVERTERS; // Configuration Properties

		$this->showXmlData = $traceSoapXml;
		$soap_opt = array();
		$soap_opt['encoding'] = 'UTF-8';
		$soap_opt['exceptions'] = true;
		
		if (is_null($traceSoapXml)) { $traceSoapXml = $TRACE_SOAP_XML; }
		$soap_opt['trace'] = $traceSoapXml;


		// WSDL_CACHE_NONE, WSDL_CACHE_DISK, WSDL_CACHE_MEMORY or WSDL_CACHE_BOTH
		if (constant("MP_ENABLE_WSDL_CACHE")) { $soap_opt['cache_wsdl'] = WSDL_CACHE_MEMORY; }
		else { $soap_opt['cache_wsdl'] = WSDL_CACHE_NONE; }
		
		if (is_null($wsdlUri) || trim($wsdlUri) == '') { $wsdlUri = unserialize(constant("MP_WSDL_URI_COLLECTION"))[constant("MP_DEFAULT_WSDL_URI")]; }
		else if (array_key_exists($wsdlUri, unserialize(constant("MP_WSDL_URI_COLLECTION")))) { $wsdlUri = unserialize(constant("MP_WSDL_URI_COLLECTION"))[$wsdlUri]; }
		if (is_null($converter)) { $converter = new MundiPaggService_Converters_SoapConverter(); }
		$this->converter = $converter;
		
		try {
			// Creates the soap client.
			$soapClient = new SoapClient($wsdlUri, $soap_opt);
		} catch(SoapFault $fault) {
			$this->soapClient = null;
			$this->isClosed = true;
			
			throw $fault;
		}
		
		$this->soapClient = $soapClient;
		$this->isClosed = false;
	}
		
	public function __destruct() {
		$this->Close();
	}
		
	/**
	* Closes the client.
	*/
	public function Close() {
		// If the connection is open, closes it.
		if ($this->isClosed == false) {
			try {
				$this->soapClient->close();
			} catch (Exception $ex) { }
			
			$this->soapClient = null;
			$this->converter = null;
			$this->isClosed = true;
		}
	}
	
	/**
	* Creates an order in MundiPagg One.
	* @param MundiPaggService_DataContracts_CreateOrderRequest $createOrderRequest The order to be created.
	*/
	public function CreateOrder(MundiPaggService_DataContracts_CreateOrderRequest $createOrderRequest) {
		$this->ThrowExceptionIfClosed();
		
		if (is_null($createOrderRequest)) { return null; }
		
		// Converts the request to be sent by the SoapClient.
		$request = $this->converter->ConvertOrderRequest($createOrderRequest);
		
		try {
			// Executes the method.
			$result = $this->soapClient->CreateOrder($request);
		} catch (SoapFault $fault) {
			throw $fault;
		}

		$createOrderResponse = $result->CreateOrderResult;
		
		$this->AutoSaveRequestResponseData();
		
		// Converts and returns the response.
		return $this->converter->ConvertOrderResponse($createOrderResponse);
	}

	/**
	* Manages an order in MundiPagg One.
	* @param MundiPaggService_DataContracts_ManageOrderRequest $manageOrderRequest The order to be managed.
	*/
	public function ManageOrder(MundiPaggService_DataContracts_ManageOrderRequest $manageOrderRequest) {
		$this->ThrowExceptionIfClosed();

		if (is_null($manageOrderRequest)) { return null; }
		
		// Converts the request to be sent by the SoapClient.
		$request = $this->converter->ConvertManageOrderRequest($manageOrderRequest);
		
		try {
			// Executes the method.
			$result = $this->soapClient->ManageOrder($request);
		} catch (SoapFault $fault) {
			throw $fault;
		}

		$manageOrderResponse = $result->ManageOrderResult;
		
		$this->AutoSaveRequestResponseData();
		
		// Converts and returns the response.
		return $this->converter->ConvertManageOrderResponse($manageOrderResponse);
	}
	
	/**
	* Retries an order in MundiPagg One.
	* @param MundiPaggService_DataContracts_RetryOrderRequest $retryOrderRequest The order to be retried.
	*/
	public function RetryOrder(MundiPaggService_DataContracts_RetryOrderRequest $retryOrderRequest) {
		$this->ThrowExceptionIfClosed();
		
		if (is_null($retryOrderRequest)) { return null; }
		
		// Converts the request to be sent by the SoapClient.
		$request = $this->converter->ConvertRetryOrderRequest($retryOrderRequest);
		
		try {
			// Executes the method.
			$result = $this->soapClient->RetryOrder($request);
		} catch (SoapFault $fault) {
			throw $fault;
		}

		$retryOrderResponse = $result->RetryOrderResult;

		$this->AutoSaveRequestResponseData();
		
		// Converts and returns the response.
		return $this->converter->ConvertRetryOrderResponse($retryOrderResponse);
	}
	
	/**
	* Returns all information about an order in MundiPagg One.
	* @param MundiPaggService_DataContracts_QueryOrderRequest $queryOrderRequest The order to be returned.
	*/
	public function QueryOrder(MundiPaggService_DataContracts_QueryOrderRequest $queryOrderRequest) {
		$this->ThrowExceptionIfClosed();
		
		if (is_null($queryOrderRequest)) { return null; }
		
		// Converts the request to be sent by the SoapClient.
		$request = $this->converter->ConvertQueryOrderRequest($queryOrderRequest);
		
		try {
			// Executes the method.
			$result = $this->soapClient->QueryOrder($request);
		} catch (SoapFault $fault) {
			throw $fault;
		}

		$queryOrderResponse = $result->QueryOrderResult;
		
		$this->AutoSaveRequestResponseData();
		
		// Converts and returns the response.
		return $this->converter->ConvertQueryOrderResponse($queryOrderResponse);
	}

	/**
	* Returns information about a buyer's credit cards.
	* @param MundiPaggService_DataContracts_GetInstantBuyDataRequest $getInstantBuyDataRequest The order to be created.
	*/
	public function GetInstantBuyData(MundiPaggService_DataContracts_GetInstantBuyDataRequest $getInstantBuyDataRequest) {
		$this->ThrowExceptionIfClosed();
		
		if (is_null($getInstantBuyDataRequest)) { return null; }
		
		// Converts the request to be sent by the SoapClient.
		$request = $this->converter->ConvertGetInstantBuyDataRequest($getInstantBuyDataRequest);
		
		try {
			// Executes the method.
			$result = $this->soapClient->GetInstantBuyData($request);
		} catch (SoapFault $fault) {
			throw $fault;
		}

		$getInstantBuyDataResponse = $result->GetInstantBuyDataResult;
		
		$this->AutoSaveRequestResponseData();
		
		// Converts and returns the response.
		return $this->converter->ConvertGetInstantBuyDataResponse($getInstantBuyDataResponse);
	}
	
	/**
	* Gets the Request XML.
	*/
	public function GetRequestData() {
		if (!$this->showXmlData) { return null; }
		return $this->soapClient->__getLastRequest();
	}
	
	/**
	* Gets the Response XML.
	*/
	public function GetResponseData() {
		if (!$this->showXmlData) { return null; }
		return $this->soapClient->__getLastResponse();
	}
	
	/**
	* Saves the request and response.
	* @param $directory The directory where the files must be saved.
	*/
	public function SaveRequestResponseData($directory) {
		if (!$this->showXmlData) { return; }
		
		if (!$this->EndsWith($directory, '/') && !$this->EndsWith($directory, '\\')) { $directory .= '\\'; }
		
		$now = date('Y-m-d__H-i-s-') . substr((string)microtime(), 2, 4);
		
		$request = $this->GetRequestData();
		$response = $this->GetResponseData();
		$requestFile = null;
		$responseFile = null;
		
		if (!is_null($request)) {
			$requestFile = $directory . 'SoapRequest____' . $now . '.xml';
			$fr = fopen($requestFile, 'w');
			fwrite($fr, $request);
			fclose($fr);
		}
		
		if (!is_null($response)) {
			$responseFile = $directory . 'SoapResponse____' . $now . '.xml';
			$fr = fopen($responseFile, 'w');
			fwrite($fr, $response);
			fclose($fr);
		}
		
		if (is_null($request) && is_null($response)) { return null; }
		return array ( 'request' => $requestFile, 'response' => $responseFile );
	}
	
	/**
	* Automatically saves the request and response messages.
	*/
	private function AutoSaveRequestResponseData() {
			
		if ($this->showXmlData && constant("MP_ENABLE_AUTO_SAVE_MESSAGES")) {
			
			try {
				$this->SaveRequestResponseData(constant("MP_AUTO_SAVE_MESSAGES_PATH"));
			}
			catch(Exception $ex) { }
		}
	}
	
	/**
	* Throws an exception if the client is closed.
	*/
	private function ThrowExceptionIfClosed() {
		if ($this->isClosed) { throw new Exception("The client is closed!"); }
	}

	private function EndsWith($str, $find) {
		return $find === "" || substr($str, -strlen($find)) === $find;
	}
}
