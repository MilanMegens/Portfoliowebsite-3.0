<?php

/**
 * Create post type case-studies
 * 
 * @package Basematic
 */
 
namespace BASEMATIC_THEME\Inc;

use BASEMATIC_THEME\Inc\Traits\Singleton;

class CPTCase_Studies {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action('init', [$this, 'register_cpt_case_studies'], 0);
        // Hook into pre_get_posts to modify the posts_per_page for case studies
        add_action('pre_get_posts', [$this, 'modify_case_study_query']);
    }

    public function register_cpt_case_studies() {

        $singular_name   = 'Case Study';
        $name            = 'Case Studies';
        $slug            = 'case-study';
        $has_archive     = true;
        $public          = true;
        $support         = array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes');
        $gutenberg       = true;

        $labels = array(
            'name'                  => __( $name, 'basematic' ),
            'singular_name'         => __( $singular_name, 'basematic' ),
            'menu_name'             => __( $name, 'basematic' ),
            'add_new'               => __( 'Toevoegen', 'basematic' ),
            'add_new_item'          => __( 'Voeg een ' . $singular_name . ' toe', 'basematic' ),
            'new_item'              => __( 'Nieuwe ' . $singular_name, 'basematic' ),
            'edit_item'             => __( 'Bewerk ' . $singular_name, 'basematic' ),
            'view_item'             => __( 'Bekijk ' . $singular_name, 'basematic' ),
            'all_items'             => __( 'Alle ' . $name, 'basematic' ),
            'search_items'          => __( 'Zoek ' . $name, 'basematic' ),
            'not_found'             => __( 'Geen ' . $name . ' gevonden.', 'basematic' ),
            'not_found_in_trash'    => __( 'Geen ' . $name . ' gevonden in de prullenbak.', 'basematic' ),
            'featured_image'        => __( 'Uitgelichte afbeelding', 'basematic' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => $public,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'case-studies'),
            'capability_type'    => 'post',
            'has_archive'        => $has_archive,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => $support,
            'show_in_rest'       => $gutenberg,
        );

        register_post_type( $slug, $args );
    }

    public function modify_case_study_query($query) {
        if (!is_admin() && $query->is_main_query() && is_post_type_archive('case-study')) {
            $query->set('posts_per_page', 9);
        }
    }
}
