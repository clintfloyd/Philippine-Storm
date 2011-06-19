<div class="sidebar">
	<div class="sidebarcontainer">
		<div class="sidebartitle">Recent Articles</div>
		<div class="postlist">
			<ul>
			<?php
				$args = array( 'numberposts' => '5' );
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $post ){
					echo '<li><a href="' . get_permalink($post["ID"]) . '" title="Look '.$post["post_title"].'" >' .   $post["post_title"].'</a> </li> ';
				}
			?>
			</ul>
		</div>
	</div>
	<div class="sidebarcontainer">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/adsample.jpg" />
	</div>
	<div class="sidebarcontainer">
		<div class="sidebartitle">Weather Forecast <span>Philippines</span><br clear="all"/></div>
		<div class="weatherforecastsidebar" id="weatherforecastsidebar">
			loading data...
		<br clear="all" />
		</div>
	</div>
	<div class="sidebarcontainer">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/adsample.jpg" />
	</div>
	
	<div class="sidebarcontainer">
		<div class="sidebartitle">Tag Cloud</div>
		<div class="tagsclouds">
			<?php wp_tag_cloud('smallest=10&largest=14&number=50&orderby=count'); ?>
		</div>
	</div>
</div>