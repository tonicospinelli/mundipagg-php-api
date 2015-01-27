<?php

class MundiPaggService_DataContracts_BuyerAddress {
	/* @var [MundiPaggService_DataContracts_AddressTypeEnum] Address Type.*/
    /*@param Default: Residential*/
	public $AddressTypeEnum; 
	/*@var [String] City.*/
	public $City;
	/*@var [String] Address complement.*/
	public $Complement;
	/*var [MundiPaggService_DataContracts_CountryEnum] Address country.*/
	/*@param Default: Brazil*/
	public $CountryEnum;
	/*@var [String] District.*/
	public $District;
	/*@var [String] Address number.*/
	public $Number; 
	/*@var [String] Address state.*/
	public $State; 
	/*@var [String] Street*/
	public $Street;
	/*@var [String] Zip Code.*/
	public $ZipCode;
	
	function __construct() {
		$this->AddressTypeEnum = MundiPaggService_DataContracts_AddressTypeEnum::__default;
		$this->City = "";
		$this->Complement = "";
		$this->CountryEnum = MundiPaggService_DataContracts_CountryEnum::__default;
		$this->District = "";
		$this->Number = "";
		$this->State = "";
		$this->Street = "";
		$this->ZipCode = "";
	}
}
