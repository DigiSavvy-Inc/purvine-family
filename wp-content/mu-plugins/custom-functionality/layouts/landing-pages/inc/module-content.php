<?php
/**
 * Module for basic content.
 */
$background_color = get_sub_field( 'mlp_content_background_color' );
?>
<section style="background-color:<?php echo $background_color; ?>;" class="module-content content-<?php echo get_row_index(); ?>">
	<div class="inner-content">
		<?php the_sub_field( 'mlp_content_copy' ); ?>
	</div>
</section>
