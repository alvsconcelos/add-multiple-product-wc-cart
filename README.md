# Add Multiple Products to Cart via URL for WooCommerce

> Add multiple products to the WooCommerce cart in a single URL request — no custom API, no JavaScript, just native WooCommerce parameters.

[![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue)](https://wordpress.org)
[![WooCommerce](https://img.shields.io/badge/WooCommerce-5.0%2B-96588a)](https://woocommerce.com)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-777bb4)](https://php.net)
[![License](https://img.shields.io/badge/License-GPLv3-green)](https://www.gnu.org/licenses/gpl-3.0.html)
[![WordPress.org](https://img.shields.io/wordpress/plugin/v/add-multiple-products-to-cart-via-url-for-woocommerce)](https://wordpress.org/plugins/add-multiple-products-to-cart-via-url-for-woocommerce/)

---

## The problem

WooCommerce natively supports adding a single product to the cart via URL (`?add-to-cart=123&quantity=2`), but there's no built-in way to add multiple products in one request — which is a common need for marketing links, QR codes, and order forms.

## The solution

This plugin extends the native `add-to-cart` URL parameter to accept multiple products in a single request:

```
?add-to-cart=product_id:quantity,product_id:quantity,product_id:quantity
```

- **Specific quantities:** `example.com/cart/?add-to-cart=12:2,34:1,56:5`
- **Default quantity (1):** `example.com/cart/?add-to-cart=12,34:2,56`

Supports **simple** and **variable** product types. No configuration needed — works immediately after activation.

## Configuration

The plugin works out of the box, but you can override the default limits in `wp-config.php`:

```php
// Max number of products processed per URL request (default: 50)
define( 'ADD_MULTIPLE_TO_WC_CART_PRODUCT_LIMIT', 50 );

// Max quantity allowed per individual product (default: 999)
define( 'ADD_MULTIPLE_TO_WC_CART_QTY_MAXIMUM', 999 );
```

Quantities above the maximum are silently clamped. Products beyond the limit are silently ignored.

## Installation

### Via WordPress dashboard

1. Go to **Plugins → Add New**
2. Search for `Add multiple products to cart via url`
3. Click **Install Now** and **Activate**

### Manual

1. Download the `.zip` from [wordpress.org/plugins](https://wordpress.org/plugins/add-multiple-products-to-cart-via-url-for-woocommerce/)
2. Go to **Plugins → Add New → Upload Plugin**, select the `.zip`, and activate

## Development

### Requirements

- PHP 7.4+
- [Composer](https://getcomposer.org)

### Run tests

```bash
composer install
./vendor/bin/phpunit
```

Tests use [PHPUnit 10](https://phpunit.de) and [Brain\Monkey](https://brain-wp.github.io/BrainMonkey/) for mocking WordPress/WooCommerce functions.

### Repository structure

```
.
├── trunk/              # Plugin source (synced to SVN/WordPress.org)
│   ├── includes/
│   ├── languages/
│   └── add-multiple-product-wc-cart.php
├── tags/               # Published versions (SVN)
├── tests/              # Test suite (Git only)
├── composer.json
└── phpunit.xml
```

## Changelog

### 1.1.0
- Tested and compatible with WordPress 6.9.4 and WooCommerce 10.x
- Added `Requires Plugins: woocommerce` header (WordPress 6.5+ standard)
- Added configurable product limit per request (`ADD_MULTIPLE_TO_WC_CART_PRODUCT_LIMIT`, default: 50)
- Added configurable max quantity per product (`ADD_MULTIPLE_TO_WC_CART_QTY_MAXIMUM`, default: 999)
- Improved readme with expanded Installation, FAQ, and Configuration sections
- PHPUnit test suite added

### 1.0
- Initial release

## License

GPLv3 or later — see [LICENSE](https://www.gnu.org/licenses/gpl-3.0.html).
