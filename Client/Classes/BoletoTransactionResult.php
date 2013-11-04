<?php
include_once "Enum.php";

class BoletoTransactionResult {
	public $AmountInCents; // long
	public $Barcode; //string
	public $BoletoTransactionStatusEnum; // BoletoTransactionStatusEnum
	public $BoletoUrl; // string
	public $CustomStatus; // string
	public $NossoNumero; // string
	public $Success; // bool
	public $TransactionKey; // Guid
	public $TransactionReference; // string
}
?>