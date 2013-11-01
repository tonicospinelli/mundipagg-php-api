<?php
include_once "Recurrency.php";
include_once "Enum.php";

class CreditCardTransaction {
	public $AmountInCents; //long
	public $CaptureDelayInMinutes; // int
	public $CreditCardBrandEnum; // CreditCardBrandEnum
	public $CreditCardNumber; // string
	public $CreditCardOperationEnum; // Nullable<CreditCardOperationEnum>
	public $ExpMonth; // int
	public $ExpYear; // int
	public $HolderName; // string
	public $IataAmountInCents; // long
	public $InstallmentCount; // int
	public $InstantBuyKey; // Guid
	public $PaymentMethodCode; // int
	public $SecurityCode; // string
	public $ThirdPartyMerchantKey; // Guid
	public $TransactionReference; // string
	public $Recurrency; // Recurrency

	function __construct() {
		$this->AmountInCents = 0;
		$this->CaptureDelayInMinutes = 0;
		$this->CreditCardBrandEnum = 1;
		$this->CreditCardNumber = "";
		$this->CreditCardOperationEnum = 1;
		$this->ExpMonth = 0;
		$this->ExpYear = 0;
		$this->HolderName = "";
		$this->IataAmountInCents = 0;
		$this->InstallmentCount = 0;
		$this->InstantBuyKey = null;
		$this->PaymentMethodCode = 0;
		$this->SecurityCode = null;
		$this->ThirdPartyMerchantKey = null;
		$this->TransactionReference = null;
		$this->Recurrency = null;
	}
}
?>