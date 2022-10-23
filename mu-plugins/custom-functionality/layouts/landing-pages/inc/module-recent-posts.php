<?php
/**
 * Recent Posts Module
 */

// the_sub_field( 'mlp_recent_posts_heading' );
$posts = get_sub_field( 'mlp_number_of_posts' );
$id    = get_the_ID();
?>

<section class="module-recent-posts">
	<div class="inner-content">
		<h2><?php the_sub_field( 'mlp_recent_posts_heading' ); ?></h2>
		<div class="post-grid">
			<?php
			// WP_Query arguments
			$args = array(
				'post_type'      => array( 'post' ),
				'post_status'    => array( 'publish' ),
				'posts_per_page' => "$posts",
				'order'          => 'DESC',
			);

			// The Query
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
						<div class="recent-post">
							<figure>
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'mlp-post-grid' );
								}
								?>
							</figure>
							<h3><?php echo get_the_title( $id ); ?></h3>

							<a href="<?php echo get_the_permalink( $id ); ?>">Read More</a>
						</div>
					<?php
				}
			} else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>
