<?php
class QueryOrderRequest {
	public $MerchantKey; // Guid
	public $OrderKey; // Guid
	public $OrderReference; // string
	public $RequestKey; // Guid
	
	function __construct() {
		$this->MerchantKey = null;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->RequestKey = null;
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .=  "MerchantKey: " . $this->MerchantKey . NEWLINE;
		$str .=  "OrderKey: " . $this->OrderKey . NEWLINE;
		$str .=  "OrderReference: " . $this->OrderReference . NEWLINE;
		$str .=  "RequestKey: " . $this->RequestKey . NEWLINE;
		
		return $str;
	}
}
?>