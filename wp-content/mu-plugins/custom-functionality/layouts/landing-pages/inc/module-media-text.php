<?php
/**
 * Module for Media & Text.
 */

$height                             = get_sub_field( 'mlp_media_content_height' );
$default_height                     = '75vh';
$mlp_media                          = get_sub_field( 'mlp_media' );
$mlp_media_content_background_image = get_sub_field( 'mlp_media_content_background_image' );
$align_content                      = get_sub_field( 'mlp_align_image' );
$add_button                         = get_sub_field( 'mlp_add_button' );
$button_text                        = get_sub_field( 'mlp_button_text' );
$button_link                        = get_sub_field( 'mlp_button_link' );
$button_color                       = get_sub_field( 'mlp_button_color' );
$button_color_text                  = get_sub_field( 'mlp_button_text_color' );
?>

<section class="module-media-text media-text-<?php echo get_row_index(); ?>" style="background-image:url('<?php echo $mlp_media_content_background_image['url']; ?>');background-size:cover;height:<?php echo $height . 'vh' ?: $default_height; ?>">
	<div class="inner-content">
		<div class="media-content">
			<?php if ( $mlp_media ) { ?>
				<?php echo wp_get_attachment_image( $mlp_media['ID'], 'mlp-media-img' ); ?>
			<?php } ?>
			<div class="module-content" style="order:<?php the_sub_field( 'mlp_align_image' ); ?>">
				<?php the_sub_field( 'mlp_content' ); ?>
				<?php
				if ( 'cta_yes' === $add_button ) {
					?>
					<a href="<?php echo $button_link; ?>" class="mlp-button-link" style="background-color:<?php echo $button_color; ?>;color:<?php echo $button_color_text; ?>">
						<span><?php echo $button_text; ?></span>
					</a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>
