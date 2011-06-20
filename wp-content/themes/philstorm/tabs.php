<div class="bodycontent">
					
		<div class="cat-widget addmarginright">
			
			<h3><span class="cattitle">WORLD</span><span class="catfeed"><a title="Business RSS Feed" href="<?php bloginfo('url');?>/category/news/world/feed/rss"></a></span></h3>
			<div class="clear"></div>
			<?php
				wp_reset_query();
				query_posts('showposts=8&category_name=world&orderby=date');
				$x=0;
				$xxx=0;
				
				$other_titles = array();
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				$xxx++;
				$limage = get_post_meta(get_the_ID(), '_video_thumbnail',true);
				$simage = get_post_meta(get_the_ID(), '_video_thumbnail_small',true);
				$limage = isset($limage) && $limage != "" ? $limage : "/images/nopostimage.png";
				$simage = isset($simage) && $simage != "" ? $simage : "/images/nopostimagethumb.png";
				
				$commentscount = get_comments_number();

				if($commentscount == 1 || $commentscount == 0 ): $commenttext = 'comment'; endif;
				if($commentscount > 1 ): $commenttext = 'comments'; endif;
				
				$cm = $commentscount . " " .$commenttext;
				if($xxx <=1){
					$postdata["main"] = array("title"=>get_the_title(),
										 "author"=>get_the_author(),
										 "link"=>get_permalink(),
										 "date"=>get_the_date(),
										 "time"=>get_the_time(),
										 "excerpt"=>get_the_excerpt(),
										 "img"=>$limage,
										 "thumb"=>$simage,
										 "comment"=>$cm);
				}else{
					$postdata["other"][$xxx-1] = array("title"=>get_the_title(),
										 "author"=>get_the_author(),
										 "date"=>get_the_date(),
										 "link"=>get_permalink(),
										 "time"=>get_the_time(),
										 "excerpt"=>get_the_excerpt(),
										 "img"=>$limage,
										 "thumb"=>$simage,
										 "comment"=>$cm);
				}
			 endwhile; else:
			endif;
			?>
			<!-- main posts -->
			<div class="story">
				<div class="thumbntitle" style="overflow: auto;">
					<div class="storythumb"><div class="fancybox-zoom"><a class="zoom" href="<?php echo $postdata['main']['link']; ?>"><img width="120" height="70" title="<?php echo $postdata['main']['title']; ?>" src="<?php bloginfo("stylesheet_directory"); ?><?php echo $postdata['main']['thumb']; ?>"><div class="zoom-black" style="display: none; opacity: 0.4;"></div><div class="zoom-overlay" style="display: none;"></div></a></div></div>
					<h4><a title="<?php echo $postdata['main']['title']; ?>" href="<?php echo $postdata['main']['link']; ?>"><?php echo $postdata['main']['title']; ?></a></h4>
					<div class="reactions"><?php echo $postdata['main']['date']; ?> | <a title="Comment on <?php echo $postdata['main']['title']; ?>" href="<?php echo $postdata['main']['link']; ?>#comments"><?php echo $postdata['main']['comment']; ?></a></div><div class="clear"></div>
				</div>
				<p style="overflow: auto;"><?php echo $postdata['main']['excerpt']; ?></p><div class="clear"></div>
				<div class="show_author">Published by <strong><?php echo $postdata['main']['author']; ?></strong></div>				
				<div class="fullarticle"><a class="rounded-black" href="<?php echo $postdata['main']['link']; ?>" style="border-radius: 5px 5px 5px 5px;">Continue <span>&nbsp;&raquo;</span></a></div><div class="clear"></div>
			</div>
									<!-- main posts -->
			
			<ul class="morestories">
				<?php
				foreach($postdata['other'] as $p){
				?>
				<li>
					<a class="item-more" href="javascript:void(0);"></a><a title="<?php echo $p['title']; ?>" href="<?php echo $p['link']; ?>"><?php echo $p['title']; ?></a>
					<div class="lisummary" style="display: none;"><p><?php echo $p['excerpt']; ?>&nbsp;<a href="<?php echo $p['link']; ?>">Continue</a></p></div>
				</li>
				<?php
				}
				?>
			</ul>
						
			<div class="moreincat"><a class="rounded-orange" href="<?php bloginfo('url'); ?>?category_name=world" style="border-radius: 5px 5px 5px 5px;">More in World News <span>&nbsp;&raquo;</span></a></div>
		
		</div>
				
			
		
		<div class="cat-widget">
			
			<h3><span class="cattitle">LOCAL</span><span class="catfeed"><a title="Business RSS Feed" href="<?php bloginfo('url');?>/category/weather/feed/rss"></a></span></h3>
			<div class="clear"></div>
			<?php
				wp_reset_query();
				query_posts('showposts=8&category_name=weather&orderby=date');
				$x=0;
				$xxx=0;
				
				$other_titles = array();
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				$xxx++;
				$limage = get_post_meta(get_the_ID(), '_video_thumbnail',true);
				$simage = get_post_meta(get_the_ID(), '_video_thumbnail_small',true);
				$limage = isset($limage) && $limage != "" ? $limage : "/images/nopostimage.png";
				$simage = isset($simage) && $simage != "" ? $simage : "/images/nopostimagethumb.png";
				
				$commentscount = get_comments_number();

				if($commentscount == 1 || $commentscount == 0 ): $commenttext = 'comment'; endif;
				if($commentscount > 1 ): $commenttext = 'comments'; endif;
				
				$cm = $commentscount . " " .$commenttext;
				if($xxx <=1){
					$postdata["main"] = array("title"=>get_the_title(),
										 "author"=>get_the_author(),
										 "link"=>get_permalink(),
										 "date"=>get_the_date(),
										 "time"=>get_the_time(),
										 "excerpt"=>get_the_excerpt(),
										 "img"=>$limage,
										 "thumb"=>$simage,
										 "comment"=>$cm);
				}else{
					$postdata["other"][$xxx-1] = array("title"=>get_the_title(),
										 "author"=>get_the_author(),
										 "date"=>get_the_date(),
										 "link"=>get_permalink(),
										 "time"=>get_the_time(),
										 "excerpt"=>get_the_excerpt(),
										 "img"=>$limage,
										 "thumb"=>$simage,
										 "comment"=>$cm);
				}
			 endwhile; else:
			endif;
			?>
			<!-- main posts -->
			<div class="story">
				<div class="thumbntitle" style="overflow: auto;">
					<div class="storythumb"><div class="fancybox-zoom"><a class="zoom" href="<?php echo $postdata['main']['link']; ?>"><img width="120" height="70" title="<?php echo $postdata['main']['title']; ?>" src="<?php bloginfo("stylesheet_directory"); ?><?php echo $postdata['main']['thumb']; ?>"><div class="zoom-black" style="display: none; opacity: 0.4;"></div><div class="zoom-overlay" style="display: none;"></div></a></div></div>
					<h4><a title="<?php echo $postdata['main']['title']; ?>" href="<?php echo $postdata['main']['link']; ?>"><?php echo $postdata['main']['title']; ?></a></h4>
					<div class="reactions"><?php echo $postdata['main']['date']; ?> | <a title="Comment on <?php echo $postdata['main']['title']; ?>" href="<?php echo $postdata['main']['link']; ?>#comments"><?php echo $postdata['main']['comment']; ?></a></div><div class="clear"></div>
				</div>
				<p style="overflow: auto;"><?php echo $postdata['main']['excerpt']; ?></p><div class="clear"></div>
				<div class="show_author">Published by <strong><?php echo $postdata['main']['author']; ?></strong></div>				
				<div class="fullarticle"><a class="rounded-black" href="<?php echo $postdata['main']['link']; ?>" style="border-radius: 5px 5px 5px 5px;">Continue <span>&nbsp;&raquo;</span></a></div><div class="clear"></div>
			</div>
									<!-- main posts -->
			
			<ul class="morestories">
				<?php
				foreach($postdata['other'] as $p){
				?>
				<li>
					<a class="item-more" href="javascript:void(0);"></a><a title="<?php echo $p['title']; ?>" href="<?php echo $p['link']; ?>"><?php echo $p['title']; ?></a>
					<div class="lisummary" style="display: none;"><p><?php echo $p['excerpt']; ?>&nbsp;<a href="<?php echo $p['link']; ?>">Continue</a></p></div>
				</li>
				<?php
				}
				?>
			</ul>
						
			<div class="moreincat"><a class="rounded-orange" href="<?php bloginfo('url'); ?>?category_name=weather" style="border-radius: 5px 5px 5px 5px;">More in Local News <span>&nbsp;&raquo;</span></a></div>
		
		</div>
		
		
		<div class="clear"></div>		
			
		<div class="cat-widget addmarginright">
			
			<h3><span class="cattitle">STORM</span><span class="catfeed"><a title="Business RSS Feed" href="<?php bloginfo('url');?>/category/storm/feed/rss"></a></span></h3>
			<div class="clear"></div>
			<?php
				wp_reset_query();
				query_posts('showposts=8&category_name=storm&orderby=date');
				$x=0;
				$xxx=0;
				
				$other_titles = array();
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				$xxx++;
				$limage = get_post_meta(get_the_ID(), '_video_thumbnail',true);
				$simage = get_post_meta(get_the_ID(), '_video_thumbnail_small',true);
				$limage = isset($limage) && $limage != "" ? $limage : "/images/nopostimage.png";
				$simage = isset($simage) && $simage != "" ? $simage : "/images/nopostimagethumb.png";
				
				$commentscount = get_comments_number();

				if($commentscount == 1 || $commentscount == 0 ): $commenttext = 'comment'; endif;
				if($commentscount > 1 ): $commenttext = 'comments'; endif;
				
				$cm = $commentscount . " " .$commenttext;
				if($xxx <=1){
					$postdata["main"] = array("title"=>get_the_title(),
										 "author"=>get_the_author(),
										 "link"=>get_permalink(),
										 "date"=>get_the_date(),
										 "time"=>get_the_time(),
										 "excerpt"=>get_the_excerpt(),
										 "img"=>$limage,
										 "thumb"=>$simage,
										 "comment"=>$cm);
				}else{
					$postdata["other"][$xxx-1] = array("title"=>get_the_title(),
										 "author"=>get_the_author(),
										 "date"=>get_the_date(),
										 "link"=>get_permalink(),
										 "time"=>get_the_time(),
										 "excerpt"=>get_the_excerpt(),
										 "img"=>$limage,
										 "thumb"=>$simage,
										 "comment"=>$cm);
				}
			 endwhile; else:
			endif;
			?>
			<!-- main posts -->
			<div class="story">
				<div class="thumbntitle" style="overflow: auto;">
					<div class="storythumb"><div class="fancybox-zoom"><a class="zoom" href="<?php echo $postdata['main']['link']; ?>"><img width="120" height="70" title="<?php echo $postdata['main']['title']; ?>" src="<?php bloginfo("stylesheet_directory"); ?><?php echo $postdata['main']['thumb']; ?>"><div class="zoom-black" style="display: none; opacity: 0.4;"></div><div class="zoom-overlay" style="display: none;"></div></a></div></div>
					<h4><a title="<?php echo $postdata['main']['title']; ?>" href="<?php echo $postdata['main']['link']; ?>"><?php echo $postdata['main']['title']; ?></a></h4>
					<div class="reactions"><?php echo $postdata['main']['date']; ?> | <a title="Comment on <?php echo $postdata['main']['title']; ?>" href="<?php echo $postdata['main']['link']; ?>#comments"><?php echo $postdata['main']['comment']; ?></a></div><div class="clear"></div>
				</div>
				<p style="overflow: auto;"><?php echo $postdata['main']['excerpt']; ?></p><div class="clear"></div>
				<div class="show_author">Published by <strong><?php echo $postdata['main']['author']; ?></strong></div>				
				<div class="fullarticle"><a class="rounded-black" href="<?php echo $postdata['main']['link']; ?>" style="border-radius: 5px 5px 5px 5px;">Continue <span>&nbsp;&raquo;</span></a></div><div class="clear"></div>
			</div>
									<!-- main posts -->
			
			<ul class="morestories">
				<?php
				foreach($postdata['other'] as $p){
				?>
				<li>
					<a class="item-more" href="javascript:void(0);"></a><a title="<?php echo $p['title']; ?>" href="<?php echo $p['link']; ?>"><?php echo $p['title']; ?></a>
					<div class="lisummary" style="display: none;"><p><?php echo $p['excerpt']; ?>&nbsp;<a href="<?php echo $p['link']; ?>">Continue</a></p></div>
				</li>
				<?php
				}
				?>
			</ul>
						
			<div class="moreincat"><a class="rounded-orange" href="<?php bloginfo('url'); ?>?category_name=storm" style="border-radius: 5px 5px 5px 5px;">More in Storm <span>&nbsp;&raquo;</span></a></div>
		
		</div>
				
			
		
	<div class="cat-widget">
			
			<h3><span class="cattitle">TRIVIA</span><span class="catfeed"><a title="Business RSS Feed" href="<?php bloginfo('url');?>/category/trivia/feed/rss"></a></span></h3>
			<div class="clear"></div>
			<?php
				unset($postdata,$other_titles,$limage,$simage,$commentscount,$commenttext);
				wp_reset_query();
				query_posts('showposts=8&category_name=trivia&orderby=date');
				$x=0;
				$xxx=0;
				
				$other_titles = array();
				if ( have_posts() ) : while ( have_posts() ) : the_post();
				$xxx++;
				$limage = get_post_meta(get_the_ID(), '_video_thumbnail',true);
				$simage = get_post_meta(get_the_ID(), '_video_thumbnail_small',true);
				$limage = isset($limage) && $limage != "" ? $limage : "/images/nopostimage.png";
				$simage = isset($simage) && $simage != "" ? $simage : "/images/nopostimagethumb.png";
				
				$commentscount = get_comments_number();

				if($commentscount == 1 || $commentscount == 0 ): $commenttext = 'comment'; endif;
				if($commentscount > 1 ): $commenttext = 'comments'; endif;
				$cm = $commentscount . " " .$commenttext;
				if($xxx <=1){
					$postdata["main"] = array("title"=>get_the_title(),
										 "author"=>get_the_author(),
										 "link"=>get_permalink(),
										 "date"=>get_the_date(),
										 "time"=>get_the_time(),
										 "excerpt"=>get_the_excerpt(),
										 "img"=>$limage,
										 "thumb"=>$simage,
										 "comment"=>$cm);
				}else{
					$postdata["other"][$xxx-1] = array("title"=>get_the_title(),
										 "author"=>get_the_author(),
										 "date"=>get_the_date(),
										 "link"=>get_permalink(),
										 "time"=>get_the_time(),
										 "excerpt"=>get_the_excerpt(),
										 "img"=>$limage,
										 "thumb"=>$simage,
										 "comment"=>$cm);
				}
			 endwhile; else:
			endif;
			?>
			<!-- main posts -->
			<div class="story">
				<div class="thumbntitle" style="overflow: auto;">
					<div class="storythumb"><div class="fancybox-zoom"><a class="zoom" href="<?php echo $postdata['main']['link']; ?>"><img width="120" height="70" title="<?php echo $postdata['main']['title']; ?>" src="<?php bloginfo("stylesheet_directory"); ?><?php echo $postdata['main']['thumb']; ?>"><div class="zoom-black" style="display: none; opacity: 0.4;"></div><div class="zoom-overlay" style="display: none;"></div></a></div></div>
					<h4><a title="<?php echo $postdata['main']['title']; ?>" href="<?php echo $postdata['main']['link']; ?>"><?php echo $postdata['main']['title']; ?></a></h4>
					<div class="reactions"><?php echo $postdata['main']['date']; ?> | <a title="Comment on <?php echo $postdata['main']['title']; ?>" href="<?php echo $postdata['main']['link']; ?>#comments"><?php echo $postdata['main']['comment']; ?></a></div><div class="clear"></div>
				</div>
				<p style="overflow: auto;"><?php echo $postdata['main']['excerpt']; ?></p><div class="clear"></div>
				<div class="show_author">Published by <strong><?php echo $postdata['main']['author']; ?></strong></div>				
				<div class="fullarticle"><a class="rounded-black" href="<?php echo $postdata['main']['link']; ?>" style="border-radius: 5px 5px 5px 5px;">Continue <span>&nbsp;&raquo;</span></a></div><div class="clear"></div>
			</div>
									<!-- main posts -->
			
			<ul class="morestories">
				<?php
				foreach($postdata['other'] as $p){
				?>
				<li>
					<a class="item-more" href="javascript:void(0);"></a><a title="<?php echo $p['title']; ?>" href="<?php echo $p['link']; ?>"><?php echo $p['title']; ?></a>
					<div class="lisummary" style="display: none;"><p><?php echo $p['excerpt']; ?>&nbsp;<a href="<?php echo $p['link']; ?>">Continue</a></p></div>
				</li>
				<?php
				}
				?>
			</ul>
						
			<div class="moreincat"><a class="rounded-orange" href="<?php bloginfo('url'); ?>?category_name=weather" style="border-radius: 5px 5px 5px 5px;">More in Trivia <span>&nbsp;&raquo;</span></a></div>
		
		</div>
		<div class="clear"></div>		
		
</div>