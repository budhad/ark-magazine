<?php
 /* Plugin Name: ARK Магазин
 * Description: Создание магазина для приема платежей
 * Author:      NikiTikiTa
 * Version:     0.0.1
 *
 * Text Domain: ark-magazine
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * */

// change by testForTest

$arkHelp = new ArkHelp();

require_once $arkHelp->get_plugin_dir_path() . 'inc/ark-magazine.php';

$arkMagazine = new ArkMagazine();


class ArkHelp {
	private $plugin_basename;
	private $plugin_dir_path;
	private $plugin_dir_url;

	function __construct() {
		$this->plugin_basename = plugin_basename(__FILE__);
		$this->plugin_dir_path = plugin_dir_path(__FILE__);
		$this->plugin_dir_url = plugin_dir_url(__FILE__);
	}

	public function get_plugin_basename() {
		return $this->plugin_basename;
	}
	public function get_plugin_dir_path() {
		return $this->plugin_dir_path;
	}
	public function get_plugin_dir_url() {
		return $this->plugin_dir_url;
	}
}



// define('LEAD_CONST', array(
//     'plugin_dir_path'     => plugin_dir_path(__FILE__),
//     'plugin_dir_url'    => plugin_dir_url(__FILE__),
//     'plugin_basename'   => plugin_basename(__FILE__)
// ));

// Класс управления плагином в админке
// require_once LEAD_CONST['plugin_dir_path'] . 'inc/lead-admin.php'; 
// $admin = new LeadAdmin();

// Класс управления офферами (Скачать, обновить, внести изменения)
// require_once LEAD_CONST['plugin_dir_path'] . 'inc/lead-offers.php'; 
// $offers = new LeadOffers($admin);

// Регистрация типов записей, таксономий, скриптов, стилей
// привязка callback-ов к методам классов
// require_once LEAD_CONST['plugin_dir_path'] . 'inc/lead-register.php'; 


?>