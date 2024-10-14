<?php 
if ( ! defined( 'BASEMATIC_DIR_PATH' ) ) {
    define( 'BASEMATIC_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'BASEMATIC_THEME_PATH' ) ) {
    define( 'BASEMATIC_THEME_PATH', untrailingslashit( get_template_directory_uri() ) );
}

require_once BASEMATIC_DIR_PATH . '/inc/helpers/autoloader.php';

require_once BASEMATIC_DIR_PATH . '/inc/helpers/gutenberg-autoloader.php';

function basematic_get_theme_instance() {
    \BASEMATIC_THEME\Inc\BASEMATIC_THEME::get_instance();
}
basematic_get_theme_instance();

add_editor_style();

add_filter( 'should_load_separate_core_block_assets', '__return_true' );

/** Add widgets support to current theme **/
add_filter( 'current_theme_supports-widgets', function( $supports ) {
    $supports = false ? true : $supports;
    return $supports;
} );

add_filter( 'gform_confirmation_anchor', '__return_true' );

function acf_load_post_type_choices( $field ) {
    
    // Reset choices
    $field['choices'] = array();
    
    
    // Get the Text Area values from the options page without any formatting
    $choices = get_post_types();

    $exclude_items = array('attachment', 'revision', 'nav_menu_item', 'custom_css', 'customize_changeset', 'oembed_cache', 'user_request', 'wp_block', 'wp_template', 'wp_template_part', 'wp_global_styles', 'wp_navigation', 'acf-taxonomy', 'acf-post-type', 'acf-ui-options-page', 'acf-field-group', 'acf-field'
    );

    foreach($exclude_items as $delete_value){

        if (($key = array_search($delete_value, $choices)) !== false) {
            unset($choices[$key]);
        }
    }

    $choices = implode("\n", $choices);

    // Explode the value so each line is a new element in the array
    $choices = explode("\n", $choices);

    
    // Remove unwanted white space
    $choices = array_map('trim', $choices);

    
    // Loop through the array and add to field 'choices'
    if( is_array($choices) ) {
        
        foreach( $choices as $choice ) {
            
            $field['choices'][ $choice ] = $choice;
            
        }
        
    }


    // Return the field
    return $field;
    
}

add_filter('acf/load_field/name=select_post_type', 'acf_load_post_type_choices');


function change_post_types_slug( $args, $post_type ) {

	if(get_locale() == 'nl_NL'){
		if ( $post_type === 'services' ) {
			$args['rewrite']['slug'] = 'software-diensten';
		}
		if ( $post_type === 'industries' ) {
			$args['rewrite']['slug'] = 'branches';
		}
		if ( $post_type === 'technologies' ) {
			$args['rewrite']['slug'] = 'technologie';
		}
	}

   return $args;
}
add_filter( 'register_post_type_args', 'change_post_types_slug', 10, 2 );

/**
 * @param string $url
 * @param lloc\Msls\MslsLink $link
 * @param bool current
 * @return string
 */
function my_msls_output_get( $url, $link, $current ) {
	if($link->txt == 'nl_NL'){
		$link->txt = 'Nederlands';
	}elseif($link->txt == 'en_US'){
		$link->txt = 'English';
	}
    return sprintf(
        '<li><a href="%s" title="%s"%s>%s</a></li>',
        $url,
        $link->txt,
        ( $current ? ' class="current"' : '' ),
        $link
    );
}
add_filter( 'msls_output_get', 'my_msls_output_get', 10, 3 );

function is_block_type( $block, $type ) {
    if ( $type === $block['blockName'] ) {
        return true;
    }
    return false;
}

function custom_block_classes( $content, $block ) {
    if ( is_block_type( $block, "core/list" ) ) {
        $modified_content = new WP_HTML_Tag_Processor( $content );
        $modified_content->next_tag();
        $modified_content->add_class( 'wp-block-list' );
        $modified_content->get_updated_html();
        return $modified_content;
    }else {
        return $content;
    }
}
add_filter( 'render_block', 'custom_block_classes', 10, 2 );

function load_font_awesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'load_font_awesome');

function smooth_scroll_script() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('a[href^="#"]');
            
            for (let link of links) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);
                    
                    if (targetElement) {
                        window.scroll({
                            top: targetElement.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'smooth_scroll_script');
