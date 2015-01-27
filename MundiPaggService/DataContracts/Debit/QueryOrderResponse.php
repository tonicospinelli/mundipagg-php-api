<?php


class MundiPaggService_DataContracts_Debit_QueryOrderResponse {

	/*@var [List<MundiPaggService_DataContracts_OrderData>] Order data collection*/
	public $OrderDataCollection;

	/*@var [Nullable<Long>] MundiPagg Process time*/
	public $MundiPaggTimeInMilliseconds;

	/*@var [Bool] Success*/
	public $Success;

	/*@var [MundiPaggService_DataContracts_ErrorReport] Errors*/
	public $ErrorReport;

	function __construct() {

		$this->OrderDataCollection = null;
		$this->MundiPaggTimeInMilliseconds = null;
		$this->Success = false;
		$this->ErrorReport = null;
	}
}
