<?php
class MundiPaggService_DataContracts_Debit_OrderRequest {

	/** @var [String] Order Reference*/
    public $OrderReference;

    /** @var [Long] Order amount in cents*/
    public $AmountInCents;

    function __construct() {

    	$this->OrderReference = null;
    	$this->AmountInCents = 0;
    }
}
