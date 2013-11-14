<?php
class GetInstantBuyDataRequest {
	public $BuyerKey; // Guid
	public $InstantBuyKey; // Guid
	public $MerchantKey; // Guid
	public $RequestKey; // Guid
	
	function __construct() {
		$this->BuyerKey = null;
		$this->InstantBuyKey = null;
		$this->MerchantKey = null;
		$this->RequestKey = null;
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .= $ts . "BuyerKey: " . $te . $this->BuyerKey . NEWLINE;
		$str .= $ts . "InstantBuyKey: " . $te . $this->InstantBuyKey . NEWLINE;
		$str .= $ts . "MerchantKey: " . $te . $this->MerchantKey . NEWLINE;
		$str .= $ts . "RequestKey: " . $te . $this->RequestKey . NEWLINE;
		
		return $str;
	}
}
?>