<?php
include_once "..\Client\MundiPaggServiceClient.php";
include_once "AuxFuncions.php";

const MerchantKey = "8A2DD57F-1ED9-4153-B4CE-69683EFADAD5";
const WSDL = "C:\wamp\www\Sdk\Client\wsdl.xml";

class MundiPaggServiceClientTest extends PHPUnit_Framework_TestCase {
	function testCreateOrder() {
		$orderRequest = CreateOrder();
		
		//var_dump($orderRequest);
		
		//exit();
		
		$client = new MundiPaggServiceClient(WSDL);
		
		$orderResponse = $client->CreateOrder($orderRequest);
		
		$this->assertEquals(strtolower(MerchantKey), strtolower($orderResponse->MerchantKey));
		$this->assertEquals(strtolower(OrderStatusEnum::Paid), strtolower($orderResponse->OrderStatusEnum));
		$this->assertEquals(true, $orderResponse->Success);
		$this->assertEquals('1.0', $orderResponse->Version);
		$this->assertNull($orderResponse->MundiPaggSuggestion);
		$this->assertNull($orderResponse->ErrorReport);
	
	}



}	
?>