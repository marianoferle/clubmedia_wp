
	<?php get_header(); ?>








		<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
		<?php } ?>
		<?php get_template_part( 'title' ); ?>
	  <?php the_content(); ?>


	<?php get_footer(); ?>
