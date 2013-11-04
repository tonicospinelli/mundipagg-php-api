<?php
class ManageCreditCardTransactionRequest {
	public $AmountInCents; // long
	public $TransactionKey; // Guid
	public $TransactionReference; // string
	
	function __construct() {
		$this->AmountInCents = 0;
		$this->TransactionKey = null;
		$this->TransactionReference = "";
	}
}
?>