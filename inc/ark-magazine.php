<?php

global $arkHelp;

require_once $arkHelp->get_plugin_dir_path() . 'inc/ark-admin.php';
require_once $arkHelp->get_plugin_dir_path() . 'inc/ark-product.php';
require_once $arkHelp->get_plugin_dir_path() . 'inc/ark-news.php';

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
