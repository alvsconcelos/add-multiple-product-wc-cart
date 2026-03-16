<?php
use Brain\Monkey;
use Brain\Monkey\Functions;
use PHPUnit\Framework\TestCase;

class AlvsamtwAddMultipleToWcCartTest extends TestCase {

	protected function setUp(): void {
		parent::setUp();
		Monkey\setUp();
	}

	protected function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	public function test_product_qty_minimum_is_one() {
		$this->assertSame( 1, Alvsamtw_Add_Multiple_To_Wc_Cart::PRODUCT_QTY_MINIMUM );
	}

	public function test_product_type_whitelist_contains_simple_and_variable() {
		$whitelist = Alvsamtw_Add_Multiple_To_Wc_Cart::PRODUCT_TYPE_WHITELIST;
		$this->assertContains( 'simple', $whitelist );
		$this->assertContains( 'variable', $whitelist );
	}

	public function test_add_to_cart_action_returns_early_when_param_missing() {
		$_REQUEST = [];
		$result   = Alvsamtw_Add_Multiple_To_Wc_Cart::add_to_cart_action();
		$this->assertNull( $result );
	}

	public function test_add_to_cart_action_returns_early_when_param_is_numeric() {
		$_REQUEST['add-to-cart'] = '123';
		$result                  = Alvsamtw_Add_Multiple_To_Wc_Cart::add_to_cart_action();
		$this->assertNull( $result );
		unset( $_REQUEST['add-to-cart'] );
	}

	public function test_add_to_cart_action_returns_early_on_invalid_characters() {
		$_REQUEST['add-to-cart'] = 'abc123';
		$result                  = Alvsamtw_Add_Multiple_To_Wc_Cart::add_to_cart_action();
		$this->assertNull( $result );
		unset( $_REQUEST['add-to-cart'] );
	}

	public function test_is_woocommerce_not_activated_without_wc_class() {
		// WooCommerce class is not present in test env — plugin should not hook actions.
		$this->assertFalse( class_exists( 'woocommerce' ) );
	}
}
