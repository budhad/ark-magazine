<?php

namespace ArkMagazine;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ARK_PLUGIN_DIR_PATH . 'inc/ark-admin.php';
require_once ARK_PLUGIN_DIR_PATH . 'inc/ark-product.php';
require_once ARK_PLUGIN_DIR_PATH . 'inc/ark-news.php';

class ArkMagazine {
	public static $instance = null;

	public $product;

	public static function instance() {
		if (is_null(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	function __construct() {
		$this->admin = new ArkAdmin();
		$this->admin->init();
		$this->product = ArkProduct::instance();
		// $this->product->init();
		$this->news = new ArkNews();
		$this->news->init();
	}
}

ArkMagazine::instance();

