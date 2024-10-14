<?php

/**
 * Enqueye theme assets
 *
 * @package Basematic
 */

 namespace BASEMATIC_THEME\Inc;

use BASEMATIC_THEME\Inc\Traits\Singleton;

 Class Assets{
 	use Singleton;

 	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		// used init because otherwise registered styles won't show up in the editor.
		add_action('wp_enqueue_scripts', [$this, 'register_styles']);
		add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
		add_action('enqueue_block_editor_assets', [$this, 'register_styles']);
		add_action('enqueue_block_editor_assets', [$this, 'register_scripts']);
		add_action('wp_footer', [$this, 'load_footer_styles']);
	}

 	public function register_styles(){
		wp_register_style( 'base-style', BASEMATIC_THEME_PATH.'/style.css' );
		wp_register_style( 'base-nav', BASEMATIC_THEME_PATH.'/assets/styles/mmenu.css' );
		wp_register_style( 'swiffy-slider', BASEMATIC_THEME_PATH.'/assets/styles/swiffy.css' );
		//wp_register_style( 'phosphor-icons', '' );
		wp_register_style( 'google-fonts-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap' );
        wp_enqueue_style( 'base-nav' );
        wp_enqueue_style( 'base-style' );
        wp_enqueue_style( 'swiffy-slider' );
	}

	public function load_footer_styles(){
		//wp_enqueue_style( 'phosphor-icons' );
		wp_enqueue_style( 'google-fonts-open-sans' );
	}

	public function register_scripts(){
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
		wp_register_script( 'base-scripts', BASEMATIC_THEME_PATH.'/assets/scripts/main.js', array(), false,array('strategy' => 'async', 'in_footer' => true));
		wp_register_script( 'phosphor-icons', 'https://unpkg.com/@phosphor-icons/web', array(), false,array('strategy' => 'async', 'in_footer' => true));
	    wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'base-scripts' );
		wp_enqueue_script( 'phosphor-icons' );
	}
 }