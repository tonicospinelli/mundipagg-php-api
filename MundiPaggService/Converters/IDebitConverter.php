<?php


/** Debit Converters Interface
*/
interface MundiPaggService_Converters_IDebitConverter {

	// Request Converters
	public function ConvertFromOnlineDebitRequest(MundiPaggService_DataContracts_Debit_OnlineDebitRequest $onlineDebitRequest);
	public function ConvertFromOrderRequest(MundiPaggService_DataContracts_Debit_OrderRequest $orderRequest);
	public function ConvertFromBuyerRequest(MundiPaggService_DataContracts_Debit_BuyerRequest $buyerRequest);
	public function ConvertFromPhoneRequestCollection(array $phoneRequestCollection);
	public function ConvertFromPhoneRequest(MundiPaggService_DataContracts_Debit_PhoneRequest $phoneRequest);
	public function ConvertFromBuyerAddressRequestCollection(array $buyerAddressCollection);
	public function ConvertFromBuyerAddressRequest(MundiPaggService_DataContracts_Debit_BuyerAddressRequest $buyerAddressRequest);

	// Response Converters
	public function ConvertToOnlineDebitResult($response);
	public function ConvertToErrorReport($response);
	public function ConvertToErrorItemCollection(array $responseArray);
	public function ConvertToErrorItem($response);
	public function ConvertToQueryOrderResponse($response);
	public function ConvertToOrderDataCollection(array $responseArray);
	public function ConvertToOrderData($response);
	public function ConvertToOnlineDebitTransactionDataCollection(array $responseArray);
	public function ConvertToOnlineDebitTransactionData($response);
}
