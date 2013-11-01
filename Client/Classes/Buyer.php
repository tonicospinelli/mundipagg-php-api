<?php
include_once "BuyerAddress.php";
include_once "Enum.php";

class Buyer {
	public $BuyerKey; // Guid
	public $BuyerReference; // string
	public $CreateDateInMerchant; // Nullable<DateTime>
	public $Email; // string
	public $FacebookId; // string
	public $GenderEnum; // Nullable<GenderEnum>
	public $HomePhone; // string
	public $IpAddress; // string
	public $LastBuyerUpdateInMerchant; // Nullable<DateTime>
	public $MobilePhone; // string
	public $Name; // string
	public $PersonTypeEnum; // Nullable<PersonTypeEnum>
	public $TaxDocumentNumber; // string
	public $TaxDocumentTypeEnum; // Nullable<TaxDocumentTypeEnum>
	public $TwitterId; // string
	public $WorkPhone; // string
	public $BuyerAddressCollection; // BuyerAddress[]
	
	function __construct() {
		$this->BuyerKey = null;
		$this->BuyerReference = "";
		$this->CreateDateInMerchant = null;
		$this->Email = "";
		$this->FacebookId = "";
		$this->GenderEnum = M;
		$this->HomePhone = "";
		$this->IpAddress = "";
		$this->LastBuyerUpdateInMerchant = null;
		$this->MobilePhone = "";
		$this->Name = "";
		$this->PersonTypeEnum = Person;
		$this->TaxDocumentNumber = "";
		$this->TaxDocumentTypeEnum = CPF;
		$this->TwitterId = "";
		$this->WorkPhone = "";
		$this->BuyerAddressCollection = null;
	}
}
?>