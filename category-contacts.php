<?php
/**
 * The template for displaying the contacts category.
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header>
					<h2 class="emHdg"><?php single_cat_title(); ?></h1>
					<p>Click a location to see that agent's contact information.</p>
				</header>

				<div id="contacts">
				<?php while ( have_posts() ) : the_post(); global $post; ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2 class="hilite">
							<a href="#<?php echo $post->post_name; ?>" data-toggle="collapse" data-parent="#contacts">
								<?php the_title(); echo " (" . get_post_meta( get_the_ID(), 'country', true ) . ")"; ?>
							</a>
						</h2>
						<div id="<?php echo $post->post_name; ?>" class="entry-content collapse">
							<?php the_content(); ?>
						</div>
					</article>

				<?php endwhile; ?>
				</div>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>
