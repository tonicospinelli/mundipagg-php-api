<?php
include_once "Enum.php";
include_once "CreditCardTransactionResult.php";

class RetryOrderResponse {
	public $MundiPaggTimeInMilliseconds; // Nullable<long>
	public $OrderKey; // Guid
	public $OrderReference; // string
	public $OrderStatusEnum; // OrderStatusEnum
	public $RequestKey; // Guid
	public $RetryOrderCreditCardTransactionResponse; // CreditCardTransactionResult[]
	public $Success; // bool
	public $Version; // string
	public $MundiPaggSuggestion; // MundiPaggSuggestion
	public $ErrorReport; // ErrorReport
	
	function __construct() {
		$this->MundiPaggTimeInMilliseconds = null;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->OrderStatusEnum = OrderStatusEnum::__default;
		$this->RequestKey = null;
		$this->RetryOrderCreditCardTransactionResponse = null;
		$this->Success = false;
		$this->Version = "";
		$this->MundiPaggSuggestion = null;
		$this->ErrorReport = null;
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .=  "MundiPaggTimeInMilliseconds: " . $this->MundiPaggTimeInMilliseconds . NEWLINE;
		$str .=  "OrderKey: " . $this->OrderKey . NEWLINE;
		$str .=  "OrderReference: " . $this->OrderReference . NEWLINE;
		$str .=  "OrderStatusEnum: " . $this->OrderStatusEnum . NEWLINE;
		$str .=  "RequestKey: " . $this->RequestKey . NEWLINE;
		$str .=  "Success: " . $this->Success . NEWLINE;
		$str .=  "Version: " . $this->Version . NEWLINE;
		$str .=  "MundiPaggSuggestion: " . $this->MundiPaggSuggestion . NEWLINE;
		$str .=  "ErrorReport: " . $this->ErrorReport . NEWLINE;
		
		if (is_array($this->RetryOrderCreditCardTransactionResponse)) {
			foreach($this->RetryOrderCreditCardTransactionResponse as $ccTrans) {
				$str .=  "RetryOrderCreditCardTransactionResponse: " . $ccTrans . NEWLINE;
			}
		}
		
		return $str;
	}
}
?>