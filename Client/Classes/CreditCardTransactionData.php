<?php
include_once "Enum.php";

class CreditCardTransactionData {
	public $AcquirerAuthorizationCode; // string
	public $AcquirerName; // string
	public $AmountInCents; // long
	public $AuthorizedAmountInCents; // Nullable<long>
	public $CapturedAmountInCents; // Nullable<long>
	public $CreateDate; // DateTime
	public $CreditCardBrandEnum; // CreditCardBrandEnum
	public $CreditCardNumber; // string
	public $CreditCardTransactionStatusEnum; // CreditCardTransactionStatusEnum
	public $CustomStatus; // string
	public $DueDate; // Nullable<DateTime>
	public $InstallmentCount; // int
	public $InstantBuyKey; // Guid
	public $IsReccurrency; // bool
	public $RefundedAmountInCents; // Nullable<long>
	public $TransactionIdentifier; // string
	public $TransactionKey; // Guid
	public $TransactionReference; // string
	public $UniqueSequentialNumber; // string
	public $VoidedAmountInCents; // Nullable<long>
	
	function __construct() {
		$this->AcquirerAuthorizationCode = "";
		$this->AcquirerName = "";
		$this->AmountInCents = 0;
		$this->AuthorizedAmountInCents = null;
		$this->CapturedAmountInCents = null;
		$this->CreateDate = null;
		$this->CreditCardBrandEnum = CreditCardBrandEnum::__default;
		$this->CreditCardNumber = "";
		$this->CreditCardTransactionStatusEnum = CreditCardTransactionStatusEnum::__default;
		$this->CustomStatus = "";
		$this->DueDate = null;
		$this->InstallmentCount = 0;
		$this->InstantBuyKey = null;
		$this->IsReccurency = false;
		$this->RefundedAmountInCents = null;
		$this->TransactionIdentifier = "";
		$this->TransactionKey = null;
		$this->TransactionReference = "";
		$this->UniqueSequentialNumber = "";
		$this->VoidedAmountInCents = null;
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .=  "AcquirerAuthorizationCode: " . $this->AcquirerAuthorizationCode . NEWLINE;
		$str .=  "AcquirerName: " . $this->AcquirerName . NEWLINE;
		$str .=  "AmountInCents: " . $this->AmountInCents . NEWLINE;
		$str .=  "AuthorizedAmountInCents: " . $this->AuthorizedAmountInCents . NEWLINE;
		$str .=  "CreateDate: " . $this->CreateDate . NEWLINE;
		$str .=  "CreditCardBrandEnum: " . $this->CreditCardBrandEnum . NEWLINE;
		$str .=  "CreditCardNumber: " . $this->CreditCardNumber . NEWLINE;
		$str .=  "OrderReference: " . $this->OrderReference . NEWLINE;
		$str .=  "CreditCardTransactionStatusEnum: " . $this->CreditCardTransactionStatusEnum . NEWLINE;
		$str .=  "CustomStatus: " . $this->CustomStatus . NEWLINE;
		$str .=  "DueDate: " . $this->DueDate . NEWLINE;
		$str .=  "InstallmentCount: " . $this->InstallmentCount . NEWLINE;
		$str .=  "InstantBuyKey: " . $this->InstantBuyKey . NEWLINE;
		$str .=  "IsReccurrency: " . $this->IsReccurrency . NEWLINE;
		$str .=  "RefundedAmountInCents: " . $this->RefundedAmountInCents . NEWLINE;
		$str .=  "TransactionIdentifier: " . $this->TransactionIdentifier . NEWLINE;
		$str .=  "TransactionKey: " . $this->TransactionKey . NEWLINE;
		$str .=  "TransactionReference: " . $this->TransactionReference . NEWLINE;
		$str .=  "UniqueSequentialNumber: " . $this->UniqueSequentialNumber . NEWLINE;
		$str .=  "VoidedAmountInCents: " . $this->VoidedAmountInCents . NEWLINE;
		
		return $str;
	}
}
?>