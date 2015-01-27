<?php

/**
* @author: Matheus
* @version: 1.0
* revision: 2014/09/09
*/
interface MundiPaggService_ServiceClient_IDebitClient {

	/**
	* Creates an order.
	* @param MundiPaggService_DataContracts_Debit_OnlineDebitRequest $onlineDebitRequest The order to be created.
	*/
	public function CreateOrder(MundiPaggService_DataContracts_Debit_OnlineDebitRequest $onlineDebitRequest);

	/**
	* Gets an order.
	* @param String $orderIdentification The order to be returned.
	* @param Guid $merchantKey (Optional) The merchant identification.
	*/
	public function QueryOrder($orderIdentification, $merchantKey = NULL);
}
