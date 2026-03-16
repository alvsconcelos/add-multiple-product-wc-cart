<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Brain\Monkey;

define( 'ABSPATH', __DIR__ . '/' );
define( 'ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_VERSION', '1.1.0' );
define( 'ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_PLUGIN_FILE', __DIR__ . '/../trunk/add-multiple-product-wc-cart.php' );
define( 'ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_PLUGIN_PATH', __DIR__ . '/../trunk/' );

require_once __DIR__ . '/../trunk/includes/class-alvsamtw-add-multiple-to-wc-cart.php';

// Stub WordPress functions used by the plugin.
if ( ! function_exists( 'sanitize_text_field' ) ) {
	function sanitize_text_field( $str ) { return strip_tags( $str ); }
}
if ( ! function_exists( 'wp_unslash' ) ) {
	function wp_unslash( $value ) { return stripslashes_deep( $value ); }
}
if ( ! function_exists( 'stripslashes_deep' ) ) {
	function stripslashes_deep( $value ) {
		return is_array( $value ) ? array_map( 'stripslashes_deep', $value ) : stripslashes( $value );
	}
}
if ( ! function_exists( 'wc_nocache_headers' ) ) {
	function wc_nocache_headers() {}
}
