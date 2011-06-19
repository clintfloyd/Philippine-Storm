<?php get_header(); 

	global $globalTitle;
	wp_reset_query();
	if (have_posts()) : 
		while (have_posts()) : the_post();
			$exc = get_the_excerpt();
			$title = get_the_title();
			$id = get_the_ID();
			$post_categories = wp_get_post_categories( $id );
			$cats = array();
			foreach($post_categories as $c){
				$cat = get_category( $c );
				$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
			}
			?>
			<div class="breadcrumbs">
				<ul>
					<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
					<li>&gt; Category</li>
					<br clear="all" />
				</ul>
			</div>
			<div class="divtitle">
				<h1><?php the_title(); ?></h1><br />
				By <span class="author"><?php the_author(); ?></span> - <?php the_date(); ?>, <?php the_time(); ?>
			</div>
			<div class="niceline"></div>
			<div class="contentcontent">
				<?php the_content(); ?>
			</div>
			<div class="niceline"></div>
			<?php
		endwhile;
	endif;
get_footer(); ?>