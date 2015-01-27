<?php

final class MundiPaggService_PostNotification_StatusNotification {
	/*@var [long] Amount In Cents */
	public $AmountInCents;
	/*@var [long] Amount Paid In Cents */
	public $AmountPaidInCents;
	/*@var [MundiPaggService_PostNotification_BoletoTransactionNotification] Boleto Transaction */
	public $BoletoTransaction;
	/*@var [MundiPaggService_PostNotification_CreditCardTransactionNotification] Credit Card Transaction */
	public $CreditCardTransaction;
	/*@var [MundiPaggService_PostNotification_OnlineDebitTransactionNotification] Online Debit Transaction */
	public $OnlineDebitTransaction;
	/*@var [string] Order Key */
	public $OrderKey;
	/*@var [string] Order Reference */
	public $OrderReference;
	/*@var [string] Order Status */
	public $OrderStatus;
	
	function __construct() {
		$this->AmountInCents = 0;
		$this->AmountPaidInCents = null;
		$this->BoletoTransaction = null;
		$this->CreditCardTransaction = null;
		$this->OrderKey = null;
		$this->OrderReference = "";
		$this->OrderStatus = MundiPaggService_DataContracts_OrderStatusEnum::__default;
	}

	/*@global Parse Xml to Status Notification */
	public static function ParseFromXml($xmlString) {
		if (is_null($xmlString)) { return null; }
		if (is_string($xmlString) == false) { return null; }
		
		MundiPaggService_PostNotification_StatusNotification::AutoSaveRequestResponseData($xmlString);
		
		$xml = simplexml_load_string($xmlString); // Cria o objeto do Xml
		
		$xml->AmountPaidInCents = null;
		
		$statusNotification = new MundiPaggService_PostNotification_StatusNotification();
		
		$statusNotification->AmountInCents = (int)$xml->AmountInCents;
		if (isset($xml->AmountPaidInCents) && ((string)$xml->AmountPaidInCents) != '') { $statusNotification->AmountPaidInCents = (int)$xml->AmountPaidInCents; }
		if (isset($xml->OrderKey) && ((string)$xml->OrderKey) != '') { $statusNotification->OrderKey = (string)$xml->OrderKey; }
		$statusNotification->OrderReference = (string)$xml->OrderReference;
		$statusNotification->OrderStatus = (string)$xml->OrderStatus;
		
		if (isset($xml->BoletoTransaction)) {
			$xmlBoleto = $xml->BoletoTransaction;
			$boletoTrans = null;
			if (!MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlBoleto)) {
				$boletoTrans = new MundiPaggService_PostNotification_BoletoTransactionNotification();
				
				$boletoTrans->AmountInCents = (int)$xmlBoleto->AmountInCents;
				if (isset($xmlBoleto->AmountPaidInCents) && !MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlBoleto->AmountPaidInCents)) { $boletoTrans->AmountPaidInCents = (int)$xmlBoleto->AmountPaidInCents; }
				$boletoTrans->BoletoExpirationDate = (string)$xmlBoleto->BoletoExpirationDate;
				$boletoTrans->NossoNumero = (string)$xmlBoleto->NossoNumero;
				$boletoTrans->StatusChangedDate = (string)$xmlBoleto->StatusChangedDate;
				if (isset($xmlBoleto->TransactionKey) && !MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlBoleto->TransactionKey)) { $boletoTrans->TransactionKey = (string)$xmlBoleto->TransactionKey; }
				
				$boletoTrans->TransactionReference = (string)$xmlBoleto->TransactionReference;
				$boletoTrans->PreviousBoletoTransactionStatus = (string)$xmlBoleto->PreviousBoletoTransactionStatus;
				$boletoTrans->BoletoTransactionStatus = (string)$xmlBoleto->BoletoTransactionStatus;
			}
			
			$statusNotification->BoletoTransaction = $boletoTrans;
		}
		
		if (isset($xml->CreditCardTransaction)) {
			$xmlCC = $xml->CreditCardTransaction;
			$ccTrans = null;
			if (!MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlCC) ) {
				$ccTrans = new MundiPaggService_PostNotification_CreditCardTransactionNotification();
				
				$ccTrans->Acquirer = (string)$xmlCC->Acquirer;
				if (isset($xmlCC->AmountInCents) && !MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlCC->AmountInCents)) { $ccTrans->AmountInCents = (int)$xmlCC->AmountInCents; }
				if (isset($xmlCC->AuthorizedAmountInCents) && !MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlCC->AuthorizedAmountInCents)) { $ccTrans->AuthorizedAmountInCents = (int)$xmlCC->AuthorizedAmountInCents; }
				if (isset($xmlCC->CapturedAmountInCents) && !MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlCC->CapturedAmountInCents)) { $ccTrans->CapturedAmountInCents = (int)$xmlCC->CapturedAmountInCents; }
				$ccTrans->CreditCardBrand = (string)$xmlCC->CreditCardBrand;
				if (isset($xmlCC->RefundedAmountInCents) && !MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlCC->RefundedAmountInCents)) { $ccTrans->RefundedAmountInCents = (int)$xmlCC->RefundedAmountInCents; }
				$ccTrans->StatusChangedDate = (string)$xmlCC->StatusChangedDate;
				$ccTrans->TransactionIdentifier = (string)$xmlCC->TransactionIdentifier;
				$ccTrans->TransactionKey = (string)$xmlCC->TransactionKey;
				$ccTrans->TransactionReference = (string)$xmlCC->TransactionReference;
				$ccTrans->UniqueSequentialNumber = (string)$xmlCC->UniqueSequentialNumber;
				if (isset($xmlCC->VoidedAmountInCents) && !MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlCC->VoidedAmountInCents)) { $ccTrans->VoidedAmountInCents = (int)$xmlCC->VoidedAmountInCents; }
				$ccTrans->PreviousCreditCardTransactionStatus = (string)$xmlCC->PreviousCreditCardTransactionStatus;
				$ccTrans->CreditCardTransactionStatus = (string)$xmlCC->CreditCardTransactionStatus;
			}
			
			$statusNotification->CreditCardTransaction = $ccTrans;
		}
		
		if (isset($xml->OnlineDebitTransaction)) {
			$xmlOnlineDebit = $xml->OnlineDebitTransaction;
			$onlineDebitTrans = null;
			if (!MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlOnlineDebit)) {
				$onlineDebitTrans = new MundiPaggService_PostNotification_OnlineDebitTransactionNotification();
				
				if (isset($xmlOnlineDebit->AmountInCents) && !MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlOnlineDebit->AmountInCents)) { $onlineDebitTrans->AmountInCents = (int)$xmlOnlineDebit->AmountInCents; }
				if (isset($xmlOnlineDebit->AmountPaidInCents) && !MundiPaggService_PostNotification_StatusNotification::IsNullOrEmptyXml($xmlOnlineDebit->AmountPaidInCents)) { $onlineDebitTrans->AmountPaidInCents = (int)$xmlOnlineDebit->AmountPaidInCents; }
				$onlineDebitTrans->StatusChangedDate = (string)$xmlOnlineDebit->StatusChangedDate;
				$onlineDebitTrans->TransactionKey = (string)$xmlOnlineDebit->TransactionKey;
				$onlineDebitTrans->TransactionReference = (string)$xmlOnlineDebit->TransactionReference;
				$onlineDebitTrans->PreviousOnlineDebitTransactionStatus = (string)$xmlOnlineDebit->PreviousCreditCardTransactionStatus;
				$onlineDebitTrans->OnlineDebitTransactionStatus = (string)$xmlOnlineDebit->CreditCardTransactionStatus;
			}
			
			$statusNotification->OnlineDebitTransaction = $onlineDebitTrans;
		}
		
		return $statusNotification;
	}

	/**
	* Saves the request and response.
	* @param $directory The directory where the files must be saved.
	*/
	public static function SavePostNotificationData($postData, $directory) {
		if (!MundiPaggService_PostNotification_StatusNotification::EndsWith($directory, '/') && !MundiPaggService_PostNotification_StatusNotification::EndsWith($directory, '\\')) { $directory .= '\\'; }
		
		$now = date('Y-m-d__H-i-s-') . substr((string)microtime(), 2, 4);
		
		$postFile = null;
		
		if (!is_null($postData)) {
			$postFile = $directory . 'PostNotification____' . $now . '.xml';
			$fr = fopen($postFile, 'w');
			fwrite($fr, $postData);
			fclose($fr);
		}
		
		if (is_null($postData)) { return null; }
		return $postFile;
	}
	
	/**
	* Automatically saves the post notification message.
	*/
	private static function AutoSaveRequestResponseData($postData) {
	
		if (constant("MP_ENABLE_AUTO_SAVE_MESSAGES")) {
			
			try {
				MundiPaggService_PostNotification_StatusNotification::SavePostNotificationData($postData,constant("MP_AUTO_SAVE_MESSAGES_PATH"));
			}
			catch(Exception $ex) { }
		}
	}

	private static function IsNullOrEmptyXml($xml) {
		if (is_null($xml)) { return true; }
		if ((string)$xml == '') { return true; }
		return false;
	}
	
	private static function EndsWith($str, $find) {
		return $find === "" || substr($str, -strlen($find)) === $find;
	}
}
