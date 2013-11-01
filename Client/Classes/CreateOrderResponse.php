<?php
include_once "Enum.php";
include_once "CreditCardTransactionResult.php";
include_once "BoletoTransactionResult.php";
include_once "MundiPaggSuggestion.php";
include_once "ErrorReport.php";


class CreateOrderResponse {
	public $BuyerKey; // Guid
	public $MerchantKey; // Guid
	public $MundiPaggTimeInMilliseconds; // long
	public $OrderKey; // Guid
	public $OrderReference; // string
	public $OrderStatusEnum; // OrderStatusEnum
	public $RequestKey; // Guid
	public $Success; // bool
	public $Version; // string
	public $CreditCardTransactionResultCollection; // CreditCardTransactionResult[]
	public $BoletoTransactionResultCollection; // BoletoTransactionResult[]
	public $MundiPaggSuggestion; // MundiPaggSuggestion
	public $ErrorReport; // ErrorReport
	
	function __construct() {
		$this->BuyerKey = null;
		$this->MerchantKey = null;
		$this->MundiPaggTimeInMilliseconds = 0;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->OrderStatusEnum = $OrderStatusEnum::__default;
		$this->RequestKey = null;
		$this->Success = false;
		$this->Version = "";
		$this->CreditCardTransactionResultCollection = null;
		$this->BoletoTransactionResultCollection = null;
		$this->MundiPaggSeggestion = null;
		$this->ErrorReport = null;
	}
}
?>