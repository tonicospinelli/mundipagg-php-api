<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "\\Variables.php";
include_once $ENTITY . "RetryOrderCreditCardTransactionRequest.php";

class RetryOrderRequest {
	public $MerchantKey; // Guid
	public $OrderKey; // Guid
	public $OrderReference; // string
	public $RequestKey; // Guid
	public $RetryOrderCreditCardTransactionRequestCollection; // RetryOrderCreditCardTransactionRequest[]
	
	function __construct() {
		$this->MerchantKey = null;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->RequestKey = null;
		$this->RetryOrderCreditCardTransactionRequestCollection = null;
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .=  "MerchantKey: " . $this->MerchantKey . NEWLINE;
		$str .=  "OrderKey: " . $this->OrderKey . NEWLINE;
		$str .=  "OrderReference: " . $this->OrderReference . NEWLINE;
		$str .=  "RequestKey: " . $this->RequestKey . NEWLINE;
		
		if (is_array($this->RetryOrderCreditCardTransactionRequestCollection)) {
			foreach($this->RetryOrderCreditCardTransactionRequestCollection as $ccTrans) {
				$str .=  "RetryOrderCreditCardTransactionRequest: " . $ccTrans . NEWLINE;
			}
		}
		
		return $str;
	}
}
?>