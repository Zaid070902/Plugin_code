
<?php

/**
 * Plugin Name:       Custom Plugin
 * Description:       First Plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zaid Flandorp
 */

add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'WPOrg',
        'WPOrg Options',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/view.php',
        null,
        plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}

add_filter( 'upload_mimes', 'my_myme_types', 1, 1 );
function my_myme_types( $mime_types ) {
  $mime_types['svg'] = 'image/svg+xml';     // Adding .svg extension
  $mime_types['json'] = 'application/json'; // Adding .json extension
  unset( $mime_types['xls'] );  // Remove .xls extension
  unset( $mime_types['xlsx'] ); // Remove .xlsx extension
  
  return $mime_types;
}
