=== Add multiple products to cart via url for Woocommerce ===
Contributors: alvsconcelos
Donate link: https://www.paypal.com/donate/?hosted_button_id=UUF8HHCVQNG6G
Tags: woocommerce, cart, products, add-to-cart, url
Requires at least: 5.0
Tested up to: 6.9.4
Requires PHP: 7.4
Stable tag: 1.1.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Requires Plugins: woocommerce

Add multiple products to WooCommerce cart with native add-to-cart parameters.

== Description ==

This plugin allows adding multiple **simple** (not variable or grouped) products to the WooCommerce cart using URL parameters. While WooCommerce natively supports adding a single product to the cart via a URL parameter like `add-to-cart=product_id&quantity=quantity`, this plugin extends that functionality to support multiple products in a single URL.

### How it works:
- **URL Format:** `?add-to-cart=product_id:quantity,product_id:quantity,product_id:quantity`
- **Single Quantity:** If the quantity is not specified (eg. `?add-to-cart=product_id,product_id:quantity`), the product is added with a quantity of 1.

### Examples:
- Adding multiple products with specific quantities:
`example.com/cart/?add-to-cart=12:2,34:1,56:5`
- Adding multiple products with default quantity:
`example.com/cart/?add-to-cart=12,34:2,56`

== Installation ==

= Automatic installation =

1. In your WordPress dashboard, go to **Plugins → Add New**.
2. Search for `Add multiple products to cart via url`.
3. Click **Install Now** and then **Activate**.

= Manual installation =

1. Download the plugin `.zip` file.
2. In your WordPress dashboard, go to **Plugins → Add New → Upload Plugin**.
3. Select the `.zip` file and click **Install Now**, then **Activate**.

= After activation =

No configuration needed — the plugin works immediately after activation. Use the URL format described in the Description section to start adding multiple products to the cart.

== Configuration ==

The plugin works out of the box with no configuration required. However, you can optionally define the following constants in your `wp-config.php` to adjust the default limits:

**Maximum products per request (default: 50)**
`define( 'ADD_MULTIPLE_TO_WC_CART_PRODUCT_LIMIT', 50 );`
Limits how many product entries are processed in a single URL. Extra products beyond the limit are silently ignored.

**Maximum quantity per product (default: 999)**
`define( 'ADD_MULTIPLE_TO_WC_CART_QTY_MAXIMUM', 999 );`
Caps the quantity of each individual product. Any quantity above this value is clamped to the maximum.

Example — allow up to 10 products with a max qty of 100:
`define( 'ADD_MULTIPLE_TO_WC_CART_PRODUCT_LIMIT', 10 );`
`define( 'ADD_MULTIPLE_TO_WC_CART_QTY_MAXIMUM', 100 );`

== Frequently Asked Questions ==

= How do I add multiple products to the cart? =

Use the URL format: `?add-to-cart=product_id:quantity,product_id:quantity`

For example: `https://yourstore.com/cart/?add-to-cart=12:2,34:1,56:5` will add product 12 (qty 2), product 34 (qty 1), and product 56 (qty 5) to the cart in a single request.

= What happens if I don't specify a quantity? =

If no quantity is specified, the product will be added with a quantity of 1. Example: `?add-to-cart=12,34:2,56` adds products 12 and 56 with qty 1, and product 34 with qty 2.

= Does it work with variable or grouped products? =

The plugin supports **simple** and **variable** product types. Grouped products are not supported.

= Does it work with WooCommerce Blocks? =

The plugin hooks into WooCommerce's native `wp_loaded` action and works independently of the cart page template (classic or blocks).

= Is WooCommerce required? =

Yes, WooCommerce must be installed and active. The plugin will do nothing if WooCommerce is not detected.

== Screenshots ==

1. Example of URL format with multiple products.

== Changelog ==

= 1.1.0 =
* Tested and compatible with WordPress 6.9.4 and WooCommerce 10.x.
* Added `Requires Plugins: woocommerce` header (WordPress 6.5+ standard).
* Added configurable limit of 50 products per request (overridable via `wp-config.php`).
* Added configurable maximum quantity of 999 per product (overridable via `wp-config.php`).
* Fixed internal hook re-registration argument count.
* Improved readme with expanded Installation, FAQ, and Configuration sections.
* Added PHPUnit test suite (available in the GitHub repository).

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.1.0 =
Compatibility update for WordPress 6.9.4 and WooCommerce 10.x. Recommended for all users.

= 1.0 =
Initial release of the plugin. Adds support for adding multiple simple and variable products to the WooCommerce cart via URL parameters.
