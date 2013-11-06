<?php
include_once "Enum.php";
include_once "CreditCardTransactionData.php";
include_once "BoletoTransactionData.php";

class OrderData {
	public $CreateDate; // DateTime
	public $OrderKey; // Guid
	public $OrderReference; // string
	public $OrderStatusEnum; // Nullable<OrderStatusEnum>
	public $CreditCardTransactionDataCollection; // CreditCardTransactionData[]
	public $BoletoTransactionDataCollection; // BoletoTransactionData[]
	
	function __construct() {
		$this->CreateDate = null;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->OrderStatusEnum = OrderStatusEnum::__default;
		$this->CreditCardTransactionDataCollection = null;
		$this->BoletoTransactionDataCollection = null;
	}
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .=  "CreateDate: " . $this->CreateDate . NEWLINE;
		$str .=  "OrderKey: " . $this->OrderKey . NEWLINE;
		$str .=  "OrderReference: " . $this->OrderReference . NEWLINE;
		$str .=  "OrderStatusEnum: " . $this->OrderStatusEnum . NEWLINE;
		
		if (is_array($this->CreditCardTransactionDataCollection)) {
			foreach($this->CreditCardTransactionDataCollection as $ccTransData) {
				$str .= $ts . "CreditCardTransactionData: " . $te . $ccTransData . NEWLINE;
			}
		}
		
		if (is_array($this->BoletoTransactionDataCollection)) {
			foreach($this->BoletoTransactionDataCollection as $boletoTransData) {
				$str .= $ts . "BoletoTransactionData: " . $te . $boletoTransData . NEWLINE;
			}
		}

		return $str;
	}
}
?>