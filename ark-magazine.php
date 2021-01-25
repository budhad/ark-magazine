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

namespace ArkMagazine;

// $arkHelp = new ArkHelp();
// ArkHelp::instance();
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ARK_PLUGIN_BASENAME', plugin_basename(__FILE__) );
define( 'ARK_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__) );
define( 'ARK_PLUGIN_DIR_URL', plugin_dir_url(__FILE__) );

require_once ARK_PLUGIN_DIR_PATH . 'inc/ark-magazine.php';

// $arkMagazine = new ArkMagazine();


// class ArkHelp {
// 	private static $_instance = null;
// 	private static $plugin_basename;
// 	private static $plugin_dir_path;
// 	private static $plugin_dir_url;

// 	public static function instance() {
// 		if ( is_null( self::$_instance ) ) {
// 			self::$_instance = new self();
// 		}
// 		return self::$_instance;
// 	}

// 	function __construct() {
// 		$this->plugin_basename = plugin_basename(__FILE__);
// 		$this->plugin_dir_path = plugin_dir_path(__FILE__);
// 		$this->plugin_dir_url = plugin_dir_url(__FILE__);
// 	}

// 	public static function get_plugin_basename() {
// 		return self::$plugin_basename;
// 	}
// 	public static function get_plugin_dir_path() {
// 		return self::$plugin_dir_path;
// 	}
// 	public static function get_plugin_dir_url() {
// 		return self::$plugin_dir_url;
// 	}
// }



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