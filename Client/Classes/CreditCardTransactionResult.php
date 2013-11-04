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
}
?>