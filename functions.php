<?php

add_filter( 'body_class', 'fix_body_class_for_sidebar', 20, 2 );
function fix_body_class_for_sidebar( $wp_classes, $extra_classes ) {
	if( is_single() || is_page() ){
		if ( in_array( 'singular', $wp_classes ) ){
			foreach( $wp_classes as $key => $value ) {
				if ( $value == 'singular' ) 
					unset( $wp_classes[$key] );
			}
		}
	}
	return array_merge( $wp_classes, ( array ) $extra_classes );
}


add_filter( 'twentyeleven_layout_classes', 'one_column_classes', 10, 2 );
// Overrides layout classes for the contacts category
function one_column_classes( $classes, $current_layout ) {
	if ( is_category( 'contacts' ) ) {
		$classes = array( 'one-column', 'content' );
	}
	return $classes;
}

add_action( 'widgets_init', 'ampac_register_widgets' );
function ampac_register_widgets() {
	register_sidebar( array(
		'name' => __( 'Home Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-0',
		'before_widget' => '<aside id="%1$s" class="widget hidden-phone %2$s">',
		'after_widget' => "</aside>"
	) );
}

add_action( 'wp_enqueue_scripts' , 'load_treeview_scripts' );
function load_treeview_scripts() {
	wp_register_script( 'treeview' , get_bloginfo( 'stylesheet_directory' ) . '/js/treeview.js', false, '201301080906', true );  
	wp_enqueue_script( 'treemenu' , get_bloginfo( 'stylesheet_directory' ) . '/js/treemenu.js' ,  array( 'treeview' ) , '201208061432', true );
}

add_action( 'wp_enqueue_scripts' , 'load_treeview_styles' );
function load_treeview_styles() {
	wp_register_style( 'treeview' , get_bloginfo( 'stylesheet_directory' ) . '/treeview.css' , false , '201201080908' );
	wp_enqueue_style( 'treeview' );
}
add_action( 'wp_enqueue_scripts', 'load_bootstrap_script' );
function load_bootstrap_script() {
	if ( is_category( 'contacts' ) ) {
		wp_enqueue_script( 'bootstrap', get_bloginfo( 'stylesheet_directory' ) . '/js/bootstrap.min.js', array( 'jquery' ), '20130117', true );
	}
}

?>