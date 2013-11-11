<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "\\Variables.php";
include_once $CONVERTERS . "SoapConverter.php"; // Also includes ISoapConverter.php

class MundiPaggSoapServiceClient {
	private $soapClient = null;
	private $converter = null;
	private $needToCloseClient = false;
	
	public $showXmlData = false; // Variável para testes apenas. LEMBRETE: Retirar variável após todos os testes concluídos.
		
	function __construct(string $wsdlUrl = null, ISoapConverter $converter = null) {
		$soap_opt = array();
		$soap_opt['encoding'] = 'UTF-8';
		$soap_opt['trace'] = true;
		$soap_opt['exceptions'] = true;
		//$soap_opt['cache_wsdl'] = WSDL_CACHE_NONE;
		//$soap_opt['soap_version'] = SOAP_1_1;
		
		global $PRODUCTION_WSDL, $SANDBOX_WSDL, $CONVERTERS;
		
		if (is_null($wsdlUrl)) { $wsdlUrl = $PRODUCTION_WSDL; }
		if (is_null($converter)) { $converter = new SoapConverter(); }
		if (strtoupper(trim($wsdlUrl)) == 'SANDBOX') { $wsdlUrl = $SANDBOX_WSDL; }
		
		try {
			$soapClient = new SoapClient($wsdlUrl, $soap_opt);
		} catch(SoapFault $fault) {
			$this->soapClient = null;
			$this->isClosed = true;
			
			throw $fault;
		}
		
		$this->soapClient = $soapClient;
		$this->isClosed = false;
	}
		
	function __destruct() {
		$this->Close();
	}
		
	///////////////////////////////////////////////////////
	////// Main Methods ///////////////////////////////////
	///////////////////////////////////////////////////////
	function Close() {
		if (!$this->isClosed) {
			$this->isClosed = true;
			try {
				$this->soapClient->close();
			} catch (Exception $ex) { }
			$this->soapClient = null;
			$this->converter = null;
		}
	}
	
	function CreateOrder(CreateOrderRequest $order) {
		$this->ThrowExceptionIfClosed();
		
		if (is_null($order)) { return null; }
		
		$request = $this->converter->ConvertOrderRequest($order);
		
		try {
			$result = $this->soapClient->CreateOrder($request);
		} catch (SoapFault $fault) {
			//echo "Fault code: {$fault->faultcode}" . NEWLINE;
			//echo "Fault string: {$fault->faultstring}" . NEWLINE;
			throw $fault;
			//return null;
		}

		$this->WriteXml($this->soapClient);
		
		$orderResponse = $result->CreateOrderResult;
		
		// Converte a resposta e retorna o objeto.
		return $this->converter->ConvertOrderResponse($orderResponse);
	}

	function ManageOrder(ManageOrderRequest $order) {
		$this->ThrowExceptionIfClosed();

		if (is_null($order)) { return null; }
		
		$request = $this->converter->ConvertManageOrderRequest($order);
		
		try {
			$result = $this->soapClient->ManageOrder($request);
		} catch (SoapFault $fault) {
			throw $fault;
		}

		$this->WriteXml($this->soapClient);
		
		$orderResponse = $result->ManageOrderResult;
		
		// Converte a resposta e retorna o objeto.
		return $this->converter->ConvertManageOrderResponse($orderResponse);
	}
	
	function RetryOrder(RetryOrderRequest $order) {
		$this->ThrowExceptionIfClosed();
		
		if (is_null($order)) { return null; }
		
		$request = $this->converter->ConvertRetryOrderRequest($order);
		
		try {
			$result = $this->soapClient->RetryOrder($request);
		} catch (SoapFault $fault) {
			throw $fault;
		}

		$this->WriteXml($this->soapClient);
		
		$orderResponse = $result->RetryOrderResult;
		
		// Converte a resposta e retorna o objeto.
		return $this->converter->ConvertRetryOrderResponse($orderResponse);
	}
	
	function QueryOrder(QueryOrderRequest $order) {
		$this->ThrowExceptionIfClosed();
		
		if (is_null($order)) { return null; }
		
		$request = $this->converter->ConvertQueryOrderRequest($order);
		
		try {
			$result = $this->soapClient->QueryOrder($request);
		} catch (SoapFault $fault) {
			throw $fault;
		}

		$this->WriteXml($this->soapClient);
		
		$orderResponse = $result->QueryOrderResult;
		
		// Converte a resposta e retorna o objeto.
		return $this->converter->ConvertQueryOrderResponse($orderResponse);
	}

	function GetInstantBuyData(GetInstantBuyDataRequest $order) {
		$this->ThrowExceptionIfClosed();
		
		if (is_null($order)) { return null; }
		
		$request = $this->converter->ConvertGetInstantBuyDataRequest($order);
		
		try {
			$result = $this->soapClient->GetInstantBuyData($request);
		} catch (SoapFault $fault) {
			throw $fault;
		}

		$this->WriteXml($this->soapClient);
		
		$orderResponse = $result->GetInstantBuyDataResult;
		
		// Converte a resposta e retorna o objeto.
		return $this->converter->ConvertGetInstantBuyDataResponse($orderResponse);
	}
	
	///////////////////////////////////////////////////////
	////// Métodos privados ///////////////////////////////
	///////////////////////////////////////////////////////
	private function WriteXml($soapClient) {
		if (!$this->showXmlData) { return; }
		$requestLocation = 'C:\Users\mriboli\Desktop\PHP_SoapRequest.xml';
		$responseLocation = 'C:\Users\mriboli\Desktop\PHP_SoapResponse.xml';
		$request = $soapClient->__getLastRequest();
		$response = $soapClient->__getLastResponse();
		
		unlink($requestLocation);
		$fr = fopen($requestLocation, 'w');
		fwrite($fr, $request);
		fclose($fr);
		
		unlink($responseLocation);
		$fr = fopen($responseLocation, 'w');
		fwrite($fr, $response);
		fclose($fr);
		
		echo "Request:" . NEWLINE;
		echo html_entity_decode( $request);
		echo NEWLINE . NEWLINE . "Response:" . NEWLINE;
		echo html_entity_decode( $response);
	}
	
	private function ThrowExceptionIfClosed() {
		if ($this->isClosed) { throw new Exception("The client is closed!"); }
	}
}
?>
