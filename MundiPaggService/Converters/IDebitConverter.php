<?php


/** Debit Converters Interface
*/
interface IDebitConverter {

	// Request Converters
	public function ConvertFromOnlineDebitRequest(OnlineDebitRequest $onlineDebitRequest);
	public function ConvertFromOrderRequest(OrderRequest $orderRequest);
	public function ConvertFromBuyerRequest(BuyerRequest $buyerRequest);
	public function ConvertFromPhoneRequestCollection(array $phoneRequestCollection);
	public function ConvertFromPhoneRequest(PhoneRequest $phoneRequest);
	public function ConvertFromBuyerAddressRequestCollection(array $buyerAddressCollection);
	public function ConvertFromBuyerAddressRequest(BuyerAddressRequest $buyerAddressRequest);

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
