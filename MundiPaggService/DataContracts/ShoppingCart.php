<?php

/*@global Shopping Cart */
class MundiPaggService_DataContracts_ShoppingCart {
	/*@var [integer] Freight Cost In Cents */
	public $FreightCostInCents;
	/*@var [MundiPaggService_DataContracts_ShoppingCartItem] Shopping Cart Item Collection */
	public $ShoppingCartItemCollection;

	function __construct() {
		$this->FreightCostInCents = 0;
		$this->ShoppingCartCollection = null;
	}
}
