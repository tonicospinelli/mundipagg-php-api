<?php
	const NEWLINE = "<br>";
	
	/*@global Currency Iso Enum*/
	class MundiPaggService_DataContracts_CurrencyIsoEnum {
		const __default = self::BRL;
		
		const BRL = 'BRL'; //986;
		const EUR = 'EUR'; //978;
		const USD = 'USD'; //840;
		const ARS = 'ARS'; //32;
		const BOB = 'BOB'; //68;
		const CLP = 'CLP'; //152;
		const COP = 'COP'; //170;
		const UYU = 'UYU'; //858;
		const MXN = 'MXN'; //484;
		const PYG = 'PYG'; //600;
	}
	
	/*@global Email Update To MundiPaggService_DataContracts_Buyer Enum*/
	class MundiPaggService_DataContracts_EmailUpdateToBuyerEnum {
		const __default = self::No;

		const Yes = 'Yes'; //1;
		const No = 'No'; //0;
		const YesIfAuthorized = 'YesIfAuthorized'; //2;
		const YesIfNotAuthorized = 'YesIfNotAuthorized'; //3;
	}
	
	/*@global Credit Card Brand Enum*/
	class MundiPaggService_DataContracts_CreditCardBrandEnum {
		const __default = self::Visa;

		const Visa = 'Visa'; //1;
		const Mastercard = 'Mastercard'; //2;
		const Hipercard = 'Hipercard'; //3;
		const Amex = 'Amex'; //4;
		const Diners = 'Diners'; //5;
		const Elo = 'Elo'; //6;
		const Aura = 'Aura'; //7;
		const Discover = 'Discover'; //8;
		const CasaShow = 'CasaShow'; //9;
		const Havan = 'Havan'; //10;
	}
	
	/*@global CreditCard Operation Enum*/
	class MundiPaggService_DataContracts_CreditCardOperationEnum {
		const __default = self::AuthOnly;

		const AuthOnly = 'AuthOnly'; //1;
		const AuthAndCapture = 'AuthAndCapture'; //2;
		const AuthAndCaptureWithDelay = 'AuthAndCaptureWithDelay'; //3;
	}
	
	/*@global Frequency Enum*/
	class MundiPaggService_DataContracts_FrequencyEnum {
		const __default = self::Weekly;

		const Weekly = 'Weekly'; //1;
		const Monthly = 'Monthly'; //2;
		const Yearly = 'Yearly'; //3;
		const Daily = 'Daily'; //4;
	}
	
	/*@global Gender Enum*/
	class MundiPaggService_DataContracts_GenderEnum {
		const __default = self::M;

		const M = 'M'; //1;
		const F = 'F'; //2;
	}
	
	/*@global Person Type Enum*/
	class MundiPaggService_DataContracts_PersonTypeEnum {
		const __default = self::Person;

		const Person = 'Person'; //1;
		const Company = 'Company'; //2;
	}
	
	/*@global Tax Document Type Enum*/
	class MundiPaggService_DataContracts_TaxDocumentTypeEnum {
		const __default = self::CPF;

		const CPF = 'CPF'; //1;
		const CNPJ = 'CNPJ'; //2;
	}
	
	/*@global Address Type Enum*/
	class MundiPaggService_DataContracts_AddressTypeEnum {
		const __default = self::Billing;

		const Billing = 'Billing'; //1;
		const Shipping = 'Shipping'; //2;
		const Comercial = 'Comercial'; //3;
		const Residential = 'Residential'; //4;
	}
	
	/*@global Country Enum*/
	class MundiPaggService_DataContracts_CountryEnum {
		const __default = self::Brazil;

		const Brazil = 'Brazil'; //1;
		const USA = 'USA'; //2;
		const Argentina = 'Argentina'; //3;
		const Bolivia = 'Bolivia'; //4;
		const Chile = 'Chile'; //5;
		const Colombia = 'Colombia'; //6;
		const Uruguay = 'Uruguay'; //7;
		const Mexico = 'Mexico'; //8;
		const Paraguay = 'Paraguay'; //9;
	}
	
	/*@global Order Status Enum */
	class MundiPaggService_DataContracts_OrderStatusEnum {
		const __default = self::Opened;
		
		const Opened = "Opened"; //1;
		const Closed = 'Closed'; //2;
		const Paid = 'Paid'; //3;
		const Overpaid = 'Overpaid'; //4;
		const Canceled = 'Canceled'; //5;
		const PartialPaid = 'PartialPaid'; //6;
		const WithError = 'WithError'; //7;
	}
	
	/*@global CreditCard Transaction Status Enum*/
	class MundiPaggService_DataContracts_CreditCardTransactionStatusEnum {
		const __default = self::AuthorizedPendingCapture;
		
		const AuthorizedPendingCapture = 'AuthorizedPendingCapture'; //1,
        const NotAuthorized = 'NotAuthorized'; //2,
        const ChargebackPreview = 'ChargebackPreview'; //3,
        const RefundPreview = 'RefundPreview'; //4,
        const DepositPreview = 'DepositPreview'; //5,
        const Captured = 'Captured'; //6,
        const PartialCapture = 'PartialCapture'; //7,
        const Refunded = 'Refunded'; //8,
        const Voided = 'Voided'; //9,
        const Deposited = 'Deposited'; //10,
        const OpenedPendindAuth = 'OpenedPendindAuth'; //11,
        const Chargedback = 'Chargedback'; //12,
        const PendingVoid = 'PendingVoid'; //13,
        const Invalid = 'Invalid'; //14,
        const PartialAuthorize = 'PartialAuthorize'; //15,
        const PartialRefunded = 'PartialRefunded'; //16,
        const OverCapture = 'OverCapture'; //17,
        const PartialVoid = 'PartialVoid'; //18,
        const PendingRefund = 'PendingRefund'; //19,
        const UnScheduled = 'UnScheduled'; //20,
        const WithError = 'WithError'; //99,
	}
	
	/*@global Severity Code Enum*/
	class MundiPaggService_DataContracts_SeverityCodeEnum {
		const __default = self::Error;
		
		const Error = 'Error'; //1;
		const Warning = 'Warning'; //2;
	}
	
	/*@global Manage Order Operation Enum*/
	class MundiPaggService_DataContracts_ManageOrderOperationEnum {
		const __default = self::Capture;
		
		const Capture = 'Capture'; //1,
		const Void = 'Void'; //2,
		const Authorize = 'Authorize'; //3,
	}
	
	/*@global Boleto Transaction Status Enum*/
	class MundiPaggService_DataContracts_BoletoTransactionStatusEnum {
		const __default = self::Generated;
		
		const Generated = 'Generated'; //1,
		const Viewed = 'Viewed'; //2,
		const Underpaid = 'Underpaid'; //3,
		const Overpaid = 'Overpaid'; //4,
		const Paid = 'Paid'; //5,
		const Voided = 'Voided'; //6,
		const WithError = 'WithError'; //99,
	}
