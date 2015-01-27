<?php

/**
* @author: Matheus
* @version: 1.0
* revision: 2013/12/04
*/
interface MundiPaggService_ServiceClient_IClient {

	/**
	* Closes the client.
	*/
	public function Close();
	
	/**
	* Creates an order in MundiPagg One.
	* @param MundiPaggService_DataContracts_CreateOrderRequest $createOrderRequest The order to be created.
	*/
	public function CreateOrder(MundiPaggService_DataContracts_CreateOrderRequest $createOrderRequest);

	/**
	* Manages an order in MundiPagg One.
	* @param MundiPaggService_DataContracts_ManageOrderRequest $manageOrderRequest The order to be managed.
	*/
	public function ManageOrder(MundiPaggService_DataContracts_ManageOrderRequest $manageOrderRequest);
	
	/**
	* Retries an order in MundiPagg One.
	* @param MundiPaggService_DataContracts_RetryOrderRequest $retryOrderRequest The order to be retried.
	*/
	public function RetryOrder(MundiPaggService_DataContracts_RetryOrderRequest $retryOrderRequest);
	
	/**
	* Returns all information about an order in MundiPagg One.
	* @param MundiPaggService_DataContracts_QueryOrderRequest $queryOrderRequest The order to be returned.
	*/
	public function QueryOrder(MundiPaggService_DataContracts_QueryOrderRequest $queryOrderRequest);

	/**
	* Returns information about a buyer's credit cards.
	* @param MundiPaggService_DataContracts_GetInstantBuyDataRequest $getInstantBuyDataRequest The order to be created.
	*/
	public function GetInstantBuyData(MundiPaggService_DataContracts_GetInstantBuyDataRequest $getInstantBuyDataRequest);
}
