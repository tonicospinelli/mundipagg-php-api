<?php
class MundiPaggService_DataContracts_Debit_PhoneRequest {

    /*@var [String] Country code*/
    public $CountryCode;

    /*@var [String] Area code*/
    public $AreaCode;

    /*@var [String] Phone number*/
    public $PhoneNumber;

    /*@var [String] Phone extension*/
    public $Extension;

    /*@var [MundiPaggService_DataContracts_Debit_PhoneTypeEnum] Phone type*/
    public $PhoneTypeEnum;

    function __construct() {

        $this->CountryCode = null;
        $this->AreaCode = null;
        $this->PhoneNumber = null;
        $this->Extension = null;
        $this->PhoneTypeEnum = MundiPaggService_DataContracts_Debit_PhoneTypeEnum::__default;
    }
}
