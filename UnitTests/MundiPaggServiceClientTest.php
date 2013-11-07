<?php
include_once "..\Client\MundiPaggServiceClient.php";

const MerchantKey = "8A2DD57F-1ED9-4153-B4CE-69683EFADAD5";

class MundiPaggServiceClientTest extends PHPUnit_Framework_TestCase {
	function testCreateOrder() {
		$orderRequest = CreateOrder();
		
		$client = new MundiPaggServiceClient();
		$orderResponse = $client->CreateOrder($orderRequest);
		
		$this->assertEquals(MerchantKey, $orderResponse->MerchantKey);
		$this->assertEquals(OrderStatusEnum::Paid, $orderResponse->OrderStatusEnum);
		$this->assertEquals(true, $orderResponse->Success);
		$this->assertEquals('1.0', $orderResponse->Version);
		$this->assertNull($orderResponse->MundiPaggSuggestion);
		$this->assertNull($orderResponse->ErrorReport);
	
	}


}

function CreateOrder() {
	$orderRequest = new CreateOrderRequest();
	//$orderRequest = new stdClass();

	// Campos principais do objeto CreateOrderRequest
    $orderRequest->CurrencyIsoEnum = "BRL";
	$orderRequest->AmountInCents = 9;
	$orderRequest->AmountInCentsToConsiderPaid = 9;
	$orderRequest->Retries = 0;
	//$orderRequest->OrderReference = "SDK-PHP - Teste de Integracao - Matheus AR " . rand(0, 100000) ;
	$orderRequest->OrderReference = "";
	//$orderRequest->EmailUpdateToBuyerEnum = "No";
	
	// Chave de loja de exemplo, informe aqui sua chave de loja 
	$orderRequest->MerchantKey = MerchantKey;

	$buyer = new Buyer();
	$buyer->Email = "alguem@algumacoisa.com.br";
	$buyer->GenderEnum = 'M';
	$buyer->MobilePhone = '2122465273';
	$buyer->Name = "Humberto da Silva";
	$buyer->PersonTypeEnum = 'Person';
	$buyer->TaxDocumentNumber = '21645798514';
	$buyer->TaxDocumentTypeEnum = 'CPF';
	
	$addr1 = new BuyerAddress();
	$addr1->AddressTypeEnum = AddressTypeEnum::Residential;
	$addr1->City = 'Rio de Janeiro';
	$addr1->Complement = 'Apto 203';
	$addr1->CountryEnum = CountryEnum::Brazil;
	$addr1->Number = 223;
	$addr1->State = 'RJ';
	$addr1->Street = 'Rua da Quitanda';
	$addr1->ZipCode = '14345709';
	
	$addr2 = new BuyerAddress();
	$addr2->AddressTypeEnum = AddressTypeEnum::Residential;
	$addr2->City = 'Sao Paulo';
	$addr2->Complement = 'Apto 501';
	$addr2->CountryEnum = CountryEnum::Brazil;
	$addr2->Number = 348;
	$addr2->State = 'SP';
	$addr2->Street = 'Rua da Qualquer Coisa';
	
	$buyer->BuyerAddressCollection = array( $addr1, $addr2 );
	
	$orderRequest->Buyer = $buyer;
	
	//// CARTУO 1
	// Criaчуo de uma transaчуo de cartуo de crщdito 
	$ccTransaction1 = new CreditCardTransaction();
	$ccTransaction1->AmountInCents = 9;
	$ccTransaction1->CreditCardNumber = "518294741544019";
	// Nњmero do cartуo de crщdito
	$ccTransaction1->HolderName = "Maria do Carmo";
	$ccTransaction1->SecurityCode = 197;
	$ccTransaction1->ExpMonth = 10;
	$ccTransaction1->ExpYear = 17;
	$ccTransaction1->CreditCardBrandEnum = 'Visa';
	$ccTransaction1->PaymentMethodCode = 1;
	// Define o tipo da autorizaчуo
	$ccTransaction1->CreditCardOperationEnum = "AuthOnly";
	
	/// BOLETO 1
	// Criaчуo de uma transaчуo por boleto
	$boletoTransaction1 = new BoletoTransaction();
	$boletoTransaction1->AmountInCents = 3000;
	$boletoTransaction1->BankNumber = 789;
	$boletoTransaction1->Instructions = "Nao receber apos vencimento.";
	$boletoTransaction1->NossoNumero = 47826;
	$boletoTransaction1->DaysToAddInBoletoExpirationDate = 5;

	// Adiciona as transaчѕes no OrderRequest
	$orderRequest->CreditCardTransactionCollection = array ( $ccTransaction1 );
	$orderRequest->BoletoTransactionCollection = array ( $boletoTransaction1 );

	$shopCart = new ShoppingCart();
	$shopCart->FreighCostInCents = 1000;
	$shopCartItem = new ShoppingCartItem();
	$shopCartItem->Description = "Teste";
	$shopCartItem->Name = "Teste";
	$shopCartItem->Quantity = 3;
	$shopCartItem->TotalCostInCents = 300;
	$shopCartItem->UnitCostInCents = 100;
	$shopCartItem->ItemReference = "Teste";
	$shopCart->ShoppingCartItemCollection = array ( $shopCartItem );
	
	$orderRequest->ShoppingCartCollection = array ( $shopCart );
	
	return $orderRequest;
}
?>