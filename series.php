<?php
/**
 * Template Name: Series
 * Description: A Page Template that adds a sidebar to pages
 *
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<header class="entry-header">
						<h2 class="emHdg pagination-centered"><?php the_title(); ?></h2>
					</header><!-- .entry-header -->
					
					<?php
					$children = get_children( 'post_parent=' . get_the_ID() . '&order=ASC' );
					foreach( $children as $child ) { ?>
					<ul class="unstyled">
						<li class="well row-fluid show-grid">							
							<div class="span3 thumb-border pagination-centered">
								<a href="<?php echo get_permalink( $child->ID ); ?>">
									<?php echo get_the_post_thumbnail( $child->ID, 'medium' ); ?>
								</a>
							</div>
							<div class="span9">
								<h3 class="hilite">
									<a href="<?php echo get_permalink( $child->ID ); ?>">
										<?php echo $child->post_title ?> - <?php echo get_post_meta( $child->ID, 'model_name', true ); ?>
									</a>
								</h3>
								<p>
								<?php echo nl2br( get_post_meta( $child->ID, 'excerpt', true ) ); ?>
								<p>
							</div>	
						</li>
					</ul>
					<?php }
					?>
					</table>
					
					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>