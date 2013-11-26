<?php
$_SERVER["DOCUMENT_ROOT"] = "C:\\wamp\\www";
include_once $_SERVER["DOCUMENT_ROOT"] . "\\MundiPaggServiceConfiguration.php";
include_once "AuxFuncions.php";
include_once $CONVERTERS . "SoapConverter.php";

const MerchantKey = "8A2DD57F-1ED9-4153-B4CE-69683EFADAD5";

class ConverterTest extends PHPUnit_Framework_TestCase {

	///////////////////////////////////////////////////////
	////// REQUEST CONVERTERS (Entities to Arrays) ////////
	///////////////////////////////////////////////////////
	function testConvertBuyerFromRequest() {
		$converter = new SoapConverter();
		$buyer = CreateBuyer();
		
		// Buyer convertido para array
		$convBuyer = $converter->ConvertBuyerFromRequest($buyer);
		
		$this->assertEquals($buyer->BuyerKey, $convBuyer["BuyerKey"]);
		$this->assertEquals($buyer->BuyerReference, $convBuyer["BuyerReference"]);
		if (!is_null($buyer->CreateDateInMerchant)) {
			$this->assertEquals($buyer->CreateDateInMerchant, $convBuyer["CreateDateInMerchant"]);
		}
		$this->assertEquals($buyer->Email, $convBuyer["Email"]);
		$this->assertEquals($buyer->FacebookId, $convBuyer["FacebookId"]);
		if (!is_null($buyer->GenderEnum)) {
			$this->assertEquals($buyer->GenderEnum, $convBuyer["GenderEnum"]);
		}
		$this->assertEquals($buyer->HomePhone, $convBuyer["HomePhone"]);
		$this->assertEquals($buyer->IpAddress, $convBuyer["IpAddress"]);
		if (!is_null($buyer->LastBuyerUpdateInMerchant)) {
			$this->assertEquals($buyer->LastBuyerUpdateInMerchant, $convBuyer["LastBuyerUpdateInMerchant"]);
		}
		$this->assertEquals($buyer->MobilePhone, $convBuyer["MobilePhone"]);
		$this->assertEquals($buyer->Name, $convBuyer["Name"]);
		if (!is_null($buyer->PersonTypeEnum)) {
			$this->assertEquals($buyer->PersonTypeEnum, $convBuyer["PersonTypeEnum"]);
		}
		$this->assertEquals($buyer->TaxDocumentNumber, $convBuyer["TaxDocumentNumber"]);
		if (!is_null($buyer->TaxDocumentTypeEnum)) {
			$this->assertEquals($buyer->TaxDocumentTypeEnum, $convBuyer["TaxDocumentTypeEnum"]);
		}
		$this->assertEquals($buyer->TwitterId, $convBuyer["TwitterId"]);
		$this->assertEquals($buyer->WorkPhone, $convBuyer["WorkPhone"]);
		
		return;
		// Compara os endereços
		if (!is_null($buyer->BuyerAddressCollection)) {
			for($counter = 0; $counter < count($buyer->BuyerAddressCollection); $counter++) {
				$buyAddress = $buyer->BuyerAddressCollection[$counter];
				$convBuyAddress = $convBuyer["BuyerAddressCollection"]["BuyerAddress"][$counter];
				
				$this->assertEquals($buyAddress->AddressTypeEnum, $convBuyAddress->AddressTypeEnum);
				$this->assertEquals($buyAddress->City, $convBuyAddress->City);
				$this->assertEquals($buyAddress->Complement, $convBuyAddress->Complement);
				$this->assertEquals($buyAddress->CountryEnum, $convBuyAddress->CountryEnum);
				$this->assertEquals($buyAddress->District, $convBuyAddress->District);
				$this->assertEquals($buyAddress->Number, $convBuyAddress->Number);
				$this->assertEquals($buyAddress->State, $convBuyAddress->State);
				$this->assertEquals($buyAddress->Street, $convBuyAddress->Street);
				$this->assertEquals($buyAddress->ZipCode, $convBuyAddress->ZipCode);
			}
		}
	}
	
	function testConvertCreditCardTransactionCollectionFromRequest() {
		$converter = new SoapConverter();
		$ccTransCollection = CreateCreditCardTransactionCollection(); // Criar método para instanciar a collection
		$convccTransCollection = $converter->ConvertCreditCardTransactionCollectionFromRequest($ccTransCollection);
		
		$count = count($ccTransCollection);
		$convCount = count($convccTransCollection);
		
		$this->assertEquals($count, $convCount);
		
		for($counter = 0; $counter < $count; $counter++) {
			$ccTrans = $ccTransCollection[$counter];
			$convccTrans = $convccTransCollection["CreditCardTransaction"][$counter];
			
			$this->assertEquals($ccTrans->AmountInCents, $convccTrans["AmountInCents"]);
			$this->assertEquals($ccTrans->CreditCardNumber, $convccTrans["CreditCardNumber"]);
			$this->assertEquals($ccTrans->InstallmentCount, $convccTrans["InstallmentCount"]);
			$this->assertEquals($ccTrans->HolderName, $convccTrans["HolderName"]);
			$this->assertEquals($ccTrans->SecurityCode, $convccTrans["SecurityCode"]);
			$this->assertEquals($ccTrans->ExpMonth, $convccTrans["ExpMonth"]);
			$this->assertEquals($ccTrans->ExpYear, $convccTrans["ExpYear"]);
			$this->assertEquals($ccTrans->CreditCardBrandEnum, $convccTrans["CreditCardBrandEnum"]);
			$this->assertEquals($ccTrans->PaymentMethodCode, $convccTrans["PaymentMethodCode"]);
			$this->assertEquals($ccTrans->CreditCardOperationEnum, $convccTrans["CreditCardOperationEnum"]);
		}
	}
	
	function testConvertBoletoTransactionCollectionFromRequest() {
		$converter = new SoapConverter();
		$boletoTransCollection = CreateBoletoTransactionCollection();
		$convBoletoTransCollection = $converter->ConvertBoletoTransactionCollectionFromRequest($boletoTransCollection);
		
		$count = count($boletoTransCollection);
		$convCount = count($convBoletoTransCollection);
		
		$this->assertEquals($count, $convCount);
		
		for($counter = 0; $counter < $count; $counter++) {
			$boletoTrans = $boletoTransCollection[$counter];
			$convBoletoTrans = $convBoletoTransCollection["BoletoTransaction"][$counter];
			
			$this->assertEquals($boletoTrans->AmountInCents, $convBoletoTrans["AmountInCents"]);
			$this->assertEquals($boletoTrans->BankNumber, $convBoletoTrans["BankNumber"]);
			$this->assertEquals($boletoTrans->Instructions, $convBoletoTrans["Instructions"]);
			$this->assertEquals($boletoTrans->NossoNumero, $convBoletoTrans["NossoNumero"]);
			$this->assertEquals($boletoTrans->DaysToAddInBoletoExpirationDate, $convBoletoTrans["DaysToAddInBoletoExpirationDate"]);
		}
	}
	
	function testConvertShoppingCartCollectionFromRequest() {
		$converter = new SoapConverter();
		$shopCartCollection = CreateShoppingCartCollection();
		$convShopCartCollection = $converter->ConvertShoppingCartCollectionFromRequest($shopCartCollection);

		$count = count($shopCartCollection);
		$convCount = count($convShopCartCollection);
		
		$this->assertEquals($count, $convCount);
		
		for($counter = 0; $counter < $count; $counter++) {
			$shopCart = $shopCartCollection[$counter];
			$convShopCart = $convShopCartCollection["ShoppingCart"][$counter];
			
			$this->assertEquals($shopCart->FreightCostInCents, $convShopCart["FreightCostInCents"]);
			
			if (!isset($shopCart->ShoppingCartItemCollection) && !is_null($shopCart->ShoppingCartItemCollection)) {
				continue;
			}

			$itemCount = count($shopCart->ShoppingCartItemCollection);
			$convItemCount = count($convShopCart["ShoppingCartItemCollection"]);
			
			$this->assertEquals($itemCount, $convItemCount);
			
			for($itemCounter = 0; $itemCounter < $itemCount; $itemCounter++) {
				$item = $shopCart->ShoppingCartItemCollection[$itemCounter];
				$convItem = $convShopCart["ShoppingCartItemCollection"]["ShoppingCartItem"][$itemCounter];
				
				$this->assertEquals($item->Description, $convItem["Description"]);
				$this->assertEquals($item->ItemReference, $convItem["ItemReference"]);
				$this->assertEquals($item->Name, $convItem["Name"]);
				$this->assertEquals($item->Quantity, $convItem["Quantity"]);
				$this->assertEquals($item->TotalCostInCents, $convItem["TotalCostInCents"]);
				$this->assertEquals($item->UnitCostInCents, $convItem["UnitCostInCents"]);
			}
		}
	}
	
	function testConvertManageCreditCardTransactionCollectionFromRequest() {
		$converter = new SoapConverter();
		$ccTransCollection = CreateManageCreditCardTransactionRequestCollection();
		$convccTransCollection = $converter->ConvertManageCreditCardTransactionCollectionFromRequest($ccTransCollection);
		
		$count = count($ccTransCollection);
		$convCount = count($convccTransCollection);
		
		//echo "\n$count\n$convCount\n";
		//return;
		
		$this->assertEquals($count, $convCount);
		
		for($counter = 0; $counter < $count; $counter++) {
			$ccTrans = $ccTransCollection[$counter];
			$convccTrans = $convccTransCollection[$counter];
			
			$this->assertEquals($ccTrans->AmountInCents, $convccTrans["AmountInCents"]);
			$this->assertEquals($ccTrans->TransactionKey, $convccTrans["TransactionKey"]);
			$this->assertEquals($ccTrans->TransactionReference, $convccTrans["TransactionReference"]);
		}
	}

	function testConvertRetryOrderCreditCardTransactionRequestCollectionFromRequest() {
		$converter = new SoapConverter();
		$ccTransCollection = CreateRetryOrderCreditCardTransactionRequestCollection();
		$convccTransCollection = $converter->ConvertRetryOrderCreditCardTransactionRequestCollectionFromRequest($ccTransCollection);
		
		$count = count($ccTransCollection);
		$convCount = count($convccTransCollection);
		
		$this->assertEquals($count, $convCount);
		
		for($counter = 0; $counter < $count; $counter++) {
			$ccTrans  = $ccTransCollection[$counter];
			$convccTrans = $convccTransCollection["RetryOrderCreditCardTransactionRequest"][$counter];
			
			$this->assertEquals($ccTrans->SecurityCode, $convccTrans["SecurityCode"]);
			$this->assertEquals($ccTrans->TransactionKey, $convccTrans["TransactionKey"]);
		}
	}


	///////////////////////////////////////////////////////
	////// RESPONSE CONVERTERS (stdClasses to Entities) ///
	///////////////////////////////////////////////////////
	public function testConvertCreditCardTransactionResultCollectionFromResponse() {
		$converter = new SoapConverter();
		$ccTransResultCollection = CreateCreditCardTransactionResultCollection();
		$convccTransResultCollection = $converter->ConvertCreditCardTransactionResultCollectionFromResponse($ccTransResultCollection);
		
		$count = count($ccTransResultCollection);
		$convCount = count($convccTransResultCollection);
		
		$this->assertEquals($count, $convCount);
		
		for($counter = 0; $counter < $count; $counter++) {
			$ccTransResult = $ccTransResultCollection[$counter];
			$convccTransResult = $convccTransResultCollection[$counter];
	
			$this->assertEquals($ccTransResult->AcquirerMessage, $convccTransResult->AcquirerMessage);
			$this->assertEquals($ccTransResult->AcquirerReturnCode, $convccTransResult->AcquirerReturnCode);
			$this->assertEquals($ccTransResult->AmountInCents, $convccTransResult->AmountInCents);
			$this->assertEquals($ccTransResult->AuthorizationCode, $convccTransResult->AuthorizationCode);
			$this->assertEquals($ccTransResult->AuthorizedAmountInCents, $convccTransResult->AuthorizedAmountInCents);
			$this->assertEquals($ccTransResult->CapturedAmountInCents, $convccTransResult->CapturedAmountInCents);
			$this->assertEquals($ccTransResult->CreditCardNumber, $convccTransResult->CreditCardNumber);
			$this->assertEquals($ccTransResult->CreditCardOperationEnum, $convccTransResult->CreditCardOperationEnum);
			$this->assertEquals($ccTransResult->CreditCardTransactionStatusEnum, $convccTransResult->CreditCardTransactionStatusEnum);
			$this->assertEquals($ccTransResult->CustomStatus, $convccTransResult->CustomStatus);
			$this->assertEquals($ccTransResult->DueDate, $convccTransResult->DueDate);
			$this->assertEquals($ccTransResult->ExternalTimeInMilliseconds, $convccTransResult->ExternalTimeInMilliseconds);
			$this->assertEquals($ccTransResult->InstantBuyKey, $convccTransResult->InstantBuyKey);
			$this->assertEquals($ccTransResult->RefundedAmountInCents, $convccTransResult->RefundedAmountInCents);
			$this->assertEquals($ccTransResult->Success, $convccTransResult->Success);
			$this->assertEquals($ccTransResult->TransactionIdentifier, $convccTransResult->TransactionIdentifier);
			$this->assertEquals($ccTransResult->TransactionKey, $convccTransResult->TransactionKey);
			$this->assertEquals($ccTransResult->TransactionReference, $convccTransResult->TransactionReference);
			$this->assertEquals($ccTransResult->UniqueSequentialNumber, $convccTransResult->UniqueSequentialNumber);
			$this->assertEquals($ccTransResult->VoidedAmountInCents, $convccTransResult->VoidedAmountInCents);
			$this->assertEquals($ccTransResult->OriginalAcquirerReturnCollection, $convccTransResult->OriginalAcquirerReturnCollection);
		}
	}
	
	public function testConvertBoletoTransactionResultCollectionFromResponse() {
		$converter = new SoapConverter();
		$boletoTransResultCollection = CreateBoletoTransactionResultCollection();
		$convBoletoTransResultCollection = $converter->ConvertBoletoTransactionResultCollectionFromResponse($boletoTransResultCollection);
		
		$count = count($boletoTransResultCollection);
		$convCount = count($convBoletoTransResultCollection);
		
		$this->assertEquals($count, $convCount);
		
		for($counter = 0; $counter < $count; $counter++) {
			$boletoTransResult = $boletoTransResultCollection[$counter];
			$convBoletoTransResult = $convBoletoTransResultCollection[$counter];
			
			$this->assertEquals($boletoTransResult->AmountInCents, $convBoletoTransResult->AmountInCents);
			$this->assertEquals($boletoTransResult->Barcode, $convBoletoTransResult->Barcode);
			$this->assertEquals($boletoTransResult->BoletoTransactionStatusEnum, $convBoletoTransResult->BoletoTransactionStatusEnum);
			$this->assertEquals($boletoTransResult->BoletoUrl, $convBoletoTransResult->BoletoUrl);
			$this->assertEquals($boletoTransResult->CustomStatus, $convBoletoTransResult->CustomStatus);
			$this->assertEquals($boletoTransResult->NossoNumero, $convBoletoTransResult->NossoNumero);
			$this->assertEquals($boletoTransResult->Success, $convBoletoTransResult->Success);
			$this->assertEquals($boletoTransResult->TransactionKey, $convBoletoTransResult->TransactionKey);
			$this->assertEquals($boletoTransResult->TransactionReference, $convBoletoTransResult->TransactionReference);
		}
	}
	
	public function testConvertMundiPaggSuggestionFromResponse() {
		$converter = new SoapConverter();
		$mundiPaggSuggestion = CreateMundiPaggSuggestion();
		$convMundiPaggSuggestion = $converter->ConvertMundiPaggSuggestionFromResponse($mundiPaggSuggestion);
		
		$this->assertEquals($mundiPaggSuggestion->Code, $convMundiPaggSuggestion->Code);
		$this->assertEquals($mundiPaggSuggestion->Message, $convMundiPaggSuggestion->Message);
	}
	
	public function testConvertErrorReportFromResponse() {
		$converter = new SoapConverter();
		$errorReport = CreateErrorReport();
		$convErrorReport = $converter->ConvertErrorReportFromResponse($errorReport);

		$this->assertEquals($errorReport->Category, $convErrorReport->Category);
		
		$count = count($errorReport->ErrorItemCollection);
		$convCount = count($convErrorReport->ErrorItemCollection);
		
		$this->assertEquals($count, $convCount);
		
		for($counter = 0; $counter < $count; $counter++) {
			$errorItem = $errorReport->ErrorItemCollection[$counter];
			$convErrorItem = $convErrorReport->ErrorItemCollection[$counter];
			
			$this->assertEquals($errorItem->Description, $convErrorItem->Description);
			$this->assertEquals($errorItem->ErrorCode, $convErrorItem->ErrorCode);
			$this->assertEquals($errorItem->ErrorField, $convErrorItem->ErrorField);
			$this->assertEquals($errorItem->SeverityCodeEnum, $convErrorItem->SeverityCodeEnum);
		}
	}
	
	public function ConvertOrderDataCollectionFromResponse() {
		$converter = new SoapConverter();
		$orderDataCollection = CreateOrderDataCollection();
		$convOrderDataCollection = $converter->ConvertOrderDataCollectionFromResponse($orderDataCollection);
		
		
		foreach ($orderDataCollection as $orderData) {
			$newOrderData = new OrderData();
			
			$newOrderData->CreateDate = $orderData->CreateDate;
			$newOrderData->OrderKey = $orderData->OrderKey;
			$newOrderData->OrderReference = $orderData->OrderReference;
			$newOrderData->OrderStatusEnum = $orderData->OrderStatusEnum;
			
			$newOrderData->CreditCardTransactionDataCollection = $this->ConvertCreditCardTransactionDataCollectionFromResponse($orderData->CreditCardTransactionDataCollection);
			$newOrderData->BoletoTransactionDataCollection = $this->ConvertBoletoTransactionDataCollectionFromResponse($orderData->BoletoTransactionDataCollection);
			
			$newOrderDataCollection[$counter] = $newOrderData;
			$counter += 1;
		}
		
		return $newOrderDataCollection;
	}

	/*
	public function ConvertCreditCardTransactionDataCollectionFromResponse($creditCardTransactionDataCollection) {
		$newCreditCardTransactionDataCollection = array();
		
		$counter = 0;
		foreach($creditCardTransactionDataCollection as $ccTransData) {
			$newccTransData = new CreditCardTransactionData();
			
			$newccTransData->AcquirerAuthorizationCode = $ccTransData->AcquirerAuthorizationCode;
			$newccTransData->AcquirerName = $ccTransData->AcquirerName;
			$newccTransData->AmountInCents = $ccTransData->AmountInCents;
			$newccTransData->AuthorizedAmountInCents = $ccTransData->AuthorizedAmountInCents;
			$newccTransData->CapturedAmountInCents = $ccTransData->CapturedAmountInCents;
			$newccTransData->CreateDate = $ccTransData->CreateDate;
			$newccTransData->CreditCardBrandEnum = $ccTransData->CreditCardBrandEnum;
			$newccTransData->CreditCardNumber = $ccTransData->CreditCardNumber;
			$newccTransData->CreditCardTransactionStatusEnum = $ccTransData->CreditCardTransactionStatusEnum;
			$newccTransData->CustomStatus = $ccTransData->CustomStatus;
			$newccTransData->DueDate = $ccTransData->DueDate;
			$newccTransData->InstallmentCount = $ccTransData->InstallmentCount;
			$newccTransData->InstantBuyKey = $ccTransData->InstantBuyKey;
			$newccTransData->IsReccurrency = $ccTransData->IsReccurrency;
			$newccTransData->RefundedAmountInCents = $ccTransData->RefundedAmountInCents;
			$newccTransData->TransactionIdentifier = $ccTransData->TransactionIdentifier;
			$newccTransData->TransactionKey = $ccTransData->TransactionKey;
			$newccTransData->TransactionReference = $ccTransData->TransactionReference;
			$newccTransData->UniqueSequentialNumber = $ccTransData->UniqueSequentialNumber;
			$newccTransData->VoidedAmountInCents = $ccTransData->VoidedAmountInCents;
			
			$newCreditCardTransactionDataCollection[$counter] = $newccTransData;
			$counter += 1;
		}
		
		return $newCreditCardTransactionDataCollection;
	}
	public function ConvertBoletoTransactionDataCollectionFromResponse($boletoTransactionDataCollection) {
		$newBoletoTransactionDataCollection = array();
		
		$counter = 0;
		foreach($boletoTransactionDataCollection as $boletoTransData) {
			$newBoletoTransData = new BoletoTransactionData();
			
			$newBoletoTransData->AmountInCents = $boletoTransData->AmountInCents;
			$newBoletoTransData->AmountPaidInCents = $boletoTransData->AmountPaidInCents;
			$newBoletoTransData->BankNumber = $boletoTransData->BankNumber;
			$newBoletoTransData->Barcode = $boletoTransData->Barcode;
			$newBoletoTransData->BoletoTransactionStatusEnum = $boletoTransData->BoletoTransactionStatusEnum;
			$newBoletoTransData->BoletoUrl = $boletoTransData->BoletoUrl;
			$newBoletoTransData->CreateDate = $boletoTransData->CreateDate;
			$newBoletoTransData->CustomStatus = $boletoTransData->CustomStatus;
			$newBoletoTransData->ExpirationDate = $boletoTransData->ExpirationDate;
			$newBoletoTransData->NossoNumero = $boletoTransData->NossoNumero;
			$newBoletoTransData->TransactionKey = $boletoTransData->TransactionKey;
			$newBoletoTransData->TransactionReference = $boletoTransData->TransactionReference;
			
			$newBoletoTransactionDataCollection[$counter] = $newBoletoTransData;
			$counter += 1;
		}
		
		return $newBoletoTransactionDataCollection;
	}
	public function ConvertCreditCardDataCollectionFromResponse($creditCardDataCollection) {
		$newCreditCardDataCollection = array();
		
		$counter = 0;
		foreach($creditCardDataCollection as $ccData) {
			$newccData = new BoletoTransactionData();
			
			$newccData->CreditCardBrandEnum = $ccData->CreditCardBrandEnum;
			$newccData->CreditCardNumber = $ccData->CreditCardNumber;
			$newccData->InstantBuyKey = $ccData->InstantBuyKey;
			$newccData->IsExpiredCreditCard = $ccData->IsExpiredCreditCard;
			
			$newCreditCardDataCollection[$counter] = $newccData;
			$counter += 1;
		}
		
		return $newCreditCardDataCollection;
	}

	*/
}
?>