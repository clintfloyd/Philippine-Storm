<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link REL="SHORTCUT ICON" HREF="<?php bloginfo("stylesheet_directory"); ?>/favicon.ico">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;
	if(is_home()){
		echo $title = "Philippine Storm - Weather Forecast, News, Typhoon, and Radar Report";
		$exc = "Philippine Storm, your alternative source of weather forecast - storm, typhoon, news and weather report.";
	}else{
		if(is_single()){
			global $globalTitle;
			wp_reset_query();
			if (have_posts()) : 
				while (have_posts()) : the_post();
					$exc = get_the_excerpt();
					$title = get_the_title();
					echo get_the_title() . " | Philippine Storm - Weather Forecast, News, Typhoon, and Radar Report";
				endwhile;
			endif;
		}else{
			echo $title = "Philippine Storm - Weather Forecast, News, Typhoon, and Radar Report";
			$exc = "Philippine Storm, your alternative source of weather forecast - storm, typhoon, news and weather report.";
		}
	}
	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if(is_home()){?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/slider.css" />
<?php } ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php	
	remove_action('wp_head', 'wp_generator');
	wp_head();
?>

<meta name="description" content="<?php echo $exc; ?>" />
<meta name="keywords" content="<?php echo $title; ?>, typhoon, storm, philippines, news, weather, forecasting" />
<meta name="Robots" content="index,follow" />
<meta name="Author" content="philippinestorm@gmail.com" /> 
<meta name="revisit-after" content="1 days">

<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquerytools.js"></script>
<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/main.js"></script>
<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/coda-slider.1.1.1.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery-easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo("stylesheet_directory"); ?>/js/jquery-easing-compatibility.1.2.pack.js"></script>
</head>

<body>
	<div class="maincontainer">
		<div>
			<div class="header">
				<div class="supertophead">
					<div class="todayis" id="todayis">
						Today is xxxxxx xx, xxxx
					</div>
					<div class="">
					</div>
					<br clear="all" />
				</div>
				<div class="mainheader">
					<div class="logo">
						<a href="<?php bloginfo("url"); ?>">
							<img src="<?php bloginfo("stylesheet_directory"); ?>/images/logo.png" alt="<?php bloginfo("title"); ?>" border="0" />
						</a>
					</div>
					<div class="weather" id="weatherlocationdiv">
						<div class="logo">
							<img src="/weather/na.png" alt="loading..." />
						</div>
						<div class="info">
							<span class="location">Loading...</span><br />
							0&deg;C | 0&deg;F<br />
							Humidity: 0%
						</div>
						<br clear="all" />
					</div>
					<br clear="all" />
				</div>
				<div class="headermenu">
					<ul>
						<li><a href="<?php bloginfo('url'); ?>" <?php if(is_home()){ echo "class=\"active\""; } ?>>Home</a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/news">News</a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/storm">Storms</a></li>
						<li><a href="<?php bloginfo('url'); ?>/category/typhoon">Typhoons</a></li>
						<li><a href="<?php bloginfo('url'); ?>/about">About</a></li>
						<br clear="all" />
					</ul>
				</div>
				<div id="links">

				<ul id="linklist">
					<li><a title="Weather Archives" href="#">The Weather Archive</a></li>		<li><a title="Live Weather Forecast" href="#">Live Weather Forecast</a></li><li><a title="Be Informed, Stay Connected" href="#">Stay Connected</a></li>		<li><a href="<?php bloginfo('url'); ?>/feed/rss" title="RSS Feeds">RSS Feeds</a>
				</ul>
						
				<form action="<?php bloginfo('url'); ?>/" method="get">
					<fieldset class="search-form">
						<span id="searchtxtoverlay">Search...</span>
						<input type="text" class="search-text clearfield" value="" id="s" name="s" style="color: rgb(85, 85, 85);">
						<input type="submit" class="search-go" value="">
					</fieldset>
				</form>
					
				<br clear="all" />
				</div>
				<div class="header_ad">
					<div class="adhead">
						<center>Advertisement</center>
					</div>
					<div class="adcontainer">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/BB_HS_728x90.gif" alt="Sample Ad" border="0" />
					</div>
				</div>
			</div>
			<div class="mainbodycontainer">
				<div class="leftbodycontent">