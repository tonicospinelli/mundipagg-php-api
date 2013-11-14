<?php
include_once "Enum.php";

class CreditCardTransactionResult {
	public $AcquirerMessage; // string
	public $AcquirerReturnCode; // string
	public $AmountInCents; // long
	public $AuthorizationCode; // string
	public $AuthorizedAmountInCents; // Nullable<long>
	public $CapturedAmountInCents; // Nullable<long>
	public $CreditCardNumber; // string
	public $CreditCardOperationEnum; // CreditCardOperationEnum
	public $CreditCardTransactionStatusEnum; // CreditCardTransactionStatusEnum
	public $CustomStatus; // string
	public $DueDate; // Nullable<DateTime>
	public $ExternalTimeInMilliseconds; // long
	public $InstantBuyKey; // Guid
	public $RefundedAmountInCents; // Nullable<long>
	public $Success; // bool
	public $TransactionIdentifier; // string
	public $TransactionKey; // Guid
	public $TransactionReference; // string
	public $UniqueSequentialNumber; // string
	public $VoidedAmountInCents; // Nullable<long>
	public $OriginalAcquirerReturnCollection; // OriginalAcquirerReturn (Inherits from Dictionary<string, string>)
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#FF0000">';
		$te = '</font>';
		
		$str .= $ts . "AcquirerMessage: " . $te . $this->AcquirerMessage . NEWLINE;
		$str .= $ts . "AcquirerReturnCode: " . $te . $this->AcquirerReturnCode . NEWLINE;
		$str .= $ts . "AmountInCents: " . $te . $this->AmountInCents . NEWLINE;
		$str .= $ts . "AuthorizationCode: " . $te . $this->AuthorizationCode . NEWLINE;
		$str .= $ts . "AuthorizedAmountInCents: " . $te . $this->AuthorizedAmountInCents . NEWLINE;
		$str .= $ts . "CapturedAmountInCents: " . $te . $this->CapturedAmountInCents . NEWLINE;
		$str .= $ts . "CreditCardNumber: " . $te . $this->CreditCardNumber . NEWLINE;
		$str .= $ts . "CreditCardOperationEnum: " . $te . $this->CreditCardOperationEnum . NEWLINE;
		$str .= $ts . "CreditCardTransactionStatusEnum: " . $te . $this->CreditCardTransactionStatusEnum . NEWLINE;
		$str .= $ts . "CustomStatus: " . $te . $this->CustomStatus . NEWLINE;
		$str .= $ts . "DueDate: " . $te . $this->DueDate . NEWLINE;
		$str .= $ts . "ExternalTimeInMilliseconds: " . $te . $this->ExternalTimeInMilliseconds . NEWLINE;
		$str .= $ts . "InstantBuyKey: " . $te . $this->InstantBuyKey . NEWLINE;
		$str .= $ts . "RefundedAmountInCents: " . $te . $this->RefundedAmountInCents . NEWLINE;
		$str .= $ts . "Success: " . $te . $this->Success . NEWLINE;
		$str .= $ts . "TransactionIdentifier: " . $te . $this->TransactionIdentifier . NEWLINE;
		$str .= $ts . "TransactionKey: " . $te . $this->TransactionKey . NEWLINE;
		$str .= $ts . "TransactionReference: " . $te . $this->TransactionReference . NEWLINE;
		$str .= $ts . "UniqueSequentialNumber: " . $te . $this->UniqueSequentialNumber . NEWLINE;
		$str .= $ts . "VoidedAmountInCents: " . $te . $this->VoidedAmountInCents . NEWLINE;
		
		if (is_array($this->OriginalAcquirerReturnCollection)) {
			foreach($this->OriginalAcquirerReturnCollection as $key => $orAcReturn) {
				$str .= $ts . "OriginalAcquirerReturn: " . $te . $key . ' => ' . $orAcReturn . NEWLINE;
			}
		}
		
		return $str;
	}
}
?>