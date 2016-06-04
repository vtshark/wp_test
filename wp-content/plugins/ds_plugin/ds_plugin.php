<?php
/*
Plugin Name: ds_plugin
Description: login & registration
Version: 1.0
Author: DS
Author URI: 
*/
require __DIR__ . "/functions.php";
//add_action( 'after_setup_theme', 'login' );

add_filter( 'the_content', 'ds_content' );
add_action('wp_enqueue_scripts','ds_scripts');
add_action('wp_ajax_nopriv_ds_login','ds_login');
