<?php
include_once "ShoppingCartItem.php";

class ShoppingCart {
	public $FreightCostInCents; // int
	public $ShoppingCartItemCollection; // ShoppingCartItem[]

	function __construct() {
		$this->FreightCostInCents = 0;
		$this->ShoppingCartCollection = null;
	}
}
?>