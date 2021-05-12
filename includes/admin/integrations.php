<?php
function moa_intercept_cc(){
	remove_action( 'edit_form_after_title', 'codes_editor_area' );
	remove_action('save_post_custom-code',
		'codes_save_data',
		10);

	add_action( 'edit_form_after_title', 'moa_codes_editor_area' );
	add_action('save_post_custom-code',
		'moa_codes_save_data',
		10,2);
}
add_action( 'plugins_loaded', 'moa_intercept_cc');

function moa_override_pods_meta_blankout( $content, $args ){
	if( $args == 'term'){
		return false;
	}
	else{
		return $content;
	}


}
add_filter( 'pods_meta_handler_get', 'moa_override_pods_meta_blankout', 100, 2 );