<?php
/*
 * Plugin Name: MOA Gutenberg Project
 */


function moa_intercept_cc(){
	remove_action( 'edit_form_after_title', 'codes_editor_area' );
	remove_action('save_post_custom-code',
		'codes_save_data',
		10);
	require_once 'templates/custom-code/editor-override.php';
	require_once 'templates/custom-code/editor-save-override.php';
	add_action( 'edit_form_after_title', 'moa_codes_editor_area' );
	add_action('save_post_custom-code',
		'moa_codes_save_data',
		10,2);
}
add_action( 'plugins_loaded', 'moa_intercept_cc');