<?php
include_once "Enum.php";

class BoletoTransaction {
	public $AmountInCents; // long
	public $BankNumber; // string
	public $DaysToAddInBoletoExpirationDate; // Nullable<int>
	public $Instructions; // string
	public $NossoNumero; // string
	public $TransactionReference; // string
	
	function __construct() {
		$this->AmountInCents = 0;
		$this->BankNumber = null;
		$this->DaysToAddInBoletoExpirationDate = 0;
		$this->Instructions = "";
		$this->NossoNumero = null;
		$this->TransactionReference = null;
	}
}
?>