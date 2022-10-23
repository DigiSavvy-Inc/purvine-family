<?php
/**
 * Template Name: Modular Landing Page
 * Template Post Type: post, page, press-release, bp-resources
 * This template is used to create modular landing pages without using a heavy page builder
 *
 * @package Some_Like_It_Neat
 * @author  Alex Vasquez <alex@digisavvy.com>
 * @license GPL-2.0+ https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
 * @link    https://github.com/digisavvy/some-like-it-neat
 */

get_header();

?>

<div id="primary" class="content-area">

	<?php

	if ( ! function_exists( 'get_field' ) ) {
		return;
	} else {
		$id = get_the_ID();

		if ( have_rows( 'mlp_page_content', $id ) ) :
			while ( have_rows( 'mlp_page_content' ) ) :
				the_row();
				if ( get_row_layout() === 'mlp_media_text_block' ) :
					require 'inc/module-media-text.php';

				elseif ( get_row_layout() === 'mlp_call_to_action_section' ) :
					require 'inc/module-cta.php';

				elseif ( get_row_layout() === 'mlp_content' ) :
					require 'inc/module-content.php';

				elseif ( get_row_layout() === 'mlp_recent_posts' ) :
					require 'inc/module-recent-posts.php';

				elseif ( get_row_layout() === 'mlp_call_out' ) :
					if ( have_rows( 'mlp_call_outs' ) ) :
						require 'inc/module-call-out.php';

					else :
						// no rows found.
					endif;
				endif;
			endwhile;
			else :
				// no layouts found.
		endif;

	}

	?>

</div><!-- #primary -->

<?php get_footer(); ?>
