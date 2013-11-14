<?php
class RetryOrderCreditCardTransactionRequest {
	public $SecurityCode; // string
	public $TransactionKey; // Guid
	
	function __construct() {
		$this->SecurityCode = "";
		$this->TransactionKey = null;
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .=  "SecurityCode: " . $this->SecurityCode . NEWLINE;
		$str .=  "TransactionKey: " . $this->TransactionKey . NEWLINE;
		
		return $str;
	}
}
?>