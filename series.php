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
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					
					<?php
					$children = get_children( 'post_parent=' . get_the_ID() );
					foreach( $children as $child ) { ?>
						<div style="display: table-cell">
							<a href="<?php echo get_permalink( $child->ID ); ?>">
								<?php echo get_the_post_thumbnail( $child->ID, 'thumbnail' ); ?>
							</a>
						</div>
						<div style="display: table-cell; width: 100%; vertical-align: top;">
							<h3>
								<a href="<?php echo get_permalink( $child->ID ); ?>">
									<?php echo $child->post_title ?> - <?php echo get_post_meta( $child->ID, 'model_name', true ); ?>
								</a>
							</h3>
							<p><?php echo nl2br( get_post_meta( $child->ID, 'excerpt', true ) ); ?></p>
						</div>
					<?php }
					?>
					</table>
					
					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>