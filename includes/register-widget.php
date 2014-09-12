<?php

add_action( 'widgets_init', 'lbbw_register_widgets' );

function lbbw_register_widgets() {
	register_widget( 'LBBW_Widget' );
}