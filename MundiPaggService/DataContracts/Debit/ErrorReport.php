<?php
class MundiPaggService_DataContracts_Debit_ErrorReport {

	/** @var [String] Error category*/
	public $Category;

	/** @var [List<MundiPaggService_DataContracts_ErrorItem>] Error collection*/
	public $ErrorItemCollection;

	function __construct() {

		$this->Category = null;
		$this->ErrorItemCollection = null;
	}
}
