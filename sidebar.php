<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];

if ( 'content' != $current_layout ) :
?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php if ( ( ! is_home() && ! dynamic_sidebar( 'sidebar-1' ) ) || ( is_home() && ! dynamic_sidebar( 'sidebar-0' ) ) ) : ?>

				<aside id="list-pages" class="widget well">
					<h3 class="widget-title hilite"><?php _e( 'Testers'); ?></h3>
					<ul>
						<?php wp_list_pages( "title_li=&child_of=2&sort_column=menu_order" ); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
<?php endif; ?>