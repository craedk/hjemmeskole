<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'neve_child_load_css' ) ):
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css() {
		wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style' ), NEVE_VERSION );
	}
endif;
add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );

/**
 * Add image sizes.
 */
add_image_size( 'ths-twocol-image', 550, 550, array( 'center', 'center' ) );
add_image_size( 'ths-post-image', 684, 684, false );
add_image_size( 'ths-threecol-featured-image', 313, 313, false );
/**
 * Select image sizes from admin.
 */
add_filter( 'image_size_names_choose', 'ths_custom_sizes' );
function ths_custom_sizes( $sizes ) {
	 return array_merge( $sizes, array(
			 'ths-twocol-image' => __( 'Two column image w/no margin' ),
			 'ths-post-image' => __( 'Post image' ),
			 'ths-threecol-featured-image' => __( 'Featured image in three columns layout' ),
	 ) );
}
