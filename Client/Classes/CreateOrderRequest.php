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
		$this->EmailUpdateToBuyerEnum = EmailUpdateToBuyerEnum::__default;
		$this->MerchantKey = null;
		$this->OrderReference = "";
		$this->RequestKey = null;
		$this->Retries = null;
		$this->Buyer = null;
		$this->ShoppingCartCollection = null;
		$this->CreditCardTransactionCollection = null;
		//$this->BoletoTransactionCollection = null;
	}
	
	function __tostring() {
		$str = "";
		$str .=  "AmountInCents: " . $this->AmountInCents . NEWLINE;
		$str .=  "AmountInCentsToConsiderPaid: " . $this->AmountInCentsToConsiderPaid . NEWLINE;
		$str .=  "CurrencyIsoEnum: " . $this->CurrencyIsoEnum . NEWLINE;
		$str .=  "EmailUpdateToBuyerEnum: " . $this->EmailUpdateToBuyerEnum . NEWLINE;
		$str .=  "MerchantKey: " . $this->MerchantKey . NEWLINE;
		$str .=  "OrderReference: " . $this->OrderReference . NEWLINE;
		$str .=  "RequestKey: " . $this->RequestKey . NEWLINE;
		$str .=  "Retries: " . $this->Retries . NEWLINE;
		$str .=  "Buyer: " . $this->Buyer . NEWLINE;
		if (is_array($this->ShoppingCartCollection)) {
			foreach($this->ShoppingCartCollection as $sCart) {
				$str .=  "ShoppingCart: " . $sCart . NEWLINE;
			}
		}
		if (is_array($this->CreditCardTransactionCollection)) {
			foreach($this->CreditCardTransactionCollection as $ccTrans) {
				$str .=  "CreditCardTransaction: " . $ccTrans . NEWLINE;
			}
		}
		if (is_array($this->BoletoTransactionCollection)) {
			foreach($this->BoletoTransactionCollection as $boletoTrans) {
				$str .=  "BoletoTransaction: " . $boletoTrans . NEWLINE;
			}
		}
		
		return $str;
	}
}
?>