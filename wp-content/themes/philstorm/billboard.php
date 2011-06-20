<h1>Featured Article</h1>
<div class="topcontent_feat">
	<div class="slide">
		<div class="slider-wrap">
			<div id="main-photo-slider" class="csw">

				<div class="panelContainer">
				
					<?php
					wp_reset_query();
					$xy =0;
					$style_new = "";
					add_filter('posts_fields', 'featured_fields');
					add_filter('posts_join', 'featured_join');
					add_filter('posts_where', 'featured_where_featured');
					$featuredPosts = new WP_Query();
					$featuredPosts->query('showposts=9');
					$x=0;
					$controller=0;
					while ($featuredPosts->have_posts()) : $featuredPosts->the_post();
					$xy++;
					?>
						<div class="panel" title="Panel <?php echo $xy; ?>s">
							<div class="wrapper">
								<img src="<?php echo get_post_meta(get_the_ID(), '_video_thumbnail',true); ?>" alt="<?php the_title(); ?>" height="280" width="620" alt="<?php the_excerpt(); ?>" />
								<div class="photo-meta-data">
									<?php the_title(); ?>
									<?php the_excerpt(); ?>
								</div>
							</div>
							<br clear="all" />
						</div>
					<?php
					endwhile;
					remove_filter('posts_where', 'featured_where_featured');
					?>
					<br clear="all" />
				</div>
				<br clear="all" />
			</div>

			<div id="movers-row">
				<?php
				wp_reset_query();
				$xy =0;
				$style_new = "";
				add_filter('posts_fields', 'featured_fields');
				add_filter('posts_join', 'featured_join');
				add_filter('posts_where', 'featured_where_featured');
				$featuredPosts = new WP_Query();
				$featuredPosts->query('showposts=9');
				$x=0;
				$controller=0;
				while ($featuredPosts->have_posts()) : $featuredPosts->the_post();
				$xy++;
				?>
					<div><a href="#<?php echo $xy; ?>" class="cross-link" title="<?php the_title(); ?>"><img src="<?php echo get_post_meta(get_the_ID(), '_video_thumbnail_small',true)?>" class="nav-thumb" alt="<?php the_title(); ?>" /></a></div>
				<?php
				endwhile;
				remove_filter('posts_where', 'featured_where_featured');
				?>
			</div>
			<br clear="all" />
		</div>
		<br clear="all" />
	</div>
	<br clear="all" />
</div>
<br clear="all" />