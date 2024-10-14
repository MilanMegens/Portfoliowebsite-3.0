<?php

/**
 * Register menus
 * 
 * @package Basematic
 */
 
 namespace BASEMATIC_THEME\Inc;

use BASEMATIC_THEME\Inc\Traits\Singleton;

 Class Menus{
 	use Singleton;

 	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		// actions and filters
		add_action( 'init', [$this, 'register_menus'] );

	}

	public function register_menus(){
		register_nav_menus([
			'basematic_header_nav' 	=> esc_html__('Header menu', 'basematic'),
			'basematic_copyright_nav' => esc_html__('Copyright links', 'basematic'),
		]);	
	}

	public function get_menu_id($menu_location){
		// get all locations

		$locations = get_nav_menu_locations();

		$menu_id = $locations[$menu_location];

		return !empty($menu_id) ? $menu_id : '';

	}

	public function get_parent_menu_items($menu_array, $parent_id){

		$child_menus = [];
		
		if(!empty($menu_array) && is_array($menu_array)){
			foreach($menu_array as $menu){
				if(intval($menu->menu_item_paretn) === $parent_id){
					array_push($child_menus, $menu);
				}
			}
		}

		return $child_menus;
	}
 
 }