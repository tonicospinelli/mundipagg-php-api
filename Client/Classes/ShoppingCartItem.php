<?php
class ShoppingCartItem {
	public $Description; // string
	public $ItemReference; // string
	public $Name; // string
	public $Quantity; // int
	public $TotalCostInCents; // int
	public $UnitCostInCents; // int
	
	function __construct() {
		$this->Description = "";
		$this->ItemReference = "";
		$this->Name = "";
		$this->Quantity = 0;
		$this->TotalCostInCents = 0;
		$this->UnitCostInCents = 0;
	}
}
?>