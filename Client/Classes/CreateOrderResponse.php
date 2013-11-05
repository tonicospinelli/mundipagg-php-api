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
		$this->OrderStatusEnum = OrderStatusEnum::__default;
		$this->RequestKey = null;
		$this->Success = false;
		$this->Version = "";
		$this->CreditCardTransactionResultCollection = null;
		$this->BoletoTransactionResultCollection = null;
		$this->MundiPaggSeggestion = null;
		$this->ErrorReport = null;
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .= $ts . "BuyerKey: " . $te . $this->BuyerKey . NEWLINE;
		$str .= $ts . "MerchantKey: " . $te . $this->MerchantKey . NEWLINE;
		$str .= $ts . "MundiPaggTimeInMilliseconds: " . $te . $this->MundiPaggTimeInMilliseconds . NEWLINE;
		$str .= $ts . "OrderKey: " . $te . $this->OrderKey . NEWLINE;
		$str .= $ts . "OrderReference: " . $te . $this->OrderReference . NEWLINE;
		$str .= $ts . "OrderStatusEnum: " . $te . $this->OrderStatusEnum . NEWLINE;
		$str .= $ts . "RequestKey: " . $te . $this->RequestKey . NEWLINE;
		$str .= $ts . "Success: " . $te . $this->Success . NEWLINE;
		$str .= $ts . "Version: " . $te . $this->Version . NEWLINE;
		if (is_array($this->CreditCardTransactionResultCollection)) {
			foreach($this->CreditCardTransactionResultCollection as $ccTrans) {
				$str .= $ts . "CreditCardTransaction: " . $te . $ccTrans . NEWLINE;
			}
		}
		if (is_array($this->BoletoTransactionResultCollection)) {
			foreach($this->BoletoTransactionResultCollection as $boletoTrans) {
				$str .= $ts . "BoletoTransaction: " . $te . $boletoTrans . NEWLINE;
			}
		}
		$str .= $ts . "MundiPaggSuggestion: " . $te . $this->MundiPaggSuggestion . NEWLINE;
		$str .= $ts . "ErrorReport: " . $te . $this->ErrorReport . NEWLINE;
		
		return $str;
	}
}
?>