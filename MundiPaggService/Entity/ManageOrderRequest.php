<?php
include_once "Enum.php";
include_once "ManageCreditCardTransactionRequest.php";

class ManageOrderRequest {
	public $ManageCreditCardTransactionCollection; // ManageCreditCardTransactionRequest[]
	public $ManageOrderOperationEnum; // ManageOrderOperationEnum
	public $MerchantKey; // Guid
	public $OrderKey; // Guid
	public $OrderReference; // string
	public $RequestKey; // Guid
	
	function __construct() {
		$this->ManageCreditCardTransactionCollection = null;
		$this->ManageOrderOperationEnum = ManageOrderOperationEnum::__default;
		$this->MerchantKey = null;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->RequestKey = null;
	}
}
?>