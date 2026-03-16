<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Brain\Monkey;

define( 'ABSPATH', __DIR__ . '/' );
define( 'ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_VERSION', '1.1.0' );
define( 'ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_PLUGIN_FILE', __DIR__ . '/../trunk/add-multiple-product-wc-cart.php' );
define( 'ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_PLUGIN_PATH', __DIR__ . '/../trunk/' );

require_once __DIR__ . '/../trunk/includes/class-alvsamtw-add-multiple-to-wc-cart.php';
