<?php
include_once "Enum.php";

class Recurrency {
	public $DateToStartBilling; // Nullable<DateTime>
	public $FrequencyEnum; // FrequencyEnum
	public $Interval; // int
	public $OneDollarAuth; // Nullable<bool>
	public $Recurrences; // Nullable<int>
	
	function __construct() {
		$this->DateToStartBilling = null;
		$this->FrequencyEnum = 1;
		$this->Interval = 0;
		$this->OneDollarAuth = null;
		$this->Recurrences = null;
	}
}
?>