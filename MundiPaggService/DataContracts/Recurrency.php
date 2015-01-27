<?php

class MundiPaggService_DataContracts_Recurrency {
	/*@var [DateTime] Date to start billing */
	public $DateToStartBilling; 
	/*@var [MundiPaggService_DataContracts_FrequencyEnum] Frequency */
	public $FrequencyEnum; 
	/*@var [integer] Interval*/
	public $Interval; 
	/*@var [bool]  One Dollar Auth*/
	public $OneDollarAuth;
	/*@var [integer] Recurrences*/
	public $Recurrences;
	
	function __construct() {
		$this->DateToStartBilling = null;
		$this->FrequencyEnum = 1;
		$this->Interval = 0;
		$this->OneDollarAuth = null;
		$this->Recurrences = null;
	}
}
