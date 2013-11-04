<?php
class ManageOrderResponse {
	public $ManageOrderOperationEnum; // ManageOrderOperationEnum
	public $MundiPaggTimeInMilliseconds; // Nullable<long>
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
}
?>