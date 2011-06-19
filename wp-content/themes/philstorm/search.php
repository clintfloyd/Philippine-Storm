<?php get_header(); 

	global $globalTitle;
	wp_reset_query();
	if (have_posts()) : 
		while (have_posts()) : the_post();
			?>
the_title();
			<?php
		endwhile;
	endif;
get_footer(); ?>