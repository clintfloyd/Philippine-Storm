<?php get_header(); ?>
	<?php include("billboard.php"); ?>
	<div>
		<div class="boxstyle">
			<h1>WORLD NEWS</h1>
			<div>
				<ul>
			<?php
				wp_reset_query();
				query_posts('showposts=27&category_name=world&orderby=date');
				$x=0;
				$xxx=0;
				$other_titles = array();
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				$xxx++;
				if($xxx >= 7){
					$style=" nomargin";
					$xxx=0;
				}else{
					$style="";
				}
				?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php
			 endwhile; else:
				endif;?>
				</li>
			</div>
		</div>
		<div class="boxstyle">
			<h1>LOCAL WEATHER</h1>
			<div>
				<ul>
			<?php
				wp_reset_query();
				query_posts('showposts=27&category_name=weather&orderby=date');
				$x=0;
				$xxx=0;
				$other_titles = array();
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				$xxx++;
				if($xxx >= 7){
					$style=" nomargin";
					$xxx=0;
				}else{
					$style="";
				}
				?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php
			 endwhile; else:
				endif;?>
				</li>
			</div>
		</div>
		<div class="boxstyle">
			<h1>TYPHOONS</h1>
			<div>
				<ul>
			<?php
				wp_reset_query();
				query_posts('showposts=27&category_name=storm&orderby=date');
				$x=0;
				$xxx=0;
				$other_titles = array();
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				$xxx++;
				if($xxx >= 7){
					$style=" nomargin";
					$xxx=0;
				}else{
					$style="";
				}
				?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php
			 endwhile; else:
				endif;?>
				</li>
			</div>
		</div>
		<div class="boxstyle">
			<h1>TRIVIA</h1>
			<div>
				<ul>
			<?php
				wp_reset_query();
				query_posts('showposts=27&category_name=trivia&orderby=date');
				$x=0;
				$xxx=0;
				$other_titles = array();
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				$xxx++;
				if($xxx >= 7){
					$style=" nomargin";
					$xxx=0;
				}else{
					$style="";
				}
				?>
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php
			 endwhile; else:
				endif;?>
				</li>
			</div>
		</div>
		<br clear="all" />
	</div>
	<div class="indexrunner">
		<?php
			wp_reset_query();
			if (have_posts()) : 

			while (have_posts()) : the_post(); 
				?>
				<div class="postouter">
					<div class="postinner">
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<br />
						<?php the_excerpt(); ?>
					</div>
				</div>
				<?php
			endwhile;
			else:
			endif;
		?>
	</div>

<?php get_footer(); ?>