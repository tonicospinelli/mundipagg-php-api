<?php
///////////////////////////////////////////////////////
////// REQUESTS ENTITIES //////////////////////////////
///////////////////////////////////////////////////////
function CreateOrder() {
	$orderRequest = new MundiPaggService_DataContracts_CreateOrderRequest();
	//$orderRequest = new stdClass();

	// Campos principais do objeto MundiPaggService_DataContracts_CreateOrderRequest
    $orderRequest->CurrencyIsoEnum = "BRL";
	$orderRequest->AmountInCents = 9;
	$orderRequest->AmountInCentsToConsiderPaid = 9;
	$orderRequest->Retries = 0;
	//$orderRequest->OrderReference = "SDK-PHP - Teste de Integracao - Matheus AR " . rand(0, 100000) ;
	$orderRequest->OrderReference = "";
	//$orderRequest->MundiPaggService_DataContracts_EmailUpdateToBuyerEnum = "No";
	
	// Chave de loja de exemplo, informe aqui sua chave de loja 
	$orderRequest->MerchantKey = MerchantKey;

	// BUYER
	$orderRequest->Buyer = CreateBuyer();
	
	//// CARTÃO
	$orderRequest->CreditCardTransactionCollection = array ( CreateCreditCardTransaction() );
	
	/// BOLETO
	$orderRequest->BoletoTransactionCollection = array ( CreateBoletoTransaction() );
	
	// SHOPPING CART
	$orderRequest->ShoppingCartCollection = array ( CreateShoppingCart );
	
	return $orderRequest;
}
function CreateBuyer() {
	$buyer = new MundiPaggService_DataContracts_Buyer();
	$buyer->Email = "alguem@algumacoisa.com.br";
	$buyer->GenderEnum = 'M';
	$buyer->MobilePhone = '2122465273';
	$buyer->Name = "Humberto da Silva";
	$buyer->PersonTypeEnum = 'Person';
	$buyer->TaxDocumentNumber = '21645798514';
	$buyer->TaxDocumentTypeEnum = 'CPF';
	
	$addr1 = new MundiPaggService_DataContracts_BuyerAddress();
	$addr1->AddressTypeEnum = MundiPaggService_DataContracts_AddressTypeEnum::Residential;
	$addr1->City = 'Rio de Janeiro';
	$addr1->Complement = 'Apto 203';
	$addr1->CountryEnum = MundiPaggService_DataContracts_CountryEnum::Brazil;
	$addr1->Number = 223;
	$addr1->State = 'RJ';
	$addr1->Street = 'Rua da Quitanda';
	$addr1->ZipCode = '14345709';
	
	$addr2 = new MundiPaggService_DataContracts_BuyerAddress();
	$addr2->AddressTypeEnum = MundiPaggService_DataContracts_AddressTypeEnum::Residential;
	$addr2->City = 'Sao Paulo';
	$addr2->Complement = 'Apto 501';
	$addr2->CountryEnum = MundiPaggService_DataContracts_CountryEnum::Brazil;
	$addr2->Number = 348;
	$addr2->State = 'SP';
	$addr2->Street = 'Rua da Qualquer Coisa';
	
	$buyer->BuyerAddressCollection = array( $addr1, $addr2 );
	
	return $buyer;
}
function CreateCreditCardTransaction() {
	// Criação de uma transação de cartão de crédito 
	$ccTransaction1 = new MundiPaggService_DataContracts_CreditCardTransaction();
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
	$ccTransaction1->CreditCardOperationEnum = "AuthAndCapture";
	
	return $ccTransaction1;
}
function CreateBoletoTransaction() {
	// Criação de uma transação por boleto
	$boletoTransaction1 = new MundiPaggService_DataContracts_BoletoTransaction();
	$boletoTransaction1->AmountInCents = 3000;
	$boletoTransaction1->BankNumber = 789;
	$boletoTransaction1->Instructions = "Nao receber apos vencimento.";
	$boletoTransaction1->NossoNumero = 47826;
	$boletoTransaction1->DaysToAddInBoletoExpirationDate = 5;
	
	return $boletoTransaction1;
}
function CreateShoppingCart() {
	$shopCart = new MundiPaggService_DataContracts_ShoppingCart();
	$shopCart->FreighCostInCents = 1000;
	$shopCartItem = new MundiPaggService_DataContracts_ShoppingCartItem();
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
	$ccTrans = new MundiPaggService_DataContracts_ManageCreditCardTransactionRequest();
	
	$ccTrans->AmountInCents = 100;
	$ccTrans->TransactionKey = "c4759866-ccaf-4533-a959-ce7c57880886";
	$ccTrans->TransactionReference = "EuSeiLaOra";
	
	return $ccTrans;
}

function CreateRetryOrderCreditCardTransactionRequest() {
	$ccTrans1 = new MundiPaggService_DataContracts_RetryOrderCreditCardTransactionRequest();
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

function CreateOrderData() {
	$orderData = new stdclass();
	
	$orderData->CreateDate = date("d/m/Y");
	$orderData->OrderKey = '123456';
	$orderData->OrderReference = 'MyOrder123';
	$orderData->OrderStatusEnum = 'Opened';
	$orderData->CreditCardTransactionDataCollection = CreateCreditCardTransactionDataCollection();
	$orderData->BoletoTransactionDataCollection = CreateBoletoTransactionDataCollection();
	
	return $orderData;
}

function CreateCreditCardTransactionData() {
	$creditCardTransactionData = new stdclass();
	
	$creditCardTransactionData->AcquirerAuthorizationCode = '2';
	$creditCardTransactionData->AcquirerName = 'SDK_TESTER';
	$creditCardTransactionData->AmountInCents = 10;
	$creditCardTransactionData->AuthorizedAmountInCents = 5;
	$creditCardTransactionData->CapturedAmountInCents = 20;
	$creditCardTransactionData->CreateDate = date("d/m/Y");
	$creditCardTransactionData->CreditCardBrandEnum = 'Visa';
	$creditCardTransactionData->CreditCardNumber = '299298737316';
	$creditCardTransactionData->CreditCardTransactionStatusEnum = 'AuthorizedPendingCapture';
	$creditCardTransactionData->CustomStatus = 'Authorized';
	$creditCardTransactionData->DueDate = date("d/m/Y");
	$creditCardTransactionData->InstallmentCount = 0;
	$creditCardTransactionData->InstantBuyKey = '9169FC79-50E2-4182-94CB-AAC0EB142062';
	$creditCardTransactionData->IsReccurrency = false;
	$creditCardTransactionData->RefundedAmountInCents = 300;
	$creditCardTransactionData->TransactionIdentifier = '111222333444';
	$creditCardTransactionData->TransactionKey = 'B1FE59C3-FED9-4153-A422-0FEB68306F5A';
	$creditCardTransactionData->TransactionReference = 'MyCreditCardTransaction123';
	$creditCardTransactionData->UniqueSequentialNumber = '654321';
	$creditCardTransactionData->VoidedAmountInCents = 99;
	
	return $creditCardTransactionData;
}

function CreateBoletoTransactionData() {
	$boletoTransactionData = new stdclass();
	
	$boletoTransactionData->AmountInCents = 15;
	$boletoTransactionData->AmountPaidInCents = 020;
	$boletoTransactionData->BankNumber = '29991002';
	$boletoTransactionData->Barcode = '00394009949303';
	$boletoTransactionData->BoletoTransactionStatusEnum = 'Generated';
	$boletoTransactionData->BoletoUrl = 'www.mundipagg.com';
	$boletoTransactionData->CreateDate = date("d/m/Y");
	$boletoTransactionData->CustomStatus = 'Opened';
	$boletoTransactionData->ExpirationDate = date("d/m/Y");
	$boletoTransactionData->NossoNumero = '200028818';
	$boletoTransactionData->TransactionKey = '27DBBB72-F730-4B8D-8504-2F83E4F47C19';
	$boletoTransactionData->TransactionReference = 'MyBoletoTransaction123';

	return $boletoTransactionData;
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

function CreateOrderDataCollection() {
	$orderData = CreateOrderData();
	$orderDataCollection = array ( $orderData );
	return $orderDataCollection;
}

function CreateCreditCardTransactionDataCollection() {
	$creditCardTransactionData = CreateCreditCardTransactionData();
	$creditCardTransactionDataCollection = array ( $creditCardTransactionData );
	return $creditCardTransactionDataCollection;
}

function CreateBoletoTransactionDataCollection() {
	$boletoTransactionData = CreateBoletoTransactionData();
	$boletoTransactionDataCollection = array ( $boletoTransactionData );
	return $boletoTransactionDataCollection;

}
