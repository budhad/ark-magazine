<?php

namespace ArkMagazine;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once ARK_PLUGIN_DIR_PATH . 'inc/ark-admin.php';
require_once ARK_PLUGIN_DIR_PATH . 'inc/ark-product.php';
require_once ARK_PLUGIN_DIR_PATH . 'inc/ark-news.php';

class ArkMagazine {
	function __construct() {
		$this->admin = new ArkAdmins();
		$this->admin->init();
		$this->product = new ArkProduct();
		$this->product->init();
		$this->product = new ArkNews();
		$this->product->init();
	}
}


