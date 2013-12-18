<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "\\MundiPaggServiceConfiguration.php";
include_once $DATA_CONTRACTS . "Enum.php";

final class StatusNotification {
	/*@var [long] Amount In Cents */
	public $AmountInCents;
	/*@var [long] Amount Paid In Cents */
	public $AmountPaidInCents;
	/*@var [string] Boleto Transaction */
	public $BoletoTransaction;
	/*@var [string] Boleto Transaction */
	public $CreditCardTransaction;
	/*@var [string] Order Key */
	public $OrderKey;
	/*@var [string] Order Reference */
	public $OrderReference;
	/*@var [string] Order Status */
	public $OrderStatus;
	
	function __construct() {
		$this->AmountInCents = 0;
		$this->AmountPaidInCents = null;
		$this->BoletoTransaction = null;
		$this->CreditCardTransaction = null;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->OrderStatus = OrderStatusEnum::__default;
	}
}
?>