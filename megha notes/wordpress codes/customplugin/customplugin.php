<?php
/*
Plugin Name: CustomPlugin
Plugin URI: http://CustomPlugin.com
Description: This is not just a plugin, it symbolizes the strength and weaknesses of an entire generation.
Author: Megha Gupta
Version: 1.7.2
Author URI: http://CustomPlugin.com
License: GPLv2 or later
*/
function plugin_table(){

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
 
    $tablename = $wpdb->prefix."customplugin";
 
    $sql = "CREATE TABLE $tablename (
      id mediumint(11) NOT NULL AUTO_INCREMENT,
      product_name varchar(300),
      retail_price varchar(200),
      modal varchar(300),
      size varchar(20),
      PRIMARY KEY (id)
    ) $charset_collate;";
 
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 dbDelta( $sql );
 
 }
 register_activation_hook( __FILE__, 'plugin_table' );
 
 // Add menu
 function plugin_menu() {
 
    add_menu_page("My Plugin", "My Plugin","manage_options", "myPlugin", "displaylist",plugins_url('/myplugin/img/one.png'));
 
 }
 add_action("admin_menu", "plugin_menu");
 
 function displayList(){
    include "displaylist.php";
 }
 