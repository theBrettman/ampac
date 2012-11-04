<?php
/**
 * Template Name: Testers
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
					$series = get_children( 'post_parent=' . get_the_ID() );
					$keys = array_keys( $series );
					$thumb_total = $series_total = $tester_total = 0; ?>
					<table><?php
					for ( $row_num = 0; $row_num <= ceil( count( $keys ) / 4 ) - 1; $row_num++ ) { ?>
						<tr><?php
						for ( $thumb_num = 0; $thumb_num < 4; $thumb_num++ ) { 
							if ( $thumb_total >= count( $keys ) ) { ?>
								<td>&nbsp;</td>
							<?php } else { ?>
								<td><a href="<?php echo get_permalink( $keys[$thumb_total] ); ?>"><?php echo get_the_post_thumbnail( $keys[$thumb_total], 'thumbnail' ); ?></a></td><?php
							}
						$thumb_total++;
						} ?>
						</tr><tr><?php
						for ( $series_num = 0; $series_num < 4; $series_num++ ) {
							if ( $series_total >= count( $keys ) ) { ?>
								<td>&nbsp;</td>
							<?php } else { ?>
								<td><a href="<?php echo get_permalink( $keys[$series_total] ) ?>"><?php echo $series[$keys[$series_total]]->post_title; ?></a></td><?php
							}
						$series_total++;
						} ?>
						</tr><tr><?php
						for ( $tester_num = 0; $tester_num < 4; $tester_num++ ) {
							if ( $tester_total >= count( $keys ) ) { ?>
								<td>&nbsp;</td>
							<?php } else { ?>
								<td>
									<ul>
										<?php $testers = get_children( 'post_parent=' . $keys[$tester_total] . '&post_type=page' );
										foreach($testers as $tester) { ?>
											<li><a href="<?php echo get_permalink( $tester->ID ) ?>"><?php echo $tester->post_title; ?></a></li>
										<?php } ?>
									</ul>
								</td>
							<?php }
						$tester_total++;
						} ?>
						</tr><?php
					} ?>
					</table>
					

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>