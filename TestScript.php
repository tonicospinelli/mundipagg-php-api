<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "\\MundiPaggServiceConfiguration.php";
include_once $SERVICE_CLIENT . "MundiPaggSoapServiceClient.php";

$ENABLE_WSDL_CACHE = false; // In MundiPaggServiceConfiguration.php

//$client = new MundiPaggSoapServiceClient();
$client = new MundiPaggSoapServiceClient('LOCAL',null,true);
//$client = new MundiPaggSoapServiceClient(null, null, true);

$orderRequest = CreateCreateOrder(); // Creates an order
$orderResponse = $client->CreateOrder($orderRequest);
var_dump($orderResponse);

// $manageRequest = CreateManageOrder("fde8193b-583c-41b8-8479-a91ddd70ae00");
// $manageResponse = $client->ManageOrder($manageRequest);
// var_dump ($manageResponse);

// //$retryRequest = CreateRetryOrder($orderResponse->OrderKey);
// $retryRequest = CreateRetryOrder("c4759866-ccaf-4533-a959-ce7c57880886");
// $retryResponse = $client->RetryOrder($retryRequest);
// var_dump($retryResponse);

// $queryRequest = CreateQueryOrder("1708090b-b345-46d1-8af6-e7292f1f4bbb");
// //$queryRequest = CreateQueryOrder("c4759866-ccaf-4533-a959-ce7c57880881"); // Não existe.
// $queryResponse = $client->QueryOrder($queryRequest);
// var_dump($queryResponse, $queryResponse->OrderDataCollection[0]);


// $instantBuyDataRequest = CreateGetInstantBuyData("85126373-6eb2-4b6f-851b-80bd520bccdf");
// $instantBuyDataResponse = $client->GetInstantBuyData($instantBuyDataRequest);
// var_dump($instantBuyDataResponse);



echo "Request:<br>";
echo $client->GetRequestData();
echo "<br><br><br>";
echo "Response:<br>";
echo $client->GetResponseData();

$files = $client->SaveRequestResponseData('C:\\Users\\mriboli\\Desktop\\PHP-SDK XML\\');
var_dump($files);

exit();


function CreateCreateOrder() {
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
	
	//// CARTÃO 1
	// Criação de uma transação de cartão de crédito 
	$ccTransaction1 = new CreditCardTransaction();
	$ccTransaction1->AmountInCents = 9;
	$ccTransaction1->CreditCardNumber = "518294741544019";
	// Número do cartão de crédito
	$ccTransaction1->HolderName = "Maria do Carmo";
	$ccTransaction1->SecurityCode = 197;
	$ccTransaction1->ExpMonth = 10;
	$ccTransaction1->ExpYear = 17;
	$ccTransaction1->CreditCardBrandEnum = 'Visa';
	$ccTransaction1->PaymentMethodCode = 1;
	// Define o tipo da autorização
	$ccTransaction1->CreditCardOperationEnum = "AuthOnly";
	
	//// CARTÃO 2
	// Criação de uma transação de cartão de crédito 
	$ccTransaction2 = new CreditCardTransaction();
	$ccTransaction2->AmountInCents = 20;
	$ccTransaction2->CreditCardNumber = "65444454544112";
	// Número do cartão de crédito
	$ccTransaction2->HolderName = "Jose Farias";
	$ccTransaction2->SecurityCode = 546;
	$ccTransaction2->ExpMonth = 8;
	$ccTransaction2->ExpYear = 19;
	$ccTransaction2->CreditCardBrandEnum = 'Mastercard';
	$ccTransaction2->PaymentMethodCode = 1;
	// Define o tipo da autorização
	$ccTransaction1->CreditCardOperationEnum = "AuthOnly";
	
	//// CARTÃO 3
	// Criação de uma transação de cartão de crédito 
	$ccTransaction3 = new CreditCardTransaction();
	$ccTransaction3->AmountInCents = 15;
	$ccTransaction3->CreditCardNumber = "331211415454441";
	// Número do cartão de crédito
	$ccTransaction3->HolderName = "Somebody da Silva";
	$ccTransaction3->SecurityCode = 523;
	$ccTransaction3->ExpMonth = 11;
	$ccTransaction3->ExpYear = 17;
	$ccTransaction3->CreditCardBrandEnum = 'Elo';
	$ccTransaction3->PaymentMethodCode = 1;
	// Define o tipo da autorização
	$ccTransaction3->CreditCardOperationEnum = "AuthAndCapture";
	
	/// BOLETO 1
	// Criação de uma transação por boleto
	$boletoTransaction1 = new BoletoTransaction();
	$boletoTransaction1->AmountInCents = 3000;
	$boletoTransaction1->BankNumber = 789;
	$boletoTransaction1->Instructions = "Nao receber apos vencimento.";
	$boletoTransaction1->NossoNumero = 47826;
	$boletoTransaction1->DaysToAddInBoletoExpirationDate = 5;
	
	/// BOLETO 2
	// Criação de uma transação por boleto
	$boletoTransaction2 = new BoletoTransaction();
	$boletoTransaction2->AmountInCents = 5000;
	$boletoTransaction2->BankNumber = 641;
	$boletoTransaction2->Instructions = "Nao receber apos vencimento.";
	$boletoTransaction2->NossoNumero = 55411;
	$boletoTransaction2->DaysToAddInBoletoExpirationDate = 9;

	// Adiciona as transações no OrderRequest
	$orderRequest->CreditCardTransactionCollection = array ( $ccTransaction1, $ccTransaction2, $ccTransaction3 );
	//$orderRequest->BoletoTransactionCollection = array ( $boletoTransaction1/*, $boletoTransaction2*/ );

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

function CreateManageOrder($orderKey) {
	$manageRequest = new ManageOrderRequest();
	
	$manageRequest->OrderKey = $orderKey;
	
	//$manageRequest->ManageOrderOperationEnum = ManageOrderOperationEnum::Capture;
	$manageRequest->ManageOrderOperationEnum = ManageOrderOperationEnum::Void;
	
	return $manageRequest;
}

function CreateRetryOrder($orderKey) {
	$retryRequest = new RetryOrderRequest();
	$retryRequest->OrderKey = $orderKey;
	
	return $retryRequest;
}

function CreateQueryOrder($orderKey) {
	$queryRequest = new QueryOrderRequest();
	
	$queryRequest->OrderKey = $orderKey;
	
	return $queryRequest;
}

function CreateGetInstantBuyData($buyerKey) {
	$instantBuyRequest = new GetInstantBuyDataRequest();
	
	$instantBuyRequest->BuyerKey = $buyerKey;

	return $instantBuyRequest;
}
?>