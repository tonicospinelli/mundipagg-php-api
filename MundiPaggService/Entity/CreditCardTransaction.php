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
		$this->CreditCardBrandEnum = CreditCardBrandEnum::__default;
		$this->CreditCardNumber = "";
		$this->CreditCardOperationEnum = CreditCardOperationEnum::__default;
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
	
	function __tostring() {
		$str = "";
		$str .=  "AmountInCents: " . $this->AmountInCents . NEWLINE;
		$str .=  "CaptureDelayInMinutes: " . $this->CaptureDelayInMinutes . NEWLINE;
		$str .=  "CreditCardBrandEnum: " . $this->CreditCardBrandEnum . NEWLINE;
		$str .=  "CreditCardNumber: " . $this->CreditCardNumber . NEWLINE;
		$str .=  "CreditCardOperationEnum: " . $this->CreditCardOperationEnum . NEWLINE;
		$str .=  "ExpMonth: " . $this->ExpMonth . NEWLINE;
		$str .=  "ExpYear: " . $this->ExpYear . NEWLINE;
		$str .=  "HolderName: " . $this->HolderName . NEWLINE;
		$str .=  "IataAmountInCents: " . $this->IataAmountInCents . NEWLINE;
		$str .=  "InstallmentCount: " . $this->InstallmentCount . NEWLINE;
		$str .=  "InstantBuyKey: " . $this->InstantBuyKey . NEWLINE;
		$str .=  "PaymentMethodCode: " . $this->PaymentMethodCode . NEWLINE;
		$str .=  "SecurityCode: " . $this->SecurityCode . NEWLINE;
		$str .=  "ThirdPartyMerchantKey: " . $this->ThirdPartyMerchantKey . NEWLINE;
		$str .=  "TransactionReference: " . $this->TransactionReference . NEWLINE;
		$str .=  "Recurrency: " . $this->Recurrency . NEWLINE;
		
		return $str;
	}
}
?>