<?php
include_once "MundiPaggServiceClient.php";

const MerchantKey = "8A2DD57F-1ED9-4153-B4CE-69683EFADAD5";

$orderRequest = CreateOrder(); // Creates an order

//echo $orderRequest;

$client = new MundiPaggServiceClient();

$client->CreateOrder($orderRequest);
//$client->ConvertOrderRequest($orderRequest);

function CreateOrder() {
	$orderRequest = new CreateOrderRequest();
	//$orderRequest = new stdClass();

	// Campos principais do objeto CreateOrderRequest
    $orderRequest->CurrencyIsoEnum = CurrencyIsoEnum::BRL;
	$orderRequest->AmountInCents = 2000;
	$orderRequest->Retries = 0;
	$orderRequest->OrderReference = "SDK-PHP - Teste de integracao - Matheus AR";

	// Chave de loja de exemplo, informe aqui sua chave de loja 
	$orderRequest->MerchantKey = MerchantKey;

	//// CARTУO 1
	// Criaчуo de uma transaчуo de cartуo de crщdito 
	$ccTransaction1 = new CreditCardTransaction();
	$ccTransaction1->AmountInCents = 2000;
	$ccTransaction1->CreditCardNumber = "1234567890123456";
	// Nњmero do cartуo de crщdito
	$ccTransaction1->HolderName = "Maria do Carmo";
	$ccTransaction1->SecurityCode = "123";
	$ccTransaction1->ExpMonth = 10;
	$ccTransaction1->ExpYear = 17;
	$ccTransaction1->CreditCardBrandEnum = 'Visa';
	$ccTransaction1->PaymentMethodCode = 1;
	// Define o tipo da autorizaчуo
	$ccTransaction1->CreditCardOperationEnum = 'AuthAndCapture';
	
	/// BOLETO 1
	// Criaчуo de uma transaчуo por boleto
	$boletoTransaction1 = new BoletoTransaction();
	$boletoTransaction1->AmountInCents = 3000;
	$boletoTransaction1->BankNumber = "789";
	$boletoTransaction1->Instructions = "Nao receber apos vencimento.";
	$boletoTransaction1->NossoNumero = "47826";
	$boletoTransaction1->DaysToAddInBoletoExpirationDate = 5;

	// Adiciona as transaчѕes no OrderRequest
	$orderRequest->CreditCardTransactionCollection = array ( $ccTransaction1 );
	//$orderRequest->BoletoTransactionCollection = array ( 0 => $boletoTransaction1 );
	$orderRequest->BoletoTransactionCollection = array (null);
	$orderRequest->ShoppingCart = array(null);
	
	
	return $orderRequest;
}


?>