<?php

class MundiPaggService_DataContracts_BoletoTransactionResult {

	/*@var [long] Transaction amount in cents */
	public $AmountInCents; // long
	/*@var [string] Barcode of boleto*/
	public $Barcode; 
	/*@var [MundiPaggService_DataContracts_BoletoTransactionStatusEnum] Boleto Transaction status */
	public $BoletoTransactionStatusEnum; 
	/*@var [string] Boleto URL */
	public $BoletoUrl; 
	/*@var [string] Custom Status*/
	public $CustomStatus;
	/*@var [string] Number used to identify the boleto */
	public $NossoNumero;
	/*@var [bool] Fail or success transaction*/
	public $Success; 
	/*@var [Guid] The Transaction Key*/
	public $TransactionKey;
	/*@var [string] The Transaction Reference*/
	public $TransactionReference; 
}
