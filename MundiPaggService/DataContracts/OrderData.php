<?php


class MundiPaggService_DataContracts_OrderData {
	/*@var [DateTime] Order Creation Date*/
	public $CreateDate;
	/*@var [Guid] Order Key*/
	public $OrderKey; 
	/*@var [string] Order Reference*/
	public $OrderReference;
	/*@var [MundiPaggService_DataContracts_OrderStatusEnum] Order Status */
	public $OrderStatusEnum;
	/*@var [MundiPaggService_DataContracts_CreditCardTransactionData] CreditCard Transaction Data Collection  */
	public $CreditCardTransactionDataCollection;
	/*@var [MundiPaggService_DataContracts_BoletoTransactionData] Boleto Transaction Data Collection*/
	public $BoletoTransactionDataCollection;
	
	function __construct() {
		$this->CreateDate = null;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->OrderStatusEnum = MundiPaggService_DataContracts_OrderStatusEnum::__default;
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
