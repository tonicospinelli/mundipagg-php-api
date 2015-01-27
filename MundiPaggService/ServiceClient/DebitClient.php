<?php

/**
* @author: Matheus
* @version: 1.0
* revision: 2014/09/09
*/
class MundiPaggService_ServiceClient_DebitClient implements MundiPaggService_ServiceClient_IDebitClient {

	const CREATE_ORDER_RESOURCE = "/Order/OnlineDebit/";
	const QUERY_ORDER_RESOURCE = "/Order/OnlineDebit/Query/";

	private $serviceUri = NULL;
	public function GetServiceUri() {

		if (is_null($this->serviceUri) == true) {

			$this->serviceUri = constant("MP_DEBIT_SERVICE_URI");
		}
		return $this->serviceUri;
	}

	private $operationTimeout = NULL;
	public function GetOperationTimeout() {

		if (is_null($this->operationTimeout) == true) {

			$this->operationTimeout = constant("MP_OPERATION_TIME_OUT");
		}
		return $this->operationTimeout;
	}

	private $converter = NULL;
	public function GetDebitConverter() {

		if (is_null($this->converter) == true) { $this->converter = new MundiPaggService_Converters_DebitConverter(); }
		return $this->converter;
	}

	private $httpClient = NULL;
	public function GetHttpClient() {

		if (is_null($this->httpClient) == true) { $this->httpClient = new MundiPaggService_Helpers_BasicHttpClient(); }
		return $this->httpClient;
	}


	function __construct($serviceUri = NULL, $operationTimeout = NULL, MundiPaggService_Converters_IDebitConverter $converter = NULL, MundiPaggService_Helpers_IHttpClient $httpClient = NULL) {

		$this->serviceUri = $serviceUri;
		$this->converter = $converter;
		$this->operationTimeout = $operationTimeout;
		$this->httpClient = $httpClient;
	}

	/**
	* Creates an order.
	* @param MundiPaggService_DataContracts_Debit_OnlineDebitRequest $onlineDebitRequest The order to be created.
	*/
	public function CreateOrder(MundiPaggService_DataContracts_Debit_OnlineDebitRequest $onlineDebitRequest) {

		$converter = $this->GetDebitConverter();

		$requestArray = $converter->ConvertFromOnlineDebitRequest($onlineDebitRequest);

		$serviceUri = $this->GetServiceUri() . MundiPaggService_ServiceClient_DebitClient::CREATE_ORDER_RESOURCE;

		$responseArray = $this->SendPostRequest($serviceUri, $requestArray);

		$onlineDebitResponse = $converter->ConvertToOnlineDebitResult($responseArray);

		return $onlineDebitResponse;
	}

	public function QueryOrder($orderIdentification, $merchantKey = NULL) {

		if (is_null($orderIdentification) == true || is_string($orderIdentification) == false) {

			throw new InvalidArgumentException("OrderIdentification must be a string.");
		}

		if (is_null($merchantKey) == true) {

			$merchantKey = constant("MP_MERCHANT_KEY");
		}

		$serviceUri = $this->GetServiceUri() . MundiPaggService_ServiceClient_DebitClient::QUERY_ORDER_RESOURCE . urlencode($orderIdentification);

		$responseArray = $this->SendGetRequest($serviceUri, $merchantKey);

		$converter = $this->GetDebitConverter();

		$onlineDebitResponse = $converter->ConvertToQueryOrderResponse($responseArray);

		return $onlineDebitResponse;
	}

	private function SendGetRequest($uri, $merchantKey) {

		$httpHeader = array('Accept: application/json', 'MerchantKey: ' . $merchantKey);

		$httpClient = $this->GetHttpClient();
		$httpClient->SetUri($uri);
		$httpClient->SetOperationTimeout($this->GetOperationTimeout());
		$httpClient->SetHttpHeader($httpHeader);

		$httpResponse = $httpClient->GetData();
		//$httpResponse = $httpClient->GetData($uri, $this->GetOperationTimeout(), $httpHeader, $httpStatusCode);

		$responseArray = json_decode($httpResponse->ResponseContent);

		return $responseArray;		
	}

	private function SendPostRequest($uri, array $requestArray) {

		$postData = json_encode($requestArray, JSON_PRETTY_PRINT);

		$httpHeader = array('Content-Type: application/json', 'Accept: application/json');

		$httpClient = $this->GetHttpClient();
		$httpClient->SetUri($uri);
		$httpClient->SetOperationTimeout($this->GetOperationTimeout());
		$httpClient->SetHttpHeader($httpHeader);

		$httpResponse = $httpClient->PostData($postData);
		//$httpResponse = $httpClient->PostData($postDat, $uri, $this->GetOperationTimeout(), $httpHeader);

		$responseArray = json_decode($httpResponse->ResponseContent);

		return $responseArray;
	}
}
