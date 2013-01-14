<?php
/**
 * Template Name: Testers
 *
 */

get_header(); ?>

		<div id="primary" class="hidden-phone">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<table>
						<caption><h2 class="emHdg pagination-centered"><?php the_title(); ?></h2></caption>
						<?php
						$series = get_children( 'post_parent=' . get_the_ID() . '&order=ASC' );
						$keys = array_keys( $series );
						$thumb_total = $series_total = $tester_total = 0;
						for ( $row_num = 0; $row_num <= ceil( count( $keys ) / 4 ) - 1; $row_num++ ) { ?>
						<tr><?php
						for ( $thumb_num = 0; $thumb_num < 4; $thumb_num++ ) { 
							if ( $thumb_total >= count( $keys ) ) { ?>
								<td>&nbsp;</td>
							<?php } else { ?>
								<td class="ui-corner-all"><a href="<?php echo get_permalink( $keys[$thumb_total] ); ?>"><?php echo get_the_post_thumbnail( $keys[$thumb_total], 'medium' ); ?></a></td><?php
							}
						$thumb_total++;
						} ?>
						</tr><tr><?php
						for ( $series_num = 0; $series_num < 4; $series_num++ ) {
							if ( $series_total >= count( $keys ) ) { ?>
								<td>&nbsp;</td>
							<?php } else { ?>
								<td class="hilite pagination-centered"><h5><a href="<?php echo get_permalink( $keys[$series_total] ) ?>"><?php echo $series[$keys[$series_total]]->post_title; ?></a></h5></td><?php
							}
						$series_total++;
						} ?>
						</tr><tr><?php
						for ( $tester_num = 0; $tester_num < 4; $tester_num++ ) {
							if ( $tester_total >= count( $keys ) ) { ?>
								<td>&nbsp;</td>
							<?php } else { ?>
								<td class="well">
									<ul class="unstyled">
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