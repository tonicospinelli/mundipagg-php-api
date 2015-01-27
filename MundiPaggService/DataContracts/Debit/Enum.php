<?php
	const NEWLINE = '<br>';

	class MundiPaggService_DataContracts_Debit_AddressTypeEnum {
		const __default = self::Billing;

        const Billing = 'Billing';
        const Shipping = 'Shipping';
        const Comercial = 'Comercial';
        const Residential = 'Residential';
    }

    class MundiPaggService_DataContracts_Debit_CountryEnum {
    	const __default = self::Brazil;

        const Brazil = 'Brazil';
        const USA = 'USA';
        const Argentina = 'Argentina';
        const Bolivia = 'Bolivia';
        const Chile = 'Chile';
        const Colombia = 'Colombia';
        const Uruguay = 'Uruguay';
        const Mexico = 'Mexico';
        const Paraguay = 'Paraguay';
    }

	class MundiPaggService_DataContracts_Debit_GenderEnum {
		const __default = self::M;

        const M = 'M';
        const F = 'F';
    }

	class MundiPaggService_DataContracts_Debit_PaymentMethodEnum {
		const __default = self::Bradesco;

        const Bradesco = 'Bradesco';
        const Itau = 'Itau';
        const BancoDoBrasil = 'BancoDoBrasil';
        const VBV = 'VBV';
        const Sitef = 'Sitef';
    }


	class MundiPaggService_DataContracts_Debit_OnlineDebitTransactionStatusEnum {
		const __default = self::OpenedPendingPayment;

        const OpenedPendingPayment = 'OpenedPendingPayment';
        const NotPaid = 'NotPaid';
        const Paid = 'Paid';
        const UnderPaid = 'UnderPaid';
        const OverPaid = 'OverPaid';
        const NotFound = 'NotFound';
        const WithError = 'WithError';

    }

	class MundiPaggService_DataContracts_Debit_PersonTypeEnum {
		const __default = self::Person;

        const Person = 'Person';
        const Company = 'Company';

    }


	class MundiPaggService_DataContracts_Debit_PhoneTypeEnum {
		const __default = self::Mobile;

        const Mobile = 'Mobile';
        const Residential = 'Residential';
        const Comercial = 'Comercial';
    }

    class MundiPaggService_DataContracts_Debit_TaxDocumentTypeEnum {
    	const __default = self::CPF;

        const CPF = 'CPF';
        const CNPJ = 'CNPJ';
    }

    class MundiPaggService_DataContracts_Debit_SeverityCodeEnum {
        const __default = self::Error;

        const Error = 'Error';
        const Warning = 'Warning';
    }
