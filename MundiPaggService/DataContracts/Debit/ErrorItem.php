<?php
class MundiPaggService_DataContracts_Debit_ErrorItem {

	/** @var [Int] Error code*/
	public $ErrorCode;

	/** @var [String] Error field*/
	public $ErrorField;

	/** @var [String] Error Description*/
	public $Description;

	/** @var [String] Error Severity*/
	public $SeverityCode;

	function __construct() {

		$this->ErrorCode = 0;
		$this->ErrorField = null;
		$this->Description = null;
		$this->SeverityCode = MundiPaggService_DataContracts_SeverityCodeEnum::__default;
	}
}

