<?php
include_once "Enum.php";

class BuyerAddress {
	public $AddressTypeEnum; // AddressTypeEnum
	public $City; // string
	public $Complement; // string
	public $CountryEnum; // CountryEnum
	public $District; // string
	public $Number; // string
	public $State; // string
	public $Street; // string
	public $ZipCode; // string
	
	function __construct() {
		$this->AddressTypeEnum = AddressTypeEnum::__default;
		$this->City = "";
		$this->Complement = "";
		$this->CountryEnum = CountryEnum::__default;
		$this->District = "";
		$this->Number = "";
		$this->State = "";
		$this->Street = "";
		$this->ZipCode = "";
	}
}
?>