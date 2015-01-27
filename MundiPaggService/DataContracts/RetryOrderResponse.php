<?php

class MundiPaggService_DataContracts_RetryOrderResponse {
	/*@var [long] MundiPagg Time In Milliseconds*/
	public $MundiPaggTimeInMilliseconds;
	/*@var [Guid] Order key*/
	public $OrderKey;
	/*@var [string] Order Reference*/
	public $OrderReference;
	/*@var [MundiPaggService_DataContracts_OrderStatusEnum] Order Status Enum */
	public $OrderStatusEnum;
	/*@var [Guid] Request Key*/
	public $RequestKey; 
	/*@var [MundiPaggService_DataContracts_CreditCardTransactionResult] Retry Order CreditCard Transaction Response*/
	public $RetryOrderCreditCardTransactionResponse;
	/*@var [bool] Fail Or Success*/
	public $Success;
	/*@var [string] version */
	public $Version;
	/*@var [MundiPaggService_DataContracts_MundiPaggSuggestion] MundiPagg Suggestion */
	public $MundiPaggSuggestion;
	/*@var [MundiPaggService_DataContracts_ErrorReport] Error Report */
	public $ErrorReport;
	
	function __construct() {
		$this->MundiPaggTimeInMilliseconds = null;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->OrderStatusEnum = MundiPaggService_DataContracts_OrderStatusEnum::__default;
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
