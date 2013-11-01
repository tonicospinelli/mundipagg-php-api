<?php
include_once "/Classes/CreateOrderRequest.php";
const NEWLINE = "<br>";

class MundiPaggServiceClient {
	//const WSDL = 'https://transaction.mundipaggone.com/MundiPaggService.svc?wsdl';
	const WSDL = 'wsdl.xml';
	
	function CreateOrder(CreateOrderRequest $order) {
		if (is_null($order)) { return null; }
		
		echo "Criando client... " . rand(0, 1000) . NEWLINE;
		$soapClient = new SoapClient(MundiPaggServiceClient::WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
		//$soapClient = new SoapClient(MundiPaggServiceClient::WSDL, array( 'trace' => true, 'cache_wsdl' => WSDL_CACHE_DISK));
		echo "Client criado!" . NEWLINE;
		
		// SOAP call
		//$sampleData->SampleProperty = "abc";

		//$parameters->sampleId = 123;
		$parameters = new stdClass();
		$parameters->createOrderRequest = $order;

		echo "Enviando dados..." . NEWLINE;
		try {
			$result = $soapClient->CreateOrder($parameters);
			echo "Dados enviados!" . NEWLINE;
		} catch (SoapFault $fault) {
			echo "Fault code: {$fault->faultcode}" . NEWLINE;
			echo "Fault string: {$fault->faultstring}" . NEWLINE;
			if ($soapClient != null) {
				$soapClient = null;
			}
			exit();
		}
		$soapClient = null;

		//echo "<pre>\n";
		//print_r($result);
		//echo "</pre>\n";

		//echo "Return value: {$result->CreateOrderResult}" . NEWLINE;
		//$this->EchoObject("Return Value", $result->CreateOrderResult);
		
		$orderResponse = $result->CreateOrderResult;
		
		echo NEWLINE . NEWLINE;
		echo "Tempo decorrido: " . $orderResponse->MundiPaggTimeInMilliseconds . NEWLINE;
		echo "Sucesso: " . $orderResponse->Success . NEWLINE;
		echo "OrderKey: " .$orderResponse->OrderKey . NEWLINE;
		
		//echo NEWLINE . NEWLINE;
		//echo $order;
	}
	
	function EchoObject($key, $value) {
		if (is_array($value)) {
			foreach($value as $subkey => $subvalue) {
				EchoObject($subkey, $subvalue);
			}
		}
		else {
			echo $key . ": " . $value . NEWLINE;
		}
	}
}
?>