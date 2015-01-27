<?php

/** Converters Interface
*/
interface ISoapConverter {
	/** MAIN CONVERTERS 
	*/
	public function ConvertOrderRequest(CreateOrderRequest $orderRequest);
	public function ConvertOrderResponse($orderResponse);

	public function ConvertManageOrderRequest(ManageOrderRequest $manageRequest);
	public function ConvertManageOrderResponse($manageResponse);

	public function ConvertRetryOrderRequest(RetryOrderRequest $retryRequest);
	public function ConvertRetryOrderResponse($retryResponse);

	public function ConvertQueryOrderRequest(QueryOrderRequest $queryRequest);
	public function ConvertQueryOrderResponse($queryResponse);

	public function ConvertGetInstantBuyDataRequest(GetInstantBuyDataRequest $instantBuyRequest);
	public function ConvertGetInstantBuyDataResponse($instantBuyResponse);

	
	/* REQUEST CONVERTERS (SdkClasses to Arrays)
	*/	
	public function ConvertBuyerFromRequest(Buyer $buyerRequest);
	public function ConvertCreditCardTransactionCollectionFromRequest($creditCardTransactionCollectionRequest);
	public function ConvertBoletoTransactionCollectionFromRequest($boletoTransactionCollectionRequest);
	public function ConvertShoppingCartCollectionFromRequest($shoppingCartCollectionRequest);
	public function ConvertManageCreditCardTransactionCollectionFromRequest($creditCardTransactionCollectionRequest);
	public function ConvertRetryOrderCreditCardTransactionRequestCollectionFromRequest($creditCardTransactionRequestCollection);

	/* RESPONSE CONVERTERS (stdClasses to SdkClasses)
	*/	
	public function ConvertCreditCardTransactionResultCollectionFromResponse($creditCardTransactionResultCollection);
	public function ConvertBoletoTransactionResultCollectionFromResponse($boletoTransactionResultCollection);
	public function ConvertMundiPaggSuggestionFromResponse($suggestionResponse);
	public function ConvertErrorReportFromResponse($errorReport);
	public function ConvertOrderDataCollectionFromResponse($orderDataCollection);
	public function ConvertCreditCardTransactionDataCollectionFromResponse($creditCardTransactionDataCollection);
	public function ConvertBoletoTransactionDataCollectionFromResponse($boletoTransactionDataCollection);
	public function ConvertCreditCardDataCollectionFromResponse($creditCardDataCollection);
}
