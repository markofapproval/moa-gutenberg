<?php
/*
 * Plugin Name: MOA Gutenberg Project
 */

define('MOA_BLOCKS_DIRPATH', plugin_dir_path(__FILE__) );
define( 'MOA_BLOCKS_URL', plugin_dir_url(__FILE__) );

//register post types
require_once 'includes/admin/class-create-post-types.php';

//Integrations
require_once 'includes/admin/integrations.php';
require_once 'templates/custom-code/editor-override.php';
require_once 'templates/custom-code/editor-save-override.php';

class MOA_Blocks{

	public function __construct() {
		$this->init();
	}

	private function init(){


		add_filter( 'moa_blocks_post_type_args', array( $this,'allow_viewing_of_templates' ) );
		add_action( 'init', 'moa_blocks_create_post_types' );

	}

	public function allow_viewing_of_templates( $post_data ){
		$user_id = get_current_user_id();
		$user = get_user_by( 'id', $user_id );
		$is_an_admin = $user > 0 && in_array( 'administrator', $user->roles );

		if( $is_an_admin ){
			$post_data[ 'templates' ] [ 'publicly_queryable'] = true;
		}


		return $post_data;

	}



}

new MOA_Blocks();