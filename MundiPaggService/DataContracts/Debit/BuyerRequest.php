<?php
class MundiPaggService_DataContracts_Debit_BuyerRequest {

    /*@var [String] Document number*/
    public $TaxDocumentNumber;

    /*@var [MundiPaggService_DataContracts_TaxDocumentTypeEnum] Document type (CPF/CNPJ)*/
    public $TaxDocumentTypeEnum;

    /*@var [Guid] MundiPaggService_DataContracts_Buyer key*/
    public $BuyerKey;

    /*@var [String] MundiPaggService_DataContracts_Buyer reference*/
    public $BuyerReference;

    /*@var [Nullable<MundiPaggService_DataContracts_PersonTypeEnum>] Person type (Person, Company)*/
    public $PersonTypeEnum;

    /*@var [String] MundiPaggService_DataContracts_Buyer name*/
    public $Name;

    /*@var [MundiPaggService_DataContracts_GenderEnum] Gender (M/F)*/
    public $GenderEnum;

    /*@var [String] MundiPaggService_DataContracts_Buyer's e-mail*/
    public $Email;

    /*@var [String] MundiPaggService_DataContracts_Buyer's facebook id*/
    public $FacebookId;

    /*@var [String] MundiPaggService_DataContracts_Buyer's twitter id*/
    public $TwitterId;

    /*@var [String] MundiPaggService_DataContracts_Buyer IP address*/
    public $IpAddress;

    /*@var [List<MundiPaggService_DataContracts_Debit_PhoneRequest>] Buyer phone collection*/
    public $PhoneRequestCollection;

    /*@var [List<MundiPaggService_DataContracts_Debit_BuyerAddressRequest>] Buyer address collection*/
    public $BuyerAddressCollection;

    function __construct() {

        $this->TaxDocumentNumber = null;
        $this->TaxDocumentTypeEnum = MundiPaggService_DataContracts_TaxDocumentTypeEnum::__default;
        $this->BuyerKey = null;
        $this->BuyerReference = null;
        $this->PersonTypeEnum = MundiPaggService_DataContracts_PersonTypeEnum::__default;
        $this->Name = null;
        $this->GenderEnum = MundiPaggService_DataContracts_GenderEnum::__default;
        $this->Email = null;
        $this->FacebookId = null;
        $this->TwitterId = null;
        $this->IpAddress = null;
        $this->PhoneRequestCollection = null;
        $this->BuyerAddressCollection = null;
    }
}
