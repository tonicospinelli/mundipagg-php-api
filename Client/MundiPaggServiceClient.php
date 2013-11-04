<?php
include_once "/Classes/CreateOrderRequest.php";
include_once "Classes/CreateOrderResponse.php";
include_once "Classes/ManageOrderRequest.php";

//const NEWLINE = "<br>";

class MundiPaggServiceClient {
	//const WSDL = 'https://transaction.mundipaggone.com/MundiPaggService.svc?wsdl';
	const WSDL = 'wsdl.xml';
	
	function CreateOrder(CreateOrderRequest $order) {
		if (is_null($order)) { return null; }
		
		$soapClient = $this->GetSoapClient();

		$request = $this->ConvertOrderRequest($order);
		
		try {
			$result = $soapClient->CreateOrder($request);
		} catch (SoapFault $fault) {
			//echo "Fault code: {$fault->faultcode}" . NEWLINE;
			//echo "Fault string: {$fault->faultstring}" . NEWLINE;
			if ($soapClient != null) {
				$soapClient = null;
			}
			//exit();
			throw $fault;
		}

		$this->WriteXml($soapClient);
		
		$orderResponse = $result->CreateOrderResult;
		
		// Converte a resposta e retorna o objeto.
		return $this->ConvertOrderResponse($orderResponse);
	}

	function ManageOrder(ManageOrderRequest $order) {
		if (is_null($order)) { return null; }
		
		$soapClient = $this->GetSoapClient();

		$request = $this->ConvertManageOrderRequest($order);
		
		try {
			$result = $soapClient->ManageOrder($request);
		} catch (SoapFault $fault) {
			//echo "Fault code: {$fault->faultcode}" . NEWLINE;
			//echo "Fault string: {$fault->faultstring}" . NEWLINE;
			if ($soapClient != null) {
				$soapClient = null;
			}
			//exit();
			throw $fault;
		}

		$this->WriteXml($soapClient);
		
		$orderResponse = $result->ManageOrderResult;
		
		// Converte a resposta e retorna o objeto.
		return $this->ConvertManageOrderResponse($orderResponse);
	}
	
	
	
	
	
	
	////// Métodos privados
	private function GetSoapClient() {
		$soap_opt['encoding'] = 'UTF-8';
		$soap_opt['trace'] = true;
		$soap_opt['exceptions'] = true;
		//$soap_opt['cache_wsdl'] = WSDL_CACHE_NONE;
		//$soap_opt['soap_version'] = SOAP_1_1;
		
		$soapClient = new SoapClient(MundiPaggServiceClient::WSDL, $soap_opt);
		
		return $soapClient;
	}
	
	private function WriteXml($soapClient) {
		echo "Request:" . NEWLINE;
		echo html_entity_decode( $soapClient->__getLastRequest());
		echo NEWLINE . NEWLINE . "Response:" . NEWLINE;
		echo html_entity_decode( $soapClient->__getLastResponse());
	}
	
	private function ConvertOrderRequest(CreateOrderRequest $orderRequest) {
		$order = array(); // Cria o pedido
		$request = array(); // Cria a requisição
		
		$order["MerchantKey"] = $orderRequest->MerchantKey; 
		$order["OrderReference"] = $orderRequest->OrderReference;
		$order["AmountInCents"] = $orderRequest->AmountInCents;
		$order["AmountInCentsToConsiderPaid"] = $orderRequest->AmountInCentsToConsiderPaid;
		$order["EmailUpdateToBuyerEnum"] = $orderRequest->EmailUpdateToBuyerEnum;
		$order["CurrencyIsoEnum"] = $orderRequest->CurrencyIsoEnum;
		$order["RequestKey"] = $orderRequest->RequestKey;
		$order["Retries"] = $orderRequest->Retries;

		// Copia o Buyer
		if (!is_null($orderRequest->Buyer)) {
			$buyer = array();
			$buyer["BuyerKey"] = $orderRequest->Buyer->BuyerKey;
			$buyer["BuyerReference"] = $orderRequest->Buyer->BuyerReference;
			if (!is_null($orderRequest->Buyer->CreateDateInMerchant)) {
				$buyer["CreateDateInMerchant"] = $orderRequest->Buyer->CreateDateInMerchant;
			}
			$buyer["Email"] = $orderRequest->Buyer->Email;
			$buyer["FacebookId"] = $orderRequest->Buyer->FacebookId;
			if (!is_null($orderRequest->Buyer->GenderEnum)) {
				$buyer["GenderEnum"] = $orderRequest->Buyer->GenderEnum;
			}
			$buyer["HomePhone"] = $orderRequest->Buyer->HomePhone;
			$buyer["IpAddress"] = $orderRequest->Buyer->IpAddress;
			if (!is_null($orderRequest->Buyer->LastBuyerUpdateInMerchant)) {
				$buyer["LastBuyerUpdateInMerchant"] = $orderRequest->Buyer->LastBuyerUpdateInMerchant;
			}
			$buyer["MobilePhone"] = $orderRequest->Buyer->MobilePhone;
			$buyer["Name"] = $orderRequest->Buyer->Name;
			if (!is_null($orderRequest->Buyer->PersonTypeEnum)) {
				$buyer["PersonTypeEnum"] = $orderRequest->Buyer->PersonTypeEnum;
			}
			$buyer["TaxDocumentNumber"] = $orderRequest->Buyer->TaxDocumentNumber;
			if (!is_null($orderRequest->Buyer->TaxDocumentTypeEnum)) {
				$buyer["TaxDocumentTypeEnum"] = $orderRequest->Buyer->TaxDocumentTypeEnum;
			}
			$buyer["TwitterId"] = $orderRequest->Buyer->TwitterId;
			$buyer["WorkPhone"] = $orderRequest->Buyer->WorkPhone;
			// Copia os objetos BuyerAddress
			if (!is_null($orderRequest->Buyer->BuyerAddressCollection)) {
				if (count($orderRequest->Buyer->BuyerAddressCollection) > 0) {
					$addrCollection = array(); // Coleção com os endereços do comprador

					$counter = 0;
					foreach($orderRequest->Buyer->BuyerAddressCollection as $addressItem) {
						$buyAddress = array(); // Endereço do comprador
						$buyAddress["AddressTypeEnum"] = $addressItem->AddressTypeEnum;
						$buyAddress["City"] = $addressItem->City;
						$buyAddress["Complement"] = $addressItem->Complement;
						$buyAddress["CountryEnum"] = $addressItem->CountryEnum;
						$buyAddress["District"] = $addressItem->District;
						$buyAddress["Number"] = $addressItem->Number;
						$buyAddress["State"] = $addressItem->State;
						$buyAddress["Street"] = $addressItem->Street;
						$buyAddress["ZipCode"] = $addressItem->ZipCode;

						$addressCollection[$counter] = $buyAddress;
						$counter += 1;
					}
					
					$buyer["BuyerAddressCollection"] = $addressCollection;
				}
			}
			
			$order["Buyer"] = $buyer;
		} // FIM do Buyer
		
		
		//Dados da transação de Cartão de Crédito
		if (is_null($orderRequest->CreditCardTransactionCollection)) {
			$order["CreditCardTransactionCollection"] = null;
		}
		else if (is_array($orderRequest->CreditCardTransactionCollection)) {
			$counter = 0;
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
				
				$order["CreditCardTransactionCollection"]["CreditCardTransaction"][$counter] = $ccTrans;
				$counter += 1;
			}
		}
		
		//Dados da transação de Cartão de Crédito
		if (is_null($orderRequest->BoletoTransactionCollection)) {
			$order["BoletoTransactionCollection"] = null;
		}
		else if (is_array($orderRequest->BoletoTransactionCollection)) {
			$counter = 0;
			foreach($orderRequest->BoletoTransactionCollection as $boletoTransItem) {
				$boletoTrans = array();
				$boletoTrans["AmountInCents"] = $boletoTransItem->AmountInCents;
				$boletoTrans["BankNumber"] = $boletoTransItem->BankNumber;
				$boletoTrans["Instructions"] = $boletoTransItem->Instructions;
				$boletoTrans["NossoNumero"] = $boletoTransItem->NossoNumero;
				$boletoTrans["DaysToAddInBoletoExpirationDate"] = $boletoTransItem->DaysToAddInBoletoExpirationDate;
				
				$order["BoletoTransactionCollection"]["BoletoTransaction"][$counter] = $boletoTrans;
				$counter += 1;
			}
		}
		
		//Dados do ShoppingCart
		if (!is_null($orderRequest->ShoppingCartCollection)) {
			if (is_array($orderRequest->ShoppingCartCollection)) {
				$scCollection = array(); // Coleção ShopCart
				$scCounter = 0;

				// Copia cada objeto ShoppingCart
				foreach ($orderRequest->ShoppingCartCollection as $shopCart) {
					$newShopCart = array();
					$newShopCart["FreightCostInCents"] = $shopCart->FreightCostInCents;
					
					if (!is_null($shopCart->ShoppingCartItemCollection)) {
						if (is_array($shopCart->ShoppingCartItemCollection)) {
							$scItemCollection = array();
							$scItemCounter = 0;
							// Copia cada objeto ShoppingCartItem
							foreach ($shopCart->ShoppingCartItemCollection as $shopCartItem) {
								$newShopCartItem["Description"] = $shopCartItem->Description;
								$newShopCartItem["ItemReference"] = $shopCartItem->ItemReference;
								$newShopCartItem["Name"] = $shopCartItem->Name;
								$newShopCartItem["Quantity"] = $shopCartItem->Quantity;
								$newShopCartItem["TotalCostInCents"] = $shopCartItem->TotalCostInCents;
								$newShopCartItem["UnitCostInCents"] = $shopCartItem->UnitCostInCents;
								
								$scItemCollection["ShoppingCartItem"][$scItemCounter] = $newShopCartItem;
								$scItemCounter += 1;
							} // foreach (shopCartItem)
							
							$newShopCart["ShoppingCartItemCollection"] = $scItemCollection;
						} // if is_array
					} // if is_null
					
					$scCollection["ShoppingCart"][$scCounter] = $newShopCart;
					$scCounter += 1;
				} // foreach ($scCollection)
				
				$order["ShoppingCartCollection"] = $scCollection;
			}
		}
		
		$request["createOrderRequest"] = $order; // Adiciona o pedido na requisição

		return $request;
	}
	private function ConvertOrderResponse($orderResponse) {
		if (is_null($orderResponse)) { throw new Exception("Null response!"); }
		
		$response = new CreateOrderResponse();
		
		$response->BuyerKey = $orderResponse->BuyerKey;
		$response->MerchantKey = $orderResponse->MerchantKey;
		$response->MundiPaggTimeInMilliseconds = $orderResponse->MundiPaggTimeInMilliseconds;
		$response->OrderKey = $orderResponse->OrderKey;
		$response->OrderReference = $orderResponse->OrderReference;
		$response->OrderStatusEnum = $orderResponse->OrderStatusEnum;
		$response->RequestKey = $orderResponse->RequestKey;
		$response->Success = $orderResponse->Success;
		$response->Version = $orderResponse->Version;
		
		//// CreditCardTransactionResultCollection
		$ccTransCollection = array();
		$counter = 0;
		foreach ($orderResponse->CreditCardTransactionResultCollection as $ccTrans) {
			$newccTrans = new CreditCardTransactionResult;
			
			$newccTrans->AcquirerMessage = $ccTrans->AcquirerMessage;
			$newccTrans->AcquirerReturnCode = $ccTrans->AcquirerReturnCode;
			$newccTrans->AmountInCents = $ccTrans->AmountInCents;
			$newccTrans->AuthorizationCode = $ccTrans->AuthorizationCode;
			$newccTrans->AuthorizedAmountInCents = $ccTrans->AuthorizedAmountInCents;
			$newccTrans->CapturedAmountInCents = $ccTrans->CapturedAmountInCents;
			$newccTrans->CreditCardNumber = $ccTrans->CreditCardNumber;
			$newccTrans->CreditCardOperationEnum = $ccTrans->CreditCardOperationEnum;
			$newccTrans->CreditCardTransactionStatusEnum = $ccTrans->CreditCardTransactionStatusEnum;
			$newccTrans->CustomStatus = $ccTrans->CustomStatus;
			$newccTrans->DueDate = $ccTrans->DueDate;
			$newccTrans->ExternalTimeInMilliseconds = $ccTrans->ExternalTimeInMilliseconds;
			$newccTrans->InstantBuyKey = $ccTrans->InstantBuyKey;
			$newccTrans->RefundedAmountInCents = $ccTrans->RefundedAmountInCents;
			$newccTrans->Success = $ccTrans->Success;
			$newccTrans->TransactionIdentifier = $ccTrans->TransactionIdentifier;
			$newccTrans->TransactionKey = $ccTrans->TransactionKey;
			$newccTrans->TransactionReference = $ccTrans->TransactionReference;
			$newccTrans->UniqueSequentialNumber = $ccTrans->UniqueSequentialNumber;
			$newccTrans->VoidedAmountInCents = $ccTrans->VoidedAmountInCents;
			$newccTrans->OriginalAcquirerReturnCollection = $ccTrans->OriginalAcquirerReturnCollection;
			
			$ccTransCollection[$counter] = $ccTrans;
			$counter += 1;
		}
		
		$response->CreditCardTransactionResultCollection = $ccTransCollection;
		

		//// BoletoTransactionResultCollection
		$boletoTransCollection = array();
		$counter = 0;
		foreach ($orderResponse->BoletoTransactionResultCollection as $boletoTrans) {
			$newBoletoTrans = new BoletoTransactionResult();
			
			$newBoletoTrans->AmountInCents = $boletoTrans->AmountInCents;
			$newBoletoTrans->Barcode = $boletoTrans->Barcode;
			$newBoletoTrans->BoletoTransactionStatusEnum = $boletoTrans->BoletoTransactionStatusEnum;
			$newBoletoTrans->BoletoUrl = $boletoTrans->BoletoUrl;
			$newBoletoTrans->CustomStatus = $boletoTrans->CustomStatus;
			$newBoletoTrans->NossoNumero = $boletoTrans->NossoNumero;
			$newBoletoTrans->Success = $boletoTrans->Success;
			$newBoletoTrans->TransactionKey = $boletoTrans->TransactionKey;
			$newBoletoTrans->TransactionReference = $boletoTrans->TransactionReference;
			
			$boletoTransCollection[$counter] = $newBoletoTrans;
			$counter += 1;
		}
		
		$response->BoletoTransactionResultCollection = $boletoTransCollection;
		
		
		//// MundiPaggSuggestion
		$response->MundiPaggSuggestion = null;
		if (!is_null($orderResponse->MundiPaggSuggestion)) {
			$response->MundiPaggSuggestion = new MundiPaggSuggestion();
			$response->MundiPaggSuggestion->Code = $orderResponse->MundiPaggSuggestion->Code;
			$response->MundiPaggSuggestion->Message = $orderResponse->MundiPaggSuggestion->Message;
		}
		
		
		//// ErrorReport
		$response->ErrorReport = null;
		if (!is_null($orderResponse->ErrorReport)) {
			$response->ErrorReport = new ErrorReport();
			$response->ErrorReport->Category = $orderResponse->ErrorReport->Category;
			
			$response->ErrorReport->ErrorItemCollection = null;
			if (!is_null($orderResponse->ErrorReport->ErrorItemCollection)) {
				$counter = 0;
				foreach($orderResponse->ErrorReport->ErrorItemCollection as $errorItem) {
					$newErrorItem = new ErrorItem();
					$newErrorItem->Description = $errorItem->Description;
					$newErrorItem->ErrorCode = $errorItem->ErrorCode;
					$newErrorItem->ErrorField = $errorItem->ErrorField;
					$newErrorItem->SeverityCodeEnum = $errorItem->SeverityCodeEnum;
					
					$response->ErrorReport->ErrorItemCollection[$counter] = $newErrorItem;
					$counter += 1;
				}
			}
		}
		
		return $response;
	}

	private function ConvertManageOrderRequest(ManageOrderRequest $manageRequest) {
		$request = array();
		$order = array();
		
		$order["ManageOrderOperationEnum"] = $manageRequest->ManageOrderOperationEnum;
		$order["MerchantKey"] = $manageRequest->MerchantKey;
		$order["OrderKey"] = $manageRequest->OrderKey;
		$order["OrderReference"] = $manageRequest->OrderReference;
		$order["RequestKey"] = $manageRequest->RequestKey;
		
		//ManageCreditCardTransactionCollection
		if (!is_null($manageRequest->ManageCreditCardTransactionCollection)) {
			if (is_array($manageRequest->ManageCreditCardTransactionCollection)) {
				$mccTransCollection = array();
				$counter = 0;
				foreach ($manageRequest->ManageCreditCardTransactionCollection as $mccTrans) {
					$newmccTrans = array();
					
					$newmccTrans["AmountInCents"] = $mccTrans->AmountInCents;
					$newmccTrans["TransactionKey"] = $mccTrans->TransactionKey;
					$newmccTrans["TransactionReference"] = $mccTrans->TransactionReference;
					
					$mccTransCollection[$counter] = $newmccTrans;
					$counter += 1;
				}
				
				$order["ManageCreditCardTransactionCollection"] = $mccTransCollection;
			}
		}
		
		$request["manageOrderRequest"] = $order; // Adiciona o pedido na requisição
		
		return $request;
	}
	private function ConvertManageOrderResponse($manageResponse) {
		if (is_null($manageResponse)) { throw new Exception("Null response!"); }
		
		$response = new ManageOrderResponse();
		
		$response->ManageOrderOperationEnum = $manageResponse->ManageOrderOperationEnum;
		$response->MundiPaggTimeInMilliseconds = $manageResponse->MundiPaggTimeInMilliseconds;
		$response->OrderKey = $manageResponse->OrderKey;
		$response->OrderReference = $manageResponse->OrderReference;
		$response->OrderStatusEnum = $manageResponse->OrderStatusEnum;
		$response->RequestKey = $manageResponse->RequestKey;
		$response->Success = $manageResponse->Success;
		$response->Version = $manageResponse->Version;

		// MundiPaggSuggestion
		$response->MundiPaggSuggestion = null;
		if (!is_null($manageResponse->MundiPaggSuggestion)) {
			$response->MundiPaggSuggestion = new MundiPaggSuggestion();
			$response->MundiPaggSuggestion->Code = $manageResponse->MundiPaggSuggestion->Code;
			$response->MundiPaggSuggestion->Message = $manageResponse->MundiPaggSuggestion->Message;
		}
		
		// ErrorReport
		$response->ErrorReport = null;
		if (!is_null($manageResponse->ErrorReport)) {
			$response->ErrorReport = new ErrorReport();
			$response->ErrorReport->Category = $manageResponse->ErrorReport->Category;
			
			$response->ErrorReport->ErrorItemCollection = null;
			if (!is_null($manageResponse->ErrorReport->ErrorItemCollection)) {
				$counter = 0;
				foreach ($manageResponse->ErrorReport->ErrorItemCollection as $errorItem) {
					$newErrorItem = new ErrorItem();
					
					$newErrorItem->Description = $errorItem->Description;
					$newErrorItem->ErrorCode = $errorItem->ErrorCode;
					$newErrorItem->ErrorField = $errorItem->ErrorField;
					$newErrorItem->SeverityCodeEnum = $errorItem->SeverityCodeEnum;
					
					$response->ErrorReport->ErrorItemCollection[$counter] = $newErrorItem;
					$counter += 1;
				}
			}
		}
		
		
		// CreditCardTransactionResultCollection
		$response->CreditCardTransactionResultCollection = array();
		if (count($manageResponse->CreditCardTransactionResultCollection) > 0) {
			$counter = 0;
			foreach ($manageResponse->CreditCardTransactionResultCollection as $ccTransResult) {
				$newccTransResult = new CreditCardTransactionResult();
				
				$newccTransResult->AcquirerMessage = $ccTransResult->AcquirerMessage;
				$newccTransResult->AcquirerReturnCode = $ccTransResult->AcquirerReturnCode;
				$newccTransResult->AmountInCents = $ccTransResult->AmountInCents;
				$newccTransResult->AuthorizationCode = $ccTransResult->AuthorizationCode;
				$newccTransResult->AuthorizedAmountInCents = $ccTransResult->AuthorizedAmountInCents;
				$newccTransResult->CapturedAmountInCents = $ccTransResult->CapturedAmountInCents;
				$newccTransResult->CreditCardNumber = $ccTransResult->CreditCardNumber;
				$newccTransResult->CreditCardOperationEnum = $ccTransResult->CreditCardOperationEnum;
				$newccTransResult->CreditCardTransactionStatusEnum = $ccTransResult->CreditCardTransactionStatusEnum;
				$newccTransResult->CustomStatus = $ccTransResult->CustomStatus;
				$newccTransResult->DueDate = $ccTransResult->DueDate;
				$newccTransResult->ExternalTimeInMillisecods = $ccTransResult->ExternalTimeInMillisecods;
				$newccTransResult->InstantBuyKey = $ccTransResult->InstantBuyKey;
				$newccTransResult->RefundedAmountInCents = $ccTransResult->RefundedAmountInCents;
				$newccTransResult->Success = $ccTransResult->Success;
				$newccTransResult->TransactionIdentifier = $ccTransResult->TransactionIdentifier;
				$newccTransResult->TransactionKey = $ccTransResult->TransactionKey;
				$newccTransResult->TransactionReference = $ccTransResult->TransactionReference;
				$newccTransResult->UniqueSequentialNumber = $ccTransResult->UniqueSequentialNumber;
				$newccTransResult->VoidedAmountInCents = $ccTransResult->VoidedAmountInCents;
				
				$newccTransResult->OriginalAcquirerReturnCollection = null;
				if (!is_null($ccTransResult->OriginalAcquirerReturnCollection)) {
					foreach ($ccTransResult->OriginalAcquirerReturnCollection as $key => $value) {
						$newccTransResult->OriginalAcquirerReturnCollection[$key] = $value;
					}
				}

				$response->CreditCardTransactionResultCollection[$counter] = $newccTransResult;
				$counter += 1;
			}
		}
		
		
		// BoletoTransactionResultCollection
		$response->BoletoTransactionResultCollection = array();
		if (count($manageResponse->BoletoTransactionResultCollection) > 0) {
			$counter = 0;
			foreach ($manageResponse->BoletoTransactionResultCollection as $boletoTransResult) {
				$newBoletoTransResult = new BoletoTransactionResult();

				$newBoletoTransResult->AmountInCents = $boletoTransResult->AmountInCents;
				$newBoletoTransResult->Barcode = $boletoTransResult->Barcode;
				$newBoletoTransResult->BoletoTransactionStatusEnum = $boletoTransResult->BoletoTransactionStatusEnum;
				$newBoletoTransResult->BoletoUrl = $boletoTransResult->BoletoUrl;
				$newBoletoTransResult->CustomStatus = $boletoTransResult->CustomStatus;
				$newBoletoTransResult->NossoNumero = $boletoTransResult->NossoNumero;
				$newBoletoTransResult->Success = $boletoTransResult->Success;
				$newBoletoTransResult->TransactionKey = $boletoTransResult->TransactionKey;
				$newBoletoTransResult->TransactionReference = $boletoTransResult->TransactionReference;
			
				$response->BoletoTransactionResultCollection[$counter] = $newBoletoTransResult;
				$counter += 1;
			}
		}
		
		$response->BoletoTransactionResultCollection = $manageResponse->BoletoTransactionResultCollection;

		return $response;
	}
}
?>