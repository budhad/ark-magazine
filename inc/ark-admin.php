<?php 

namespace ArkMagazine;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ArkAdmin {
	function __construct() {
		
	}

	public function init() {
		add_action('admin_menu', [$this, 'create_magazine_admin_menu'], 9);
	}

	public function create_magazine_admin_menu() {
		add_menu_page( 'Магазин виртуальных товаров', 'ARK Магазин', 'edit_others_posts', 'ark-magazine', [$this, 'console_page'], 'dashicons-buddicons-activity', 26 );
		// Регистрация страницы настроек, опций плагина
		// параметры: $option_group, $option_name, $sanitize_callback
		register_setting( 'ark_option_group', 'ark_options', [$this, 'magazine_options_validation'] );

		// параметры: $id, $title, $callback, $page
		add_settings_section( 'ark_sections', 'Основные настройки', '', 'ark_settings' ); 

		// параметры: $id, $title, $callback, $page, $section, $args
		$field_token = array(
			'id'        => 'ark_token',
			'label_for' => 'ark_token' 
		);
		add_settings_field( 'field_token', 'Токен с сайта Leads.su', [$this, 'magazine_options_display'], 'ark_settings', 'ark_sections', $field_token );

		add_submenu_page( 'ark-magazine', 'Настройки', 'Настройки', 'manage_options', 'ark_settings', [$this, 'get_magazine_options_page'], 10 ); 

		// add_submenu_page( 'ark-magazine', 'Категории товаров', 'Категории товаров', 'manage_options', 'edit-tags.php?post_type=ark_product&taxonomy=ark_categories');
	}
	
	// callback Для всех input формы настроек
	public function magazine_options_display($args) {
		extract( $args );
		$val = '';
		if (!empty($this->options[$id])) {
			$val = esc_attr( stripslashes($this->options[$id]) );
		} 

		switch ( $id ) {
			case 'ark_token': 
				echo "<input class='regular-text' type='text' id='$id' name='ark_options[$id]' value='$val' />";  
				echo "<br />"; 
			break;
		}
	}	

	public function console_page() {
		echo '<h2> Статистика и прочая хрень </h2>';
	}

	// Валидация введнных данных
	public function magazine_options_validation($input) {
		foreach($input as $k => $v) {
			$valid_input[$k] = trim($v);
			/* проверки значений */
		}
		return $valid_input;
	}

	// html страницы нсатроек
	public function get_magazine_options_page() { ?>
		<div class="wrap">
			<form id="ark_options_form" action="options.php" method="POST">
				<?php 
					settings_fields( 'ark_option_group' );   
					do_settings_sections( 'ark_settings' ); 
					submit_button('Сохранить настройки');
				?>
			</form>
		</div>
	<?php
	}	

}