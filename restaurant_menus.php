<?php
/*
Plugin Name: Restaurant Menus Plugin
Plugin URI: http://wptreehouse.com/wptreehouse-badges-plugin
Description: Provides backend access to update menu items
Version: 1.0
Author: Michele Kempinsky
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
*/


/*
	Assign Global Variables
*/

	$plugin_url = WP_PLUGIN_URL . '/wp_restaurant_menus';

/*
Add a link to our plugin in the admin menu
under 'settings' > Treehouse Badges
*/

function wp_restaurant_menus(){

	/*use the add_options_page function
		add_options_page accepts the following peramiters:
			$page_title
			$menu_title
			$capability (level of user that is allowed to access plugin page)
			$menu-slug
			$function (the function we want to call, which tells us what we want to appear on options page)
	 */


	add_menu_page(
		'Restaurant Menus',
		'Restaurant Menus',
		'manage_options',
		'restaurant-menus',
		'restaurant_menu_option_page'
		);
}


add_action( 'admin_menu', 'wp_restaurant_menus' );

function restaurant_menu_option_page(){

	if(!current_user_can( 'manage_options' )){
		wp_die('You do not have sufficient permissions to access this page.' );
	}

	global $plugin_url;
	
	// require options page wrapper for wordpress admin style page
	require('inc/wp-options-page-wrapper.php');
}

// function wptreehouse_badges_styles(){
// 	wp_enqueue_style( 'wptreehouse_badges_styles', plugins_url('wp_treehouse_badges/wptreehouse-badges.css') );
// }

// add_action( 'admin_head', 'wptreehouse_badges_styles');


?>		