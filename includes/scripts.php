<?php

add_action( 'wp_enqueue_scripts' , 'lbbw_load_scripts' );

function lbbw_load_scripts() {
	wp_enqueue_style( 'lbbw-style', plugin_dir_url( __FILE__ ) . 'css/style.css' );
}