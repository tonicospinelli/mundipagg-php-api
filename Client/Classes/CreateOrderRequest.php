<?php
include_once "Buyer.php";
include_once "BoletoTransaction.php";
include_once "CreditCardTransaction.php";
include_once "Enum.php";

class CreateOrderRequest {
	public $AmountInCents; // long
	public $AmountInCentsToConsiderPaid; // long
	public $CurrencyIsoEnum; // CurrencyIsoEnum
	public $EmailUpdateToBuyerEnum; // Nullable<EmailUpdateToBuyerEnum>
	public $MerchantKey; // Guid
	public $OrderReference; // string
	public $RequestKey; // Guid
	public $Retries; // Nullable<int>
	public $Buyer; // Buyer
	public $ShoppingCartCollection; // ShoppingCart[]
	public $CreditCardTransactionCollection; // CreditCardTransaction[]
	public $BoletoTransactionCollection; // BoletoTransaction[]
	
	function __construct() {
		$this->AmountInCents = 0;
		$this->AmountInCentsToConsiderPaid = 0;
		$this->CurrencyIsoEnum = CurrencyIsoEnum::BRL;
		$this->EmailUpdateToBuyerEnum = null;
		$this->MerchantKey = null;
		$this->OrderReference = "";
		$this->RequestKey = null;
		$this->Retries = null;
		$this->Buyer = null;
		$this->ShoppingCartCollection = null;
		$this->CreditCardTransactionCollection = null;
		$this->BoletoTransactionCollection = null;
	}
}
?>