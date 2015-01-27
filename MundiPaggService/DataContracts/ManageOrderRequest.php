<?php

class MundiPaggService_DataContracts_ManageOrderRequest {
	/*@var [MundiPaggService_DataContracts_ManageCreditCardTransactionRequest] CreditCard Transaction Collection */
	public $ManageCreditCardTransactionCollection;
	/*@var [ManageOrderOperation] Order Operation */
	public $ManageOrderOperationEnum; 
	/*@var [Guid] Merchant Key */
	public $MerchantKey;
	/*@var [Guid] Order Key */
	public $OrderKey;
	/*@var [string] Order Reference */
	public $OrderReference;
	/*@var [Guid] Request Key */
	public $RequestKey;
	
	function __construct() {
		$this->ManageCreditCardTransactionCollection = null;
		$this->ManageOrderOperationEnum = MundiPaggService_DataContracts_ManageOrderOperationEnum::__default;
		$this->MerchantKey = constant("MP_MERCHANT_KEY");
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->RequestKey = null;
	}
}
