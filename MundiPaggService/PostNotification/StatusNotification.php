<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "\\Variables.php";
include_once $MAIN_CLASSES . "Enum.php";

final class StatusNotification {
	public $AmountInCents;
	public $AmountPaidInCents;
	public $BoletoTransaction;
	public $CreditCardTransaction;
	public $OrderKey;
	public $OrderReference;
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