<?php
///////////////////////////////////////////////////////
////// REQUESTS ENTITIES //////////////////////////////
///////////////////////////////////////////////////////
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

	// BUYER
	$orderRequest->Buyer = CreateBuyer();
	
	//// CARTГO
	$orderRequest->CreditCardTransactionCollection = array ( CreateCreditCardTransaction() );
	
	/// BOLETO
	$orderRequest->BoletoTransactionCollection = array ( CreateBoletoTransaction() );
	
	// SHOPPING CART
	$orderRequest->ShoppingCartCollection = array ( CreateShoppingCart );
	
	return $orderRequest;
}
function CreateBuyer() {
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
	
	return $buyer;
}
function CreateCreditCardTransaction() {
	// Criaзгo de uma transaзгo de cartгo de crйdito 
	$ccTransaction1 = new CreditCardTransaction();
	$ccTransaction1->AmountInCents = 9;
	$ccTransaction1->CreditCardNumber = "518294741544019";
	// Nъmero do cartгo de crйdito
	$ccTransaction1->HolderName = "Maria do Carmo";
	$ccTransaction1->SecurityCode = 197;
	$ccTransaction1->ExpMonth = 10;
	$ccTransaction1->ExpYear = 17;
	$ccTransaction1->CreditCardBrandEnum = 'Visa';
	$ccTransaction1->PaymentMethodCode = 1;
	// Define o tipo da autorizaзгo
	$ccTransaction1->CreditCardOperationEnum = "AuthAndCapture";
	
	return $ccTransaction1;
}
function CreateBoletoTransaction() {
	// Criaзгo de uma transaзгo por boleto
	$boletoTransaction1 = new BoletoTransaction();
	$boletoTransaction1->AmountInCents = 3000;
	$boletoTransaction1->BankNumber = 789;
	$boletoTransaction1->Instructions = "Nao receber apos vencimento.";
	$boletoTransaction1->NossoNumero = 47826;
	$boletoTransaction1->DaysToAddInBoletoExpirationDate = 5;
	
	return $boletoTransaction1;
}
function CreateShoppingCart() {
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
	
	return $shopCart;
}

function CreateManageCreditCardTransactionRequest() {
	$ccTrans = new ManageCreditCardTransactionRequest();
	
	$ccTrans->AmountInCents = 100;
	$ccTrans->TransactionKey = "c4759866-ccaf-4533-a959-ce7c57880886";
	$ccTrans->TransactionReference = "EuSeiLaOra";
	
	return $ccTrans;
}

function CreateRetryOrderCreditCardTransactionRequest() {
	$ccTrans1 = new RetryOrderCreditCardTransactionRequest();
	$ccTrans1->SecurityCode = 123;
	$ccTrans1->TransactionKey = "c4759866-ccaf-4533-a959-ce7c57880886";
	
	return $ccTrans1;
}


///////////////////////////////////////////////////////
////// REQUEST COLLECTIONS ////////////////////////////
///////////////////////////////////////////////////////
function CreateCreditCardTransactionCollection() {
	$ccTrans1 = CreateCreditCardTransaction();
	$ccTransCollection = array( $ccTrans1 );
	return $ccTransCollection;
}
function CreateBoletoTransactionCollection() {
	$boletoTrans1 = CreateBoletoTransaction();
	$boletoTransCollection = array( $boletoTrans1 );
	return $boletoTransCollection;
}
function CreateShoppingCartCollection() {
	$shopCart1 = CreateShoppingCart();
	$shopCartCollection = array ( $shopCart1 );
	return $shopCartCollection;
}

function CreateManageCreditCardTransactionRequestCollection() {
	$ccTrans1 = CreateManageCreditCardTransactionRequest();
	$ccTransCollection = array ( $ccTrans1 );
	return $ccTransCollection;
}

function CreateRetryOrderCreditCardTransactionRequestCollection() {
	$ccTrans1 = CreateRetryOrderCreditCardTransactionRequest();
	$ccTransCollection = array ( $ccTrans1 );
	return $ccTransCollection;
}


///////////////////////////////////////////////////////
////// RESPONSE STDCLASSES ////////////////////////////
///////////////////////////////////////////////////////
function CreateCreditCardTransactionResult() {
	$ccTransResult = new stdclass();
	
	$ccTransResult->AcquirerMessage = 'Teste';
	$ccTransResult->AcquirerReturnCode = 2;
	$ccTransResult->AmountInCents = 20000;
	$ccTransResult->AuthorizationCode = 5;
	$ccTransResult->AuthorizedAmountInCents = 30000;
	$ccTransResult->CapturedAmountInCents = 10000;
	$ccTransResult->CreditCardNumber = '12345646512211';
	$ccTransResult->CreditCardOperationEnum = 'AuthAndCapture';
	$ccTransResult->CreditCardTransactionStatusEnum = 'Captured';
	$ccTransResult->CustomStatus = 'Paid';
	$ccTransResult->DueDate = null;
	$ccTransResult->ExternalTimeInMilliseconds = 2009;
	$ccTransResult->InstantBuyKey = "00000-000-0000-00000-00000000";
	$ccTransResult->RefundedAmountInCents = 500;
	$ccTransResult->Success = true;
	$ccTransResult->TransactionIdentifier = "1";
	$ccTransResult->TransactionKey = "11111-1111-1111-111111111-11111";
	$ccTransResult->TransactionReference = "Nothing Really";
	$ccTransResult->UniqueSequentialNumber = "1234567890";
	$ccTransResult->VoidedAmountInCents = 400;
	$ccTransResult->OriginalAcquirerReturnCollection = array ( "algo" => "seila" );
	
	return $ccTransResult;
}

function CreateBoletoTransactionResult() {
	$boletoTrans = new stdclass();
	
	$boletoTrans->AmountInCents = 10000;
	$boletoTrans->Barcode = "8888";
	$boletoTrans->BoletoTransactionStatusEnum = 'Paid';
	$boletoTrans->BoletoUrl = 'www.mundipagg.com';
	$boletoTrans->CustomStatus = 'Paid';
	$boletoTrans->NossoNumero = '12121245';
	$boletoTrans->Success = true;
	$boletoTrans->TransactionKey = "5555515-1121121-45556-4511515-44454";
	$boletoTrans->TransactionReference = "SeiLa";
	
	return $boletoTrans;
}

function CreateMundiPaggSuggestion() {
	$suggestion = new stdclass();

	$suggestion->Code = 200;
	$suggestion->Message = "Mensagem";
	
	return $suggestion;
}

function CreateErrorReport() {
	$errorReport = new stdclass();
	
	$errorReport->Category = "Teste";
	
	$errorItem1 = new stdclass();
	$errorItem1->Description = "So testando...";
	$errorItem1->ErrorCode = 12;
	$errorItem1->ErrorField = "Nada";
	$errorItem1->SeverityCodeEnum = "Error";
	
	$errorItem2 = new stdclass();
	$errorItem2->Description = "Nada alem de um teste";
	$errorItem2->ErrorCode = 400;
	$errorItem2->ErrorField = "Hein";
	$errorItem2->SeverityCodeEnum = "Warning";
	
	$errorReport->ErrorItemCollection = array ( $errorItem1, $errorItem2 );

	return $errorReport;
}

///////////////////////////////////////////////////////
////// RESPONSE COLLECTIONS ///////////////////////////
///////////////////////////////////////////////////////
function CreateCreditCardTransactionResultCollection() {
	$ccTrans1 = CreateCreditCardTransactionResult();
	$ccTransCollection = array ( $ccTrans1 );
	return $ccTransCollection;
}

function CreateBoletoTransactionResultCollection() {
	$boletoTrans1 = CreateBoletoTransactionResult();
	$boletoTransCollection = array ( $boletoTrans1 );
	return $boletoTransCollection;
}

?>