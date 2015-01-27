<?php

class MundiPaggService_Tests_ClientTest extends PHPUnit_Framework_TestCase {
	function testCreateOrder() {
		$orderRequest = new MundiPaggService_DataContracts_CreateOrderRequest();
		
		$client = new MundiPaggService_ServiceClient_SoapClient();
		
		$orderResponse = $client->CreateOrder($orderRequest);
		
		$this->assertEquals(strtolower(MerchantKey), strtolower($orderResponse->MerchantKey));
		$this->assertEquals(strtolower(MundiPaggService_DataContracts_OrderStatusEnum::Paid), strtolower($orderResponse->OrderStatusEnum));
		$this->assertEquals(true, $orderResponse->Success);
		$this->assertEquals('1.0', $orderResponse->Version);
		$this->assertNull($orderResponse->MundiPaggSuggestion);
		$this->assertNull($orderResponse->ErrorReport);
	}



}	
