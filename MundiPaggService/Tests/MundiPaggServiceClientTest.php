<?php

include_once "AuxFunctions.php";
include_once dirname(__FILE__) . '/../../MundiPaggServiceConfiguration.php';

class MundiPaggService_Tests_ClientTest extends PHPUnit_Framework_TestCase {
    const MERCHANT_KEY = "8A2DD57F-1ED9-4153-B4CE-69683EFADAD5";

    function testCreateOrder() {
        $this->markTestIncomplete('Some error was occurred with soap communication');
		$orderRequest = CreateOrder();
        $orderRequest->MerchantKey = self::MERCHANT_KEY;
		
		$client = new MundiPaggService_ServiceClient_SoapClient('LOCAL');
		
		$orderResponse = $client->CreateOrder($orderRequest);
		
		$this->assertEquals(strtolower(self::MERCHANT_KEY), strtolower($orderResponse->MerchantKey));
		$this->assertEquals(strtolower(MundiPaggService_DataContracts_OrderStatusEnum::Paid), strtolower($orderResponse->OrderStatusEnum));
		$this->assertEquals(true, $orderResponse->Success);
		$this->assertEquals('1.0', $orderResponse->Version);
		$this->assertNull($orderResponse->MundiPaggSuggestion);
		$this->assertNull($orderResponse->ErrorReport);
	}



}	
