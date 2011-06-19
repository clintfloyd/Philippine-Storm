				</div>
				<?php get_sidebar(); ?>
				<br clear="all" />
			</div>
			<div class="footercontainer">
				<div class="header_ad">
					<div class="adhead">
						<center>Advertisement</center>
					</div>
					<div class="adcontainer">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/BB_HS_728x90.gif" alt="Sample Ad" border="0" />
					</div>
				</div>
				<div class="mainfooter">
					<ul class="listingcat">
						<li><a title="Home" href="<?php bloginfo('url'); ?>">Home</a></li>
							<li class="cat-item cat-item-1"><a title="Health" href="#">News</a>
						</li>
							<li class="cat-item cat-item-3"><a title="Storm" href="#">Storm</a>
						</li>
							<li class="cat-item cat-item-5"><a title="Typhoon" href="#">Typhoon</a>
						</li>
							<li class="cat-item cat-item-5"><a title="Typhoon" href="#">Privacy Policy</a>
						</li>
					</ul>
					<br clear="all" />
					<ul class="listinglinks">
						<li><?php bloginfo('title');?> Network</li>
						<li><a class="rsslink" href="<?php bloginfo('url'); ?>/feeds/rss">RSS feeds</a></li>
						<li><a href="#">Archives</a></li>
						<li><a href="#">Sitemap</a></li>
						<li><a href="#">Help</a></li>
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
					<br clear="all" />
					<div class="copyright">
						Copyright &copy; 2011<?php $currYear = date("Y"); if($currYear != "2011"){ echo "-".$currYear;} ?> <?php bloginfo('title'); ?>. All rights reserved. Powered by <a title="Philippine Storm" href="<?php bloginfo("url"); ?>"><?php bloginfo('title'); ?></a>. 
						A project by <a title="New Pinoy MOvies" href="http://www.newpinoymovies.com/">New Pinoy Movies</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
(function($) {

	// overlay fade
	$(".overlay, .layeroverlay").fadeTo(1, 0.70);
	
	// click to zoom button
	$(".zoom-overlay, .zoom-black").css({display: "none"});
	$(".fancybox-zoom").hover(function(){
		$(this).children("a").children(".zoom-black").show(1).fadeTo(1, 0.40);
		$(this).children("a").children(".zoom-overlay").fadeIn(500);
	},function(){
		$(this).children("a").children(".zoom-black, .zoom-overlay").hide(1);
	});
	$(".fancybox-zoom").click(function(){
		$(".zoom-black:visible, .zoom-overlay:visible").hide(1);
	});
	
	// navigation menus
	$("#menu ul").css({display: "none"}); // Opera Fix
	$("#linklist ul").css({display: "none"}); // Opera Fix
	//$("#menu > li:has(ul)").append('<span class="arrow"></span>');
	$("#menu ul > li:has(ul)").append('<span class="arrow2"></span>');
	$("#linklist > li:has(ul)").append('<span class="arrow3"></span>');

	$("#menu > li:has(ul)").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).fadeIn(400);
		$(this).addClass('active-tab');
		$(this).append('<span class="arrow"></span>');
	},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		$(this).removeClass('active-tab');
		$(".arrow").remove();
	});

	$("#menu ul > li:has(ul)").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).fadeIn(400);
		$(this).addClass('active-tab-child');
	},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		$(this).removeClass('active-tab-child');
	});

	$("#linklist > li:has(ul)").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).fadeIn(400);
	},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
	});

	// clear forms on focus
	$('.clearfield').each(function() {
		var default_value = this.value;
		$(this).css('color', '#555'); // this could be in the style sheet instead
		$(this).focus(function() {
			if(this.value == default_value) {
				this.value = '';
			}
		});
		$(this).blur(function() {
			if(this.value == '') {
				this.value = default_value;
			}
		});
	});

	// same height calculations
	$(".slidingposts li div.title").equalHeights();
	$(".slidingposts li div.excerpt").equalHeights();
	$(".wea-column").equalHeights();
	$(".story p").equalHeights();
	$(".story .thumbntitle").equalHeights();
	$(".bottom-cat .equal").equalHeights();
	$(".bottom-cat p").equalHeights();

	// rounded corners calculations
	$(".toptabs a").corner("top 3px");
	$(".tabbox ol").corner("bottom 5px");
	$(".morevideo a, .sliding, .next, .prev, .all, .widget_tag_cloud a, .sidebar li:parent, .rounded-regular, .rounded-orange, .rounded-black, #footer").corner("5px");
	$("#reset").corner("10px");
	$(".post .taglist li a").corner("10px");

	// force css modifications and fixes
	$(".tabbox ol li:last-child").css({'border-bottom':'0'});
	$(".removeRightBorder").css({'border-right':'0'});
	$(".widget_tag_cloud a, .next, .prev, .all, .morevideo a, .rounded-regular").hover(
		function(){
		$(this).fadeTo(1, 0).css({"background": "#ff3000", "color": "#fff", "text-decoration": "none"}).fadeTo(300, 1);
		},function(){
		$(this).css({"background": "#fff", "color":"#15527e"});
		}
	);
	
	// plus/minus on main page
	$('div.lisummary').css({'display':'none'});
	$('.item-more').toggle(
		function() {
		$(this).css({'background-position' : 'bottom'});
		$(this).parent().children('div').show();
		},
		function() {
		$(this).css({'background-position' : 'top'});
		$(this).parent().children('div').hide();
		}
	);

	// hot news slideshow
	$("#hotnewshide").tabs("#hotnews ul li", {
		effect: "fade",
				fadeInSpeed: 1000,
						fadeOutSpeed: 200,
				rotate: true
	}).slideshow({autoplay: true, interval: 5000, clickable: false});
	
	// main slideshow
	$(".slideposts").tabs(".item", {
		event: "mouseover",
		effect: "fade",
		fadeInSpeed: 1000,
		fadeOutSpeed: 200,
		rotate: true	}).slideshow({autoplay: true, interval: 5000, clickable: false});
	
	// sidebar gallery
	$(".gallery-items").tabs(".gallery a", {
		effect: "slide",
		rotate: true
	}).slideshow({autoplay: false, clickable: false, next: '.nextgal', prev: '.prevgal'});
	
	// main tabs
	$(".toptabs ul").tabs(".tabbox", {
		event: "click",
		effect: "default",
		rotate: true
	}).slideshow({autoplay: false, clickable: false});
	
	// scrollable tabs
	$("ul.slidingtabs").tabs("div.slidingcontent", {
		event: "click",
		effect: "default",
		rotate: true
	}).slideshow({autoplay: false, clickable: false});
	
	// initialize scrollables
	$(".scrollable").scrollable({
		speed: 800
	});
	
	// zooming and images
	$("a.zoom").fancybox({
		centerOnScroll: true,
		hideOnContentClick: true
	});
	
	$("a.zoomgallery").fancybox({
		centerOnScroll: true,
		hideOnContentClick: false,
		titlePosition: 'over',
		cyclic: true
	});
	
	// control threaded replies
	$("ol.commentlist li ol.children").css({'display':'none'});
	$("ol.commentlist li ol.children").each(function(){
		var parentCommentID = $(this).parent().attr('id');
		var num = $(this).children('li').length;
		if (num > 0) {
			$(this).parent().children('div').children('div.reply').append('<span class="threads"><a href="#viewreplies" class="viewreplies">View Replies (' + num + ')</a></span>');
			if ($.cookie(parentCommentID) == 'showthread') {
				$(this).toggle();
			}
		}
	});
	
	// replies - threads
	$(".viewreplies").live('click', function(){
		$(this).parent().parent().parent().parent().children('ol.children').toggle();
		var childs = $(this).parent().parent().parent().parent().children('ol.children');
		var parentCommentID = $(this).parent().parent().parent().parent().attr('id');
		if (childs.is(':visible')) {
			// register visible cookie
			$.cookie(parentCommentID, 'showthread', { path: '/', expires: 100 });
		} else {
			$.cookie(parentCommentID, 'hidethread', { path: '/', expires: 100 });
		}
	});

});
</script>
</body>
</html>