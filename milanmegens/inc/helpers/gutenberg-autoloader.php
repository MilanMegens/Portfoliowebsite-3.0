<?php


function register_plugin_gutenberg_blocks() {

 	$blocks = glob( __DIR__ . DIRECTORY_SEPARATOR . '../blocks/*' . DIRECTORY_SEPARATOR );

	if ( $blocks ) {
		foreach ( $blocks as $block_type ) {

			$block_json_path = $block_type . 'block.json';
			$block_name = basename($block_type);

			if ( ! file_exists( $block_json_path ))  {
				var_dump('Block.json not existing in path:' . $block_type);
			}

			$settings_path = $block_type . $block_name . '-settings.php';


			if ( file_exists( $settings_path ) ) {

				require_once( $settings_path );
				
				$classname = 'Block'.ucfirst($block_name);
				$class_location = 'BASEMATIC_THEME\Inc\\'.$classname;

				if(class_exists($class_location)){

					$class_location::get_instance();
				
				}else{
					var_dump($classname . ' not existing.');
					var_dump($classname . ' not existing.');
				}

			}

			register_block_type( $block_type, array() );

		}

	}

}

register_plugin_gutenberg_blocks();
