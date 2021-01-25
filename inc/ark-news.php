<?php

namespace ArkMagazine;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ArkNews {
	function __construct() {

	}

	public function init() {
		add_action('init', [$this, 'register_product']);
		// add_action('init', [$this, 'register_product_taxonomy']);
	}

	public function register_product_taxonomy() {
		// register_taxonomy('ark_categories', ['ark_product'] ,array(
        //     'label' => 'Yjdjcnb',
        //     'labels'    => array(
        //         'name'               => 'Категории товаров',
        //         'singular_name'      => 'Категория товара',
        //         'add_new'            => 'Добавить категорию товара',
        //         'add_new_item'       => 'Добавить категорию товара',
        //         'edit_item'          => 'Редактировать категорию товара',
        //         'new_item'           => 'Новая категория товара',
        //         'view_item'          => 'Посмотреть категорию товара',
        //         'search_items'       => 'Найти категорию товара',
        //         'not_found'          => 'Категорий товаров не найдено',
        //         'parent_item_colon'  => '',
        //         'menu_name'          => 'Категории товаров'
        //     ),
        //     'public'    => true,
        //     'hierarchical'  => true,
        //     'show_admin_column' => true,
        //     'show_in_quick_edit'    => true,
        // ));
	}

	public function register_product() {
        register_post_type( 'ark_news', array(
            'label' => 'ARK Новости',
            'labels'    => array(
				'name'               => 'ARK Новости',
				'all_items'		     => 'Новости',
                'singular_name'      => 'Новость',
                'add_new'            => 'Добавить новость',
                'add_new_item'       => 'Добавить новость',
                'edit_item'          => 'Редактировать новость',
                'new_item'           => 'Новый новость',
                'view_item'          => 'Посмотреть новость',
                'search_items'       => 'Найти новость',
                'not_found'          => 'Новостей не найдено',
                'not_found_in_trash' => 'В корзине новостей не найдено',
                
                // 'parent_item_colon'  => '',
            ),
            'public'    	=> true,
            'menu_icon' 	=> 'dashicons-buddicons-activity',
            'supports'  	=> ['thumbnail', 'title', 'editor', 'custom-fields', 'comments'],
            'show_in_menu'       => 'ark-magazine'
        ) );
	}		

}