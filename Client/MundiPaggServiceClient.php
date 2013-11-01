<?php
include_once "/Classes/CreateOrderRequest.php";
//const NEWLINE = "<br>";

class MundiPaggServiceClient {
	//const WSDL = 'https://transaction.mundipaggone.com/MundiPaggService.svc?wsdl';
	const WSDL = 'wsdl.xml';
	
	function CreateOrder(CreateOrderRequest $order) {
		if (is_null($order)) { return null; }
		
		echo "Criando client... " . rand(0, 1000) . NEWLINE;
		$soapClient = new SoapClient(MundiPaggServiceClient::WSDL, array( 'trace' => true));
		//$soapClient = new SoapClient(MundiPaggServiceClient::WSDL, array( 'trace' => true, 'cache_wsdl' => WSDL_CACHE_DISK));
		echo "Client criado!" . NEWLINE;
		
		// SOAP call
		//$sampleData->SampleProperty = "abc";

		$parameters = new stdClass();
		$parameters->createOrderRequest = $order;

		$request = $this->ConvertOrderRequest($order);
		
		try {
			//$result = $soapClient->CreateOrder($parameters);
			$result = $soapClient->CreateOrder($request);
		} catch (SoapFault $fault) {
			echo "Fault code: {$fault->faultcode}" . NEWLINE;
			echo "Fault string: {$fault->faultstring}" . NEWLINE;
			if ($soapClient != null) {
				$soapClient = null;
			}
			exit();
		}
		//$soapClient = null;

		//echo "Return value: {$result->CreateOrderResult}" . NEWLINE;
		//$this->EchoObject("Return Value", $result->CreateOrderResult);

		echo html_entity_decode( $soapClient->__getLastRequest());
		//echo html_entity_decode( $soapClient->__getLastResponse());
		//exit();
		
		$orderResponse = $result->CreateOrderResult;
		
		echo NEWLINE . NEWLINE;
		echo "Tempo decorrido: " . $orderResponse->MundiPaggTimeInMilliseconds . NEWLINE;
		echo "Sucesso: " . $orderResponse->Success . NEWLINE;
		echo "OrderKey: " . $orderResponse->OrderKey . NEWLINE;
		
		if (!is_null($orderResponse->ErrorReport)) {
			$errorReport = $orderResponse->ErrorReport;
			$collection = $errorReport->ErrorItemCollection;
			foreach($collection as $item) {
				echo $item->Description;
			}
			//echo $collection[0]->Description;
		}
		
		if (!is_null($orderResponse->CreditCardTransactionResultCollection)) {
			$collection = $orderResponse->CreditCardTransactionResultCollection;
			echo "CC:" . NEWLINE;
			foreach ($collection as $ccTrans) {
				echo "AmountInCents: " . $ccTrans->AmountinCents . NEWLINE;
			}
		}
		
		//echo NEWLINE . NEWLINE;
		//echo $order;
	}
	
	function ConvertOrderRequest(CreateOrderRequest $orderRequest) {
		$order = array(); // Cria o pedido
		$request = array(); // Cria a requisiчуo
		$request["createOrderRequest"] = $order; // Adiciona o pedido na requisiчуo
		
		$order["MerchantKey"] = $orderRequest->MerchantKey; 
		$order["OrderReference"] = $orderRequest->OrderReference;
		$order["AmountInCents"] = $orderRequest->AmountInCents;
		$order["AmountInCentsToConsiderPaid"] = $orderRequest->AmountInCentsToConsiderPaid;
		$order["EmailUpdateToBuyerEnum"] = $orderRequest->EmailUpdateToBuyerEnum;
		//$order["CurrencyIsoEnum"] = $orderRequest->CurrencyIsoEnum;
		$order["CurrencyIsoEnum"] = 'BRL';

		//Dados da transaчуo de Cartуo de Crщdito
		if (is_null($orderRequest->CreditCardTransactionCollection)) {
			$order["CreditCardTransactionCollection"] = null;
		}
		else if (is_array($orderRequest->CreditCardTransactionCollection)) {
			foreach($orderRequest->CreditCardTransactionCollection as $ccTransItem) {
				$ccTrans = array();
				$ccTrans["AmountInCents"] = $ccTransItem->AmountInCents;
				$ccTrans["CreditCardNumber"] = $ccTransItem->CreditCardNumber;
				$ccTrans["InstallmentCount"] = $ccTransItem->InstallmentCount;
				$ccTrans["HolderName"] = $ccTransItem->HolderName;
				$ccTrans["SecurityCode"] = $ccTransItem->SecurityCode;
				$ccTrans["ExpMonth"] = $ccTransItem->ExpMonth;
				$ccTrans["ExpYear"] = $ccTransItem->ExpYear;
				$ccTrans["CreditCardBrandEnum"] = $ccTransItem->CreditCardBrandEnum;
				$ccTrans["PaymentMethodCode"] = $ccTransItem->PaymentMethodCode;
				$ccTrans["CreditCardOperationEnum"] = $ccTransItem->CreditCardOperationEnum;
			}
			
			$order["CreditCardTransactionCollection"]["CreditCardTransaction"][0] = $ccTrans;
		}
		
		//Dados da transaчуo de Cartуo de Crщdito
		if (is_null($orderRequest->CreditCardTransactionCollection)) {
			$order["CreditCardTransactionCollection"] = null;
		}
		else if (is_array($orderRequest->CreditCardTransactionCollection)) {
			foreach($orderRequest->CreditCardTransactionCollection as $ccTransItem) {
				$ccTrans = array();
				$ccTrans["AmountInCents"] = $ccTransItem->AmountInCents;
				$ccTrans["CreditCardNumber"] = $ccTransItem->CreditCardNumber;
				$ccTrans["InstallmentCount"] = $ccTransItem->InstallmentCount;
				$ccTrans["HolderName"] = $ccTransItem->HolderName;
				$ccTrans["SecurityCode"] = $ccTransItem->SecurityCode;
				$ccTrans["ExpMonth"] = $ccTransItem->ExpMonth;
				$ccTrans["ExpYear"] = $ccTransItem->ExpYear;
				$ccTrans["CreditCardBrandEnum"] = $ccTransItem->CreditCardBrandEnum;
				$ccTrans["PaymentMethodCode"] = $ccTransItem->PaymentMethodCode;
				$ccTrans["CreditCardOperationEnum"] = $ccTransItem->CreditCardOperationEnum;
			}
		}
		
		return $request;
		
		//$request["createOrderRequest"]["CreditCardTransactionCollection"]["CreditCardTransaction"][0]["CreditCardOperationEnum"] = "AuthOnly"; /** Tipo de operaчуo: AuthOnly | AuthAndCapture | AuthAndCaptureWithDelay  */
		//$order[
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