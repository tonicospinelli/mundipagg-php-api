<?php
include_once "Enum.php";

class BoletoTransactionData {
	public $AmountInCents; // long
	public $AmountPaidInCents; // long
	public $BankNumber; // string
	public $Barcode; // string
	public $BoletoTransactionStatusEnum; // BoletoTransactionStatusEnum
	public $BoletoUrl; // string
	public $CreateDate; // DateTime
	public $CustomStatus; // string
	public $ExpirationDate; // DateTime
	public $NossoNumero; // string
	public $TransactionKey; // Guid
	public $TransactionReference; // string
	
	function __construct() {
		$this->AmountInCents = 0;
		$this->AmountPaidInCents = 0;
		$this->BankNumber = "";
		$this->Barcode = "";
		$this->BoletoTransactionStatusEnum = BoletoTransactionStatusEnum::__default;
		$this->BoletoUrl = "";
		$this->CreateDate = null;
		$this->CustomStatus = "";
		$this->ExpirationDate = null;
		$this->NossoNumero = "";
		$this->TransactionKey = null;
		$this->TransactionReference = "";
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .=  "AmountInCents: " . $this->AmountInCents . NEWLINE;
		$str .=  "AmountPaidInCents: " . $this->AmountPaidInCents . NEWLINE;
		$str .=  "BankNumber: " . $this->BankNumber . NEWLINE;
		$str .=  "Barcode: " . $this->Barcode . NEWLINE;
		$str .=  "BoletoTransactionStatusEnum: " . $this->BoletoTransactionStatusEnum . NEWLINE;
		$str .=  "BoletoUrl: " . $this->BoletoUrl . NEWLINE;
		$str .=  "CreateDate: " . $this->CreateDate . NEWLINE;
		$str .=  "CustomStatus: " . $this->CustomStatus . NEWLINE;
		$str .=  "ExpirationDate: " . $this->ExpirationDate . NEWLINE;
		$str .=  "NossoNumero: " . $this->NossoNumero . NEWLINE;
		$str .=  "TransactionKey: " . $this->TransactionKey . NEWLINE;
		$str .=  "TransactionReference: " . $this->TransactionReference . NEWLINE;
		
		return $str;
	}
}
?>