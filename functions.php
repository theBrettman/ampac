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

add_action( 'widgets_init', 'ampac_register_widgets' );

function ampac_register_widgets() {
	register_sidebar( array(
		'name' => __( 'Home Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-0',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>"
	) );
}

/*add_action( 'wp_enqueue_scripts' , 'load_scripts' );

function load_scripts() {
    if ( is_page_template( 'testers.php' ) || is_page_template( 'series.php' ) || is_page_template( 'tester.php' ) ) {
		wp_register_script( 'yahoo-dom-event' , 'http://yui.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js' );  
		wp_register_script( 'treeview' , 'http://yui.yahooapis.com/2.9.0/build/treeview/treeview-min.js', array( 'yahoo-dom-event' ) );  
		wp_register_script( 'treemenu' , get_bloginfo( 'stylesheet_directory' ) . '/treemenu.js' ,  array( 'treeview' ) , '201208061432' );
		wp_enqueue_script( 'treemenu' );
	}
}

add_action( 'wp_enqueue_scripts' , 'load_styles' );

function load_styles() {
	if ( is_page_template( 'testers.php' ) || is_page_template( 'series.php' ) || is_page_template( 'tester.php' ) ) {
		wp_register_style( 'treeview' , 'http://yui.yahooapis.com/2.9.0/build/treeview/assets/skins/sam/treeview.css' , false , '201208042055'  );
		wp_enqueue_style( 'treeview' );
	}
}*/

?>