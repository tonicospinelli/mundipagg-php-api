<?php
include_once "..\Client\MundiPaggServiceClient.php";
include_once "AuxFuncions.php";

class MundiPaggServiceClientTest extends PHPUnit_Framework_TestCase {
	function testCreateOrder() {
		$orderRequest = CreateOrder();
		
		$client = new MundiPaggServiceClient();
		
		$orderResponse = $client->CreateOrder($orderRequest);
		
		$this->assertEquals(strtolower(MerchantKey), strtolower($orderResponse->MerchantKey));
		$this->assertEquals(strtolower(OrderStatusEnum::Paid), strtolower($orderResponse->OrderStatusEnum));
		$this->assertEquals(true, $orderResponse->Success);
		$this->assertEquals('1.0', $orderResponse->Version);
		$this->assertNull($orderResponse->MundiPaggSuggestion);
		$this->assertNull($orderResponse->ErrorReport);
	}



}	
