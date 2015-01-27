<?php

/**
* @author: Matheus
* @version: 1.0
* revision: 2014/09/09
*/
interface MundiPaggService_ServiceClient_IReportClient {

	/**
	* Gets and saves a report file with the given date.
	* @param MundiPaggService_DataContracts_Debit_OnlineDebitRequest $onlineDebitRequest The order to be created.
	*/
	public function SaveReportFile(DateTime $fileDate, $filename, $merchantKey = NULL);

	/**
	* Gets a report file with the given date.
	* @param String $fileDate The date of the file to be returned.
	* @param Guid $merchantKey (Optional) The merchant identification.
	*/
	public function GetStream(DateTime $fileDate, $merchantKey = NULL);

	/**
	* Gets a report file with the given date.
	* @param String $fileDate The date of the file to be returned.
	* @param Guid $merchantKey (Optional) The merchant identification.
	*/
	public function GetBytes(DateTime $fileDate, $merchantKey = NULL);
}
