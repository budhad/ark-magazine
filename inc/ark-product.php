<?php

namespace ArkMagazine;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ArkProduct {
    private static $instance = null;

    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

	function __construct() {
		add_action('init', [$this, 'register_product']);
		add_action('init', [$this, 'register_product_taxonomy']);
	}

	// public function init() {

	// }

	public function register_product_taxonomy() {
		register_taxonomy('ark_categories', ['ark_product'] ,array(
            'label' => 'Категории товаров',
            'labels'    => array(
                'name'               => 'Категории товаров',
                'singular_name'      => 'Категория товара',
                'add_new'            => 'Добавить категорию товара',
                'add_new_item'       => 'Добавить категорию товара',
                'edit_item'          => 'Редактировать категорию товара',
                'new_item'           => 'Новая категория товара',
                'view_item'          => 'Посмотреть категорию товара',
                'search_items'       => 'Найти категорию товара',
                'not_found'          => 'Категорий товаров не найдено',
                'parent_item_colon'  => '',
                'menu_name'          => 'Категории товаров'
            ),
            'public'    => true,
            'hierarchical'  => true,
            'show_admin_column' => true,
            'show_in_quick_edit'    => true,
        ));
	}

	public function register_product() {
        register_post_type( 'ark_product', array(
            'label' => 'ARK Товары',
            'labels'    => array(
				'name'               => 'ARK Товары',
				'all_items'		     => 'Товары',
                'singular_name'      => 'Товар',
                'add_new'            => 'Добавить товар',
                'add_new_item'       => 'Добавить товар',
                'edit_item'          => 'Редактировать товар',
                'new_item'           => 'Новый товар',
                'view_item'          => 'Посмотреть товар',
                'search_items'       => 'Найти товар',
                'not_found'          => 'Товаров не найдено',
                'not_found_in_trash' => 'В корзине товаров не найдено',
                'parent_item_colon'  => '',
            ),
            'public'    	=> true,
            'menu_icon' 	=> 'dashicons-buddicons-activity',
			'supports'  	=> ['thumbnail', 'title', 'editor', 'custom-fields', 'comments'],
        ) );
	}		

    public static function get_wp_products( $id = null, $count = null, $offset = null ) {
        $args = [
            'post_type'     => 'ark_product',
            'post_status'   => 'publish'
            // 'paged'      => 1
        ];

        if (!is_null($count)) {
            $args['posts_per_page'] = $count;
        }

        if (!is_null($offset)) {
            $args['offset'] = $offset;
        }

        if (!is_null($id)) {
            $args['page_id'] = $id;
        }

        $products = new \WP_Query($args);
        if ( is_wp_error( $products )) {
            // $products->get_error_message();
            return null;
        }

        return $products;
    }
}