<?php
/**
 * Module for Call to Action.
 */

$heading                  = get_sub_field( 'mlp_heading_tag' );
$heading_copy             = get_sub_field( 'mlp_cta_content_copy' );
$heading_color            = get_sub_field( 'mlp_cta_content_text_color' );
$align                    = get_sub_field( 'mlp_cta_align_content' );
$button_text_color        = get_sub_field( 'mlp_cta_button_text_color' );
$cta_bg_color             = get_sub_field( 'mlp_cta_background_color' );
$button_bg_color          = get_sub_field( 'mlp_cta_button_color' );
$align                    = get_sub_field( 'mlp_cta_align_content' );
$link                     = get_sub_field( 'mlp_cta_link' );
$mlp_cta_image            = get_sub_field( 'mlp_cta_image' );
$mlp_button_heading       = get_sub_field( 'mlp_button_heading' );
$button_heading_font_size = get_sub_field( 'mlp_button_heading_size' ) . 'px';
$button_heading_color     = get_sub_field( 'mlp_button_heading_color' );
?>

<?php // get_sub_field( 'mlp_cta_content_copy' ); ?>
<?php // get_sub_field( 'mlp_cta_content_text_color' ); ?>

<section class="module-call-to-action cta-<?php echo get_row_index(); ?>" style="display: flex;flex-direction:row;background-color:<?php echo $cta_bg_color; ?>;">

	<div class="inner-content">
		<div class="cta-content">
			<?php if ( $mlp_cta_image ) { ?>
				<?php echo wp_get_attachment_image( $mlp_cta_image['ID'], 'mlp-media-img' ); ?>
			<?php } ?>
			<?php echo '<' . $heading . ' class="cta-heading" style="order:' . $align . ';color:' . $heading_color . ';">'; ?>
				<?php echo $heading_copy; ?>
			<?php echo '</' . $heading . '>'; ?>
		</div>
		<div class="cta-button-content">
			<?php if ( $mlp_button_heading ) { ?>
				<div class='button-heading'>
					<h4 style="color:<?php echo $button_heading_color; ?>;font-size:<?php echo $button_heading_font_size; ?>;"><?php the_sub_field( 'mlp_button_heading' ); ?></h4>
				</div>
			<?php } ?>
				<a href="<?php echo $link; ?>" class = 'cta' style = "background-color:<?php echo $button_bg_color; ?>;color:<?php echo $button_text_color; ?>" >
					<span>
					<?php echo get_sub_field( 'mlp_cta_button_copy' ); ?>
					</span>
				</a>
		</div>
	</div>

</section>
