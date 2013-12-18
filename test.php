<HTML>
<BODY>
<?php
// Includes the ServiceClient files
include_once $_SERVER["DOCUMENT_ROOT"] . "\\MundiPaggServiceConfiguration.php";
include_once $SERVICE_CLIENT . "MundiPaggSoapServiceClient.php";

// Creates an order request
$orderRequest = new CreateOrderRequest();

$orderRequest->CurrencyIsoEnum = "BRL";
$orderRequest->AmountInCents = 1099; // R$ 10,99
$orderRequest->AmountInCentsToConsiderPaid = 1099; // R$ 10,99
$orderRequest->Retries = 0;
$orderRequest->OrderReference = "My Order 999954321";
// Your merchant key
//$orderRequest->MerchantKey = "8A2DD57F-1ED9-4153-B4CE-69683EFADAD5";
$orderRequest->MerchantKey = "00000000-0000-0000-0000-000000000000";

// // Creates a credit card transaction
// $ccTransaction1 = new CreditCardTransaction();
// $ccTransaction1->AmountInCents = 1099; // R$ 10,99
// $ccTransaction1->CreditCardNumber = "55544412311";
// $ccTransaction1->HolderName = "Maria do Carmo";
// $ccTransaction1->SecurityCode = 197;
// $ccTransaction1->ExpMonth = 10;
// $ccTransaction1->ExpYear = 17;
// $ccTransaction1->CreditCardBrandEnum = 'Visa';
// $ccTransaction1->PaymentMethodCode = 1; // Simulator
// $ccTransaction1->TransactionReference = "My custom transaction identifier"; // Can also be empty
// // Authorization type (AuthOnly, AuthAndCapture, AuthAndCaptureWithDelay)
// $ccTransaction1->CreditCardOperationEnum = "AuthAndCapture";

// // Add the credit card transaction to the order
// $orderRequest->CreditCardTransactionCollection = array ( $ccTransaction1 );

// Creates a boleto transaction
$boletoTransaction1 = new BoletoTransaction();
$boletoTransaction1->AmountInCents = 3000;
$boletoTransaction1->BankNumber = 789;
$boletoTransaction1->Instructions = "Nao receber apos vencimento.";
$boletoTransaction1->NossoNumero = 47826;
$boletoTransaction1->DaysToAddInBoletoExpirationDate = 5;

// Add the boleto transaction to the order
$orderRequest->BoletoTransactionCollection = array ( $boletoTransaction1 );

// Creates the client
$client = new MundiPaggSoapServiceClient();
//$client = new MundiPaggSoapServiceClient(null, null, true);

// Sends the order
$orderResponse = $client->CreateOrder($orderRequest);

var_dump ($orderResponse);

if (is_null($orderResponse->ErrorReport) == false) {
	var_dump($orderResponse->ErrorReport);
}
?>
</BODY>
</HTML>