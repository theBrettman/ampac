<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<hgroup>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<h2><?php echo get_post_meta( get_the_ID(), 'model_name', true ) ?></h2>
		</hgroup>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="alignright">
			<ul>
			<?php
			$features = get_post_meta( get_the_ID(), 'feature');
			foreach ( $features as $feature ) { ?>
				<li><?php echo nl2br( $feature ); ?></li>
			<?php }
			?>
				<li><?php echo nl2br( get_post_meta( get_the_ID(), 'wire_sizes', true ) ); ?></li>
				<li><?php echo nl2br( get_post_meta( get_the_ID(), 'voltage', true ) ); ?></li>
			</ul>
		</div>
		<?php echo get_the_post_thumbnail( get_the_ID(), 'medium' ); ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
