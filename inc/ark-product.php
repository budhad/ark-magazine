<?php

class ArkProduct {
	function __construct() {

	}

	public function init() {
		add_action('init', [$this, 'register_product']);
		add_action('init', [$this, 'register_product_taxonomy']);
	}

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

}