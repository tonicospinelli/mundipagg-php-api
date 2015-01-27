<?php
class MundiPaggService_DataContracts_ManageOrderResponse {
	/*@var [MundiPaggService_DataContracts_ManageOrderOperationEnum] Order Operation */
	public $ManageOrderOperationEnum; // ManageOrderOperationEnum
	/*@var [long] MundiPagg Time In Milliseconds */
	public $MundiPaggTimeInMilliseconds; // Nullable<long>
	/*@var [Guid] Order Key */
	public $OrderKey;
	/*@var [string] Order Reference */
	public $OrderReference;
	/*@var [MundiPaggService_DataContracts_OrderStatusEnum] Order status */
	public $OrderStatusEnum;
	/*@var [Guid] Request Key */
	public $RequestKey;
	/*@var [bool] Fail Or Success */
	public $Success;
	/*@var [string] Version */
	public $Version;
	/*@var [MundiPaggService_DataContracts_CreditCardTransactionResult] CreditCard Transaction Result Collection */
	public $CreditCardTransactionResultCollection;
	/*@var [MundiPaggService_DataContracts_BoletoTransactionResult] Boleto Transaction Result Collection */
	public $BoletoTransactionResultCollection; // BoletoTransactionResult[]
	/*@var [MundiPaggService_DataContracts_MundiPaggSuggestion] MundiPagg Suggestion */
	public $MundiPaggSuggestion; // MundiPaggSuggestion
	/*@var [MundiPaggService_DataContracts_ErrorReport] Error Report */
	public $ErrorReport; // ErrorReport
	
	function __tostring() {
		$str = "";
		$ts = '<font color="#0000FF">';
		$te = '</font>';
		
		$str .= $ts . "ManageOrderOperationEnum: " . $te . $this->ManageOrderOperationEnum . NEWLINE;
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
