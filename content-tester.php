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
			<h1 class="entry-title hilite"><?php the_title(); ?></h1>
			<h2 class="emHdg"><?php echo get_post_meta( get_the_ID(), 'model_name', true ) ?></h2>
		</hgroup>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		$post_meta = get_post_meta( get_the_ID() );
		$feature_title = get_post_meta( get_the_ID(), 'feature_title', true );
		$features = get_post_meta( get_the_ID(), 'feature' );
		$feature2_title = get_post_meta( get_the_ID(), 'feature2_title', true );
		$features2 = get_post_meta( get_the_ID(), 'feature2' );
		$wire_sizes = get_post_meta( get_the_ID(), 'wire_sizes', true );
		$voltage = get_post_meta( get_the_ID(), 'voltage', true );
	
		if ( is_array( $features ) ) { ?>
		<div class="features well alignright">
			<h3 class="hilite">Features</h3>
			<?php
			if ( $feature_title ) { ?>
			<strong><?php echo $feature_title; ?>:</strong>
			<?php } ?>
			<ul>
			<?php
				foreach ( $features as $feature ) { ?>
				<li><?php echo nl2br( $feature ); ?></li>
				<?php }
				if ( !is_array( $features2 ) ) {
					if ( $wire_sizes != "" ) { ?>
					<li><?php echo nl2br( $wire_sizes ); ?></li>
					<?php }
					if ( $voltage != "" ) { ?>
					<li><?php echo nl2br( $voltage ); ?></li>
					<?php }
				} ?>
			</ul>
			<?php
			if ( $feature2_title ) { ?>
			<strong><?php echo $feature2_title; ?>:</strong>
			<?php }
			if ( is_array( $features2 ) ) { ?>
			<ul>
				<?php
				foreach ( $features2 as $feature2 ) { ?>
					<li><?php echo nl2br( $feature2 ); ?></li>
				<?php }
				if ( $wire_sizes != "" ) { ?>
					<li><?php echo nl2br( $wire_sizes ); ?></li>
				<?php }
				if ( $voltage != "" ) { ?>
					<li><?php echo nl2br( $voltage ); ?></li>
				<?php } ?>
			</ul>
			<?php } ?>
		</div>
		<?php } ?>
		<p><?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?></p>
		<?php if ( get_field( 'brochure' ) ) { 
			$brochure = get_field( 'brochure' ); ?>
			<p>
				<span class="ui-icon bdub-icon-pdf"></span>
				<a href="<?php echo $brochure['url']; ?>" title="<?php echo $brochure['title']; ?>" target="blank">
					<?php echo $brochure['title']; ?>
				</a>
			</p>
		<?php } ?>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
