<?php

/**
 * 
 * Creating the theme.
 * 
 * @package BASEMATIC
 * 
 */


namespace BASEMATIC_THEME\Inc;

use BASEMATIC_THEME\Inc\Traits\Singleton;

class BASEMATIC_THEME {
	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
		
		CPTCase_Studies::get_instance();
		Assets::get_instance();
		Menus::get_instance();
	}

	protected function setup_hooks() {
		// actions and filters

		add_action('init', [$this, 'my_theme_support']);
		add_action('init', [$this, 'create_options_pages']);
	}
	
	public function load_gutenberg_blocks(){
		require_once BASEMATIC_DIR_PATH . '/inc/helpers/gutenberg-autoloader.php';
	}
	
	public function my_theme_support(){
		add_theme_support('align-wide');
		add_theme_support( 'custom-logo', array(
    		'height' => 480,
    		'width'  => 720,
    		'flex-width' => true,
    		'flex-height' => true,
		) );

		add_theme_support('menus');
		add_theme_support('post-thumbnails');
		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support('automatic-feed-links');

		add_theme_support('html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		]);

		add_theme_support('wp-block-styles');
		
		add_theme_support( 'title-tag' );



		global $content_width;
		if(! isset($content_width)){
			$content_width = 1240;
		}
	}

	
	function create_options_pages(){

		if( function_exists('acf_add_options_page') ) {

		    acf_add_options_page(array(
		        'page_title'    => 'Website instellingen',
		        'menu_title'    => 'Website instellingen',
		        'menu_slug'     => 'theme-settings-general',
		        'capability'    => 'edit_posts',
		        'redirect'      => false
		    ));

		    acf_add_options_sub_page(array(
		        'page_title'    => 'Website footer instellingen',
		        'menu_title'    => 'Footer instellingen',
		        'parent_slug'   => 'theme-settings-general',
		    ));

		}

	}

	


}