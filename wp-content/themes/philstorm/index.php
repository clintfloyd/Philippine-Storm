<?php get_header(); ?>
	<div class="top_index">
		<div style="float:left">
			<?php include("billboard.php"); ?>
		</div>
		<div class="latest">
			<h3>Latest News</h3>
			<ul>
			<?php
				wp_reset_query();
				$args = array( 'numberposts' => '6' );
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $post ){
					echo '<li><a href="' . get_permalink($post["ID"]) . '" title="'.$post["post_title"].'" >' .   $post["post_title"].'</a>
						  <span class="postinfo">By '.get_the_author().' | '. get_the_date("Y") . ' ' . get_the_time() .'</span>
						  </li> ';
				}
			?>
			</ul>
		</div>
			<br clear="all" />
	</div>
	<div class="content-right">
		<?php include('tabs.php'); ?>
	</div>
	
	<?php get_sidebar(); ?>
	<br clear="all" />
<?php get_footer(); ?>