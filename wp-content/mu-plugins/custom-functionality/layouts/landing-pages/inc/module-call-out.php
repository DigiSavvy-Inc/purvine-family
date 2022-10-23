<?php
/**
 * Module for Call Outs
 */

?>

<section class="module-call-out call-out-<?php echo get_row_index(); ?>">
	<?php if ( have_rows( 'mlp_call_outs' ) ) : ?>
		<?php
		while ( have_rows( 'mlp_call_outs' ) ) :
			the_row();
			?>
			<div class="call-out" style="color:<?php the_sub_field( 'mlp_callout_text_color' ); ?>;background-color:<?php the_sub_field( 'mlp_callout_background_color' ); ?>;">

			<?php $mlp_callout_imageicon = get_sub_field( 'mlp_callout_imageicon' ); ?>
			<?php if ( $mlp_callout_imageicon ) { ?>
					<img src="<?php echo esc_url( $mlp_callout_imageicon['url'] ); ?>" alt="<?php echo esc_attr( $mlp_callout_imageicon['alt'] ); ?>" />
				<?php } ?>
				<h3><?php the_sub_field( 'mlp_callout_heading' ); ?></h3>
				<div class="call-out-copy">
				<?php the_sub_field( 'mlp_callout__copy' ); ?>
				</div>
				<a href="<?php the_sub_field( 'mlp_callout_link' ); ?>" class="call-out-link" style="color:<?php the_sub_field( 'mlp_callout_text_color' ); ?>;" alt="<?php the_sub_field( 'mlp_callout_heading' ); ?>">
				<?php the_sub_field( 'call_out_link_text' ); ?>
				</a>
			</div>
		<?php endwhile; ?>
	<?php else : ?>
		<?php // no rows found. ?>
	<?php endif; ?>
</section>
