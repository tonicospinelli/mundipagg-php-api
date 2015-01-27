<?php

/** Converters Interface
*/
interface MundiPaggService_Converters_IRestConverter {
	/** MAIN CONVERTERS 
	*/
	public function ConvertOrderRequest(MundiPaggService_DataContracts_CreateOrderRequest $orderRequest);
	public function ConvertOrderResponse($orderResponse);

	public function ConvertManageOrderRequest(MundiPaggService_DataContracts_ManageOrderRequest $manageRequest);
	public function ConvertManageOrderResponse($manageResponse);

	public function ConvertRetryOrderRequest(MundiPaggService_DataContracts_RetryOrderRequest $retryRequest);
	public function ConvertRetryOrderResponse($retryResponse);

	public function ConvertQueryOrderRequest(MundiPaggService_DataContracts_QueryOrderRequest $queryRequest);
	public function ConvertQueryOrderResponse($queryResponse);

	public function ConvertGetInstantBuyDataRequest(MundiPaggService_DataContracts_GetInstantBuyDataRequest $instantBuyRequest);
	public function ConvertGetInstantBuyDataResponse($instantBuyResponse);

	
	/* REQUEST CONVERTERS (SdkClasses to Arrays)
	*/	
	public function ConvertBuyerFromRequest(MundiPaggService_DataContracts_Buyer $buyerRequest);
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
