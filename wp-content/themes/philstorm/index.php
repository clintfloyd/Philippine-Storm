<?php get_header(); ?>
	<h1>Featured Article</h1>
	<div class="topcontent_feat">
		<div class="slide">
			<div class="slider-wrap">
				<div id="main-photo-slider" class="csw">
	
					<div class="panelContainer">
	
						<div class="panel" title="Panel 1">
							<div class="wrapper">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-1.jpg" alt="temp" />
								<div class="photo-meta-data">
									Photo Credit: <a href="http://flickr.com/photos/astrolondon/2396265240/">Kaustav Bhattacharya</a><br />
									<span>"Free Tibet" Protest at the Olympic Torch Rally</span>
	
								</div>
							</div>
							<br clear="all" />
						</div>
						<div class="panel" title="Panel 2">
							<div class="wrapper">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-2.jpg" alt="temp" />
								<div class="photo-meta-data">
									Chicago Bears at Seattle Seahawks<br />
	
									<span>Fifth field goal, overtime win for the Seahawks</span>
								</div>
							</div>
							<br clear="all" />
						</div>		
						<div class="panel" title="Panel 3">
							<div class="wrapper">
								
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/scotch-egg.jpg" alt="scotch egg" class="floatLeft"/>
								
								<h1>How to Cook a Scotch Egg</h1>
	
								
								<ul>
									<li>6 hard-boiled eggs, well chilled (i try to cook them to just past soft boiled stage, then stick them in the coldest part of the fridge to firm up)</li>
									<li>1 pound good quality sausage meat (i used ground turkey meat, seasoned with sage, white pepper, salt and a tiny bit of maple syrup)</li>
									<li>1/2 cup AP flour</li>
									<li>1-2 eggs, beaten</li>
									<li>3/4 cup panko-style bread crumbs</li>
	
									<li>Vegetable oil for frying</li>
								</ul>
							</div>
							<br clear="all" />
						</div>
						<div class="panel" title="Panel 4">
							<div class="wrapper">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-4.jpg" alt="temp" />
								<div class="photo-meta-data">
	
									A Poem by Shel Silverstein<br />
									<span>Falling Up</span>
								</div>
							</div>
							<br clear="all" />
						</div>
						<div class="panel" title="Panel 5">
							<div class="wrapper">
								<img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-5.jpg" alt="temp" />
	
								<div class="photo-meta-data">
									New Video on CSS-Tricks<br />
									<span>Using Wufoo for Web Forms</span>
								</div>
								<br clear="all" />
							</div>
						</div>
						<div class="panel" title="Panel 6">
							<div class="wrapper">
	
								<h1>A Tale of Two Cities</h1>
								<p><em>Charles Dickins</em></p>
								<blockquote>It was the best of times, it was the worst of times, it was the age of wisdom, it was the age of foolishness, it was the epoch of belief, it was the epoch of incredulity, it was the season of Light, it was the season of Darkness, it was the spring of hope, it was the winter of despair, we had everything before us, we had nothing before us, we were all going direct to heaven, we were all going direct the other way - in short, the period was so far like the present period, that some of its noisiest authorities insisted on its being received, for good or for evil, in the superlative degree of comparison only.</blockquote>
							</div>
							<br clear="all" />
						</div>
						<br clear="all" />
					</div>
					<br clear="all" />
				</div>
	
				<a href="#1" class="cross-link active-thumb"><img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-1thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a>
				<div id="movers-row">
					<div><a href="#2" class="cross-link"><img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-2thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
					<div><a href="#3" class="cross-link"><img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-3thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
					<div><a href="#4" class="cross-link"><img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-4thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
					<div><a href="#5" class="cross-link"><img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-5thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
					<div><a href="#6" class="cross-link"><img src="<?php bloginfo('stylesheet_directory'); ?>/images_sample/tempphoto-6thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
				</div>
				<br clear="all" />
			</div>
			<br clear="all" />
		</div>
		<br clear="all" />
	</div>
	<br clear="all" />
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