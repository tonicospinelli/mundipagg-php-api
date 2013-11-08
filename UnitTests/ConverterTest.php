<?php
include_once "C:\wamp\www\Sdk\UnitTests\AuxFuncions.php";
include_once "..\Client\Converter.php";

const MerchantKey = "8A2DD57F-1ED9-4153-B4CE-69683EFADAD5";

class ConverterTest extends PHPUnit_Framework_TestCase {
	function testConvertBuyerFromRequest() {
		$buyer = CreateBuyer();
		
		// Buyer convertido para array
		$convBuyer = ConvertBuyerFromRequest($buyer);
		
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
		$ccTransCollection = CreateCreditCardTransactionCollection(); // Criar método para instanciar a collection
		$convccTransCollection = ConvertCreditCardTransactionCollectionFromRequest($ccTransCollection);
		
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
		$boletoTransCollection = CreateBoletoTransactionCollection();
		$convBoletoTransCollection = ConvertBoletoTransactionCollectionFromRequest($boletoTransCollection);
		
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
		$shopCartCollection = CreateShoppingCartCollection();
		$convShopCartCollection = ConvertShoppingCartCollectionFromRequest($shopCartCollection);

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
		$ccTransCollection = CreateManageCreditCardTransactionRequestCollection();
		$convccTransCollection = ConvertManageCreditCardTransactionCollectionFromRequest($ccTransCollection);
		
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
	
	/*
	function testConvertRetryOrderCreditCardTransactionRequestCollectionFromRequest($creditCardTransactionRequestCollection) {
		$newccTransCollection = array();
		$counter = 0;
		foreach ($creditCardTransactionRequestCollection as $ccTransRequest) {
			$newccTransRequest = array();
			$newccTransRequest["SecurityCode"] = $ccTransRequest->SecurityCode;
			$newccTransRequest["TransactionKey"] = $ccTransRequest->TransactionKey;

			$newccTransCollection["RetryOrderCreditCardTransactionRequest"][$counter] = $newcckTransRequest;
			$counter += 1;
		}
		
		return $newccTransCollection;
	}
	*/
}
?>