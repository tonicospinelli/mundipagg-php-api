<?php
include_once "CreditCardData.php";

class GetInstantBuyDataResponse {
	public $CreditCardDataCount; // int
	public $MundiPaggTimeInMilliseconds; // long
	public $RequestKey; // Guid
	public $Success; // bool
	public $CreditCardDataCollection; // CreditCardData[]
	public $MundiPaggSuggestion; // MundiPaggSuggestion
	public $ErrorReport; // ErrorReport
	
	function __construct() {
		$this->CreditCardDataCount = 0;
		$this->MundiPaggTimeInMilliseconds = 0;
		$this->RequestKey = null;
		$this->Success = false;
		$this->CreditCardDataCollection = null;
		$this->MundiPaggSuggestion = null;
		$this->ErrorReport = null;
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .=  "CreditCardDataCount: " . $this->CreditCardDataCount . NEWLINE;
		$str .=  "MundiPaggTimeInMilliseconds: " . $this->MundiPaggTimeInMilliseconds . NEWLINE;
		$str .=  "RequestKey: " . $this->RequestKey . NEWLINE;
		$str .=  "Success: " . $this->Success . NEWLINE;
		
		if (is_array($this->CreditCardDataCollection)) {
			foreach($this->CreditCardDataCollection as $ccTransData) {
				$str .= $ts . "CreditCardData: " . $te . $ccTransData . NEWLINE;
			}
		}
		
		$str .=  "MundiPaggSuggestion: " . $this->MundiPaggSuggestion . NEWLINE;
		$str .=  "ErrorReport: " . $this->ErrorReport . NEWLINE;

		return $str;
	}
}
?>