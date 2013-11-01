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
	
	function __tostring() {
		$str = "";
		$str .=  "BuyerKey: " . $this->BuyerKey . NEWLINE;
		$str .=  "BuyerReference: " . $this->BuyerReference . NEWLINE;
		$str .=  "CreateDateInMerchant: " . $this->CreateDateInMerchant . NEWLINE;
		$str .=  "Email: " . $this->Email . NEWLINE;
		$str .=  "FacebookId: " . $this->FacebookId . NEWLINE;
		$str .=  "GenderEnum: " . $this->GenderEnum . NEWLINE;
		$str .=  "HomePhone: " . $this->HomePhone . NEWLINE;
		$str .=  "IpAddress: " . $this->IpAddress . NEWLINE;
		$str .=  "LastBuyerUpdateinMerchant: " . $this->LastBuyerUpdateInMerchant . NEWLINE;
		$str .=  "MobilePhone: " . $this->MobilePhone . NEWLINE;
		$str .=  "Name: " . $this->Name . NEWLINE;
		$str .=  "PersonTypeEnum: " . $this->PersonTypeEnum = Person;
		$str .=  "TaxDocumentNumber: " . $this->TaxDocumentNumber . NEWLINE;
		$str .=  "TaxDocumentTypeEnum: " . $this->TaxDocumentTypeEnum . NEWLINE;
		$str .=  "TwitterId: " . $this->TwitterId . NEWLINE;
		$str .=  "WorkPhone: " . $this->WorkPhone . NEWLINE;
		if (is_array($this->BuyerAddressCollection)) {
			foreach($this->BuyerAddressCollection as $bAddress) {
				$str .=  "BuyerAddress: " . $bAddress . NEWLINE;
			}
		}
		
		return $str;
	}
}
?>