<?php
add_filter( 'show_admin_bar', '__return_false' );
define("EV_VERSION", 41);
add_filter('the_content', 'make_clickable');
	
	function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
		$content = get_the_content($more_link_text, $stripteaser, $more_file);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}
	
	
	if(!get_option('embeddedvideo_prefix'))embeddedvideo_initialize();
	// initiate options and variables
	function embeddedvideo_initialize() {
		add_option('embeddedvideo_prefix', "Direkt");
		add_option('embeddedvideo_space', "false");
		add_option('embeddedvideo_width', 545);
		add_option('embeddedvideo_small', "false");
		add_option('embeddedvideo_pluginlink', "true");
		add_option('embeddedvideo_version', EV_VERSION);
		add_option('embeddedvideo_shownolink', "false");
		add_option('embeddedvideo_showinfeed', "true");
		update_option('embeddedvideo_version', EV_VERSION);
	}
	
	if ('true' == get_option('embeddedvideo_space')) {
		$ev_space = '&nbsp;';
	} else {
		$ev_space = '';
	}
	/*
	$subRole = get_role( 'subscriber' );  
	$subRole->add_cap( 'read_private_pages' ); 
	
	*/
	// redirect subscribers to the home page (WP 2.6.2)
	/*
	function change_login_redirect($redirect_to, $request_redirect_to, $user) {
	  if (is_a($user, 'WP_User') && $user->has_cap('edit_posts') === false) {
		return get_bloginfo('siteurl');    
	  }
	  return $redirect_to;
	} 
	*/
	 
	// add filter with default priority (10), filter takes (3) parameters
	//add_filter('login_redirect','change_login_redirect', 10, 3);
	define("LINKTEXT", get_option('embeddedvideo_prefix').$ev_space);
	define("GENERAL_WIDTH", "660");
	
	/***********************/
	
	// format definitions
	define("JAVASCRIPT", floor(GENERAL_WIDTH*173/215));		define("YouTube_Playlist", floor(GENERAL_WIDTH*173/215));
	define("PLAYLIST", floor(GENERAL_WIDTH*173/215));
	define("BLIPTV", floor(GENERAL_WIDTH*173/215));
	define("IFRAME", floor(GENERAL_WIDTH*14/17));
	define("YOUTUBE_HEIGHT", floor(GENERAL_WIDTH*14/17));
	define("GOOGLE_HEIGHT", "450");
	define("MYVIDEO_HEIGHT", floor(GENERAL_WIDTH*367/425));
	define("CLIPFISH_HEIGHT", floor(GENERAL_WIDTH*95/116));
	define("SEVENLOAD_HEIGHT", floor(GENERAL_WIDTH*408/500));
	define("REVVER_HEIGHT", floor(GENERAL_WIDTH*49/60));
	define("METACAFE_HEIGHT", floor(GENERAL_WIDTH*69/80));
	define("YAHOO_HEIGHT", floor(GENERAL_WIDTH*14/17));
	define("IFILM_HEIGHT", floor(GENERAL_WIDTH*365/448));
	define("MYSPACE_HEIGHT", floor(GENERAL_WIDTH*173/215));
	define("MYSPACEFLV_HEIGHT", floor(GENERAL_WIDTH*173/215));
	define("BRIGHTCOVE_HEIGHT", floor(GENERAL_WIDTH*206/243));
	define("QUICKTIME_HEIGHT", floor(GENERAL_WIDTH*3/4));
	define("VIDEO_HEIGHT", floor(GENERAL_WIDTH*3/4));
	define("ANIBOOM_HEIGHT", floor(GENERAL_WIDTH*93/112));
	define("FLASHPLAYER_HEIGHT", floor(GENERAL_WIDTH*93/112));
	define("VIMEO_HEIGHT", floor(GENERAL_WIDTH*3/4));
	define("GUBA_HEIGHT", floor(GENERAL_WIDTH*72/75));
	define("DAILYMOTION_HEIGHT", floor(GENERAL_WIDTH*334/425));
	define("GARAGE_HEIGHT", floor(GENERAL_WIDTH*289/430));
	define("GAMEVIDEO_HEIGHT", floor(GENERAL_WIDTH*3/4));
	define("VSOCIAL_HEIGHT", floor(GENERAL_WIDTH*40/41));
	define("VEOH_HEIGHT", floor(GENERAL_WIDTH*73/90));
	define("GAMETRAILERS_HEIGHT", floor(GENERAL_WIDTH*392/480));
	
	// object targets and links
	
	define("JAVASCRIPT_TARGET", "<script type=\"text/javascript\">document.write(unescape('###VID###'));</script>");
	define("JAVASCRIPT_LINK", "###TXT###");
	define("YouTube_Playlist_TARGET", "<embed width=\"660\" height=\"500\" flashvars=\"playlistfile=http://gdata.youtube.com/feeds/api/playlists/###VID###?v=2&amp;playlist=bottom&amp;playlistsize=11&amp;repeat=list&amp;stretching=exactfit&amp;autostart=true&amp;plugins=fbit-1&amp;dock=true\" wmode=\"transparent\" allowfullscreen=\"true\" allowscriptaccess=\"always\" bgcolor=\"undefined\" src=\"http://www.bestpinoymoviesonline.com/webplayer/player-viral.swf\"/>");	define("YouTube_Playlist_LINK", "###TXT###");
	
	define("PLAYLIST_TARGET", "<script type=\"text/javascript\" src=\"http://www.bestpinoymoviesonline.com/webplayer/swfobject.js\"></script><div id=\"preview\"></div>
								<script type='text/javascript'> 
								  var s1 = new SWFObject('http://www.bestpinoymoviesonline.com/webplayer/player-viral.swf','ply','660','480','9','#ffffff');
								  s1.addParam('allowfullscreen','true');
								  s1.addParam('allowscriptaccess','always');
								  s1.addParam('wmode','opaque');
								  s1.addParam('flashvars','file=###VID###&playlist=bottom&playlistsize=200&backcolor=111111&frontcolor=eeeeee&stretching=fill&plugins=gapro&gapro.accountid=UA-4011032-1');
								  s1.write('preview');
								</script>");
	define("PLAYLIST_LINK", "###TXT###");
	
	
	
	
	define("BLIPTV_TARGET", "<embed src=\"http://blip.tv/play/###VID###\" type=\"application/x-shockwave-flash\" width=\"660\" height=\"450\" allowscriptaccess=\"always\" allowfullscreen=\"true\"></embed>");
	define("BLIPTV_LINK", "###TXT###");
	
	define("IFRAME_TARGET", "<iframe src=\"http://www.zshare.net/videoplayer/player.php?###VID###\" style=\"overflow: hidden;\" height=\"520\" width=\"660\"  border=0 frameborder=0 scrolling=no></iframe>");
	define("IFRAME_LINK", "###TXT###");
	
	define("YOUTUBE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.youtube.com/v/###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".YOUTUBE_HEIGHT."\"><param name=\"movie\" value=\"http://www.youtube.com/v/###VID###\" /><param name=\"autostart\" value=\"true\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("YOUTUBE_LINK", "<a title=\"YouTube\" href=\"http://www.youtube.com/watch?v=###VID###\">YouTube ###TXT######THING###</a>");
	define("GOOGLE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://video.google.com/googleplayer.swf?docId=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".GOOGLE_HEIGHT."\"><param name=\"movie\" value=\"http://video.google.com/googleplayer.swf?docId=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("GOOGLE_LINK", "<a title=\"Google Video\" href=\"http://video.google.com/videoplay?docid=###VID###\">Google ###TXT######THING###</a>");
	define("MYVIDEO_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.myvideo.de/movie/###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".MYVIDEO_HEIGHT."\"><param name=\"movie\" value=\"http://www.myvideo.de/movie/###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("MYVIDEO_LINK", "<a title=\"MyVideo\" href=\"http://www.myvideo.de/watch/###VID###\">MyVideo ###TXT######THING###</a>");
	define("CLIPFISH_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.clipfish.de/videoplayer.swf?as=0&amp;videoid=###VID###&amp;r=1\" width=\"".GENERAL_WIDTH."\" height=\"".CLIPFISH_HEIGHT."\"><param name=\"movie\" value=\"http://www.clipfish.de/videoplayer.swf?as=0&amp;videoid=###VID###&amp;r=1\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("CLIPFISH_LINK", "<a title=\"Clipfish\" href=\"http://www.clipfish.de/player.php?videoid=###VID###\">Clipfish ###TXT######THING###</a>");
	define("SEVENLOAD_TARGET", "<script type='text/javascript' src='http://sevenload.com/pl/###VID###/".GENERAL_WIDTH."x".SEVENLOAD_HEIGHT."'></script><br />");
	define("SEVENLOAD_LINK", "<a title=\"Sevenload\" href=\"http://sevenload.com/videos/###VID###\">Sevenload ###TXT######THING###</a>");
	define("REVVER_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://flash.revver.com/player/1.0/player.swf?mediaId=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".REVVER_HEIGHT."\"><param name=\"movie\" value=\"http://flash.revver.com/player/1.0/player.swf?mediaId=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("REVVER_LINK", "<a title=\"Revver\" href=\"http://one.revver.com/watch/###VID###\">Revver ###TXT######THING###</a>");
	define("METACAFE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.metacafe.com/fplayer/###VID###.swf\" width=\"".GENERAL_WIDTH."\" height=\"".METACAFE_HEIGHT."\"><param name=\"movie\" value=\"http://www.metacafe.com/fplayer/###VID###.swf\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("METACAFE_LINK", "<a title=\"Metacaf&eacute;\" href=\"http://www.metacafe.com/watch/###VID###\">Metacaf&eacute; ###TXT######THING###</a>");
	define("YAHOO_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://us.i1.yimg.com/cosmos.bcst.yahoo.com/player/media/swf/FLVVideoSolo.swf?id=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".YAHOO_HEIGHT."\"><param name=\"movie\" value=\"http://us.i1.yimg.com/cosmos.bcst.yahoo.com/player/media/swf/FLVVideoSolo.swf?id=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("YAHOO_LINK", "<a title=\"Yahoo! Video\" href=\"http://video.yahoo.com/video/play?vid=###YAHOO###.###VID###\">Yahoo! ###TXT######THING###</a>");
	define("IFILM_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.ifilm.com/efp?flvbaseclip=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".IFILM_HEIGHT."\"><param name=\"movie\" value=\"http://www.ifilm.com/efp?flvbaseclip=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("IFILM_LINK", "<a title=\"ifilm\" href=\"http://www.ifilm.com/video/###VID###\">ifilm ###TXT######THING###</a>");
	define("MYSPACE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://lads.myspace.com/videos/vplayer.swf?m=###VID###&amp;type=video\" width=\"".GENERAL_WIDTH."\" height=\"".MYSPACE_HEIGHT."\"><param name=\"movie\" value=\"http://lads.myspace.com/videos/vplayer.swf?m=###VID###&amp;type=video\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("MYSPACE_LINK", "<a title=\"MySpace Video\" href=\"http://vids.myspace.com/index.cfm?fuseaction=vids.individual&amp;videoid=###VID###\">MySpace ###TXT######THING###</a>");
	
	
	
	define("MYSPACEFLV_TARGET", "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\"660\" height=\"450\" id=\"single1\" name=\"single1\"> <param name=\"movie\" value=\"http://www.newpinoymovies.com/jwplayer/player-viral.swf\"> <param name=\"allowfullscreen\" value=\"true\"> <param name=\"allowscriptaccess\" value=\"always\"> <param name=\"wmode\" value=\"transparent\"> <param name=\"flashvars\"value=\"width=660&height=450&file=&plugins=ltas&channel=16384&file=###VID###&image=http://".$_SERVER['SERVER_NAME']."/moviebg.jpg&bufferlength=5&volume=60&dock=false\"> <embed type=\"application/x-shockwave-flash\"src=\"http://www.newpinoymovies.com/jwplayer/player-viral.swf\" width=\"660\" height=\"450\"allowscriptaccess=\"always\" allowfullscreen=\"true\"wmode=\"transparent\"flashvars=\"width=660&height=450&file=&plugins=ltas&channel=16384&file=###VID###&image=http://".$_SERVER['SERVER_NAME']."/moviebg.jpg&bufferlength=5&volume=60&dock=false\"/></embed></object>");
	define("MYSPACEFLV_LINK", "<a title=\"MySpace Video\" href=\"http://vids.myspace.com/index.cfm?fuseaction=vids.individual&amp;videoid=###VID###\">MySpace ###TXT######THING###</a>");
	
	
	
	define("BRIGHTCOVE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://admin.brightcove.com/destination/player/player.swf?initVideoId=###VID###&amp;servicesURL=http://services.brightcove.com/services&amp;viewerSecureGatewayURL=https://services.brightcove.com/services/amfgateway&amp;cdnURL=http://admin.brightcove.com&amp;autoStart=false\" width=\"".GENERAL_WIDTH."\" height=\"".BRIGHTCOVE_HEIGHT."\"><param name=\"movie\" value=\"http://admin.brightcove.com/destination/player/player.swf?initVideoId=###VID###&amp;servicesURL=http://services.brightcove.com/services&amp;viewerSecureGatewayURL=https://services.brightcove.com/services/amfgateway&amp;cdnURL=http://admin.brightcove.com&amp;autoStart=false\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("BRIGHTCOVE_LINK", "<a title=\"brightcove\" href=\"http://www.brightcove.com/title.jsp?title=###VID###\">brightcove ###TXT######THING###</a>");
	define("ANIBOOM_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://api.aniboom.com/embedded.swf?videoar=###VID###&amp;allowScriptAccess=sameDomain&amp;quality=high\" width=\"".GENERAL_WIDTH."\" height=\"".ANIBOOM_HEIGHT."\"><param name=\"movie\" value=\"http://api.aniboom.com/embedded.swf?videoar=###VID###&amp;allowScriptAccess=sameDomain&amp;quality=high\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("ANIBOOM_LINK", "<a title=\"aniBOOM\" href=\"http://www.aniboom.com/Player.aspx?v=###VID###\">aniBOOM ###TXT######THING###</a>");
	define("VIMEO_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.vimeo.com/moogaloop.swf?clip_id=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".VIMEO_HEIGHT."\"><param name=\"movie\" value=\"http://www.vimeo.com/moogaloop.swf?clip_id=###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("VIMEO_LINK", "<a title=\"vimeo\" href=\"http://www.vimeo.com/clip:###VID###\">vimeo ###TXT######THING###</a>");
	define("GUBA_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.guba.com/f/root.swf?video_url=http://free.guba.com/uploaditem/###VID###/flash.flv&amp;isEmbeddedPlayer=true\" width=\"".GENERAL_WIDTH."\" height=\"".GUBA_HEIGHT."\"><param name=\"movie\" value=\"http://www.guba.com/f/root.swf?video_url=http://free.guba.com/uploaditem/###VID###/flash.flv&amp;isEmbeddedPlayer=true\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("GUBA_LINK", "<a title=\"GUBA\" href=\"http://www.guba.com/watch/###VID###\">GUBA ###TXT######THING###</a>");
	define("DAILYMOTION_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.dailymotion.com/swf/###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".DAILYMOTION_HEIGHT."\"><param name=\"movie\" value=\"http://www.dailymotion.com/swf/###VID###\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("GARAGE_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.garagetv.be/v/###VID###/v.aspx\" width=\"".GENERAL_WIDTH."\" height=\"".GARAGE_HEIGHT."\"><param name=\"movie\" value=\"http://www.garagetv.be/v/###VID###/v.aspx\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("GAMEVIDEO_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://gamevideos.com:80/swf/gamevideos11.swf?embedded=1&amp;autoplay=0&amp;src=http://gamevideos.com:80/video/videoListXML%3Fid%3D###VID###%26adPlay%3Dfalse\" width=\"".GENERAL_WIDTH."\" height=\"".GAMEVIDEO_HEIGHT."\"><param name=\"movie\" value=\"http://gamevideos.com:80/swf/gamevideos11.swf?embedded=1&fullscreen=1&amp;autoplay=0&amp;src=http://gamevideos.com:80/video/videoListXML%3Fid%3D###VID###%26adPlay%3Dfalse\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("GAMEVIDEO_LINK", "<a title=\"GameVideos\" href=\"http://gamevideos.com/video/id/###VID###\">GameVideos ###TXT######THING###</a>");
	define("VSOCIAL_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://static.vsocial.com/flash/ups.swf?d=###VID###&a=0\" width=\"".GENERAL_WIDTH."\" height=\"".VSOCIAL_HEIGHT."\"><param name=\"movie\" value=\"http://static.vsocial.com/flash/ups.swf?d=###VID###&a=0\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("VSOCIAL_LINK", "<a title=\"vSocial\" href=\"http://www.vsocial.com/video/?d=###VID###\">vSocial ###TXT######THING###</a>");
	define("VEOH_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.veoh.com/videodetails2.swf?player=videodetailsembedded&type=v&permalinkId=###VID###&id=anonymous\" width=\"".GENERAL_WIDTH."\" height=\"".VEOH_HEIGHT."\"><param name=\"movie\" value=\"http://www.veoh.com/videodetails2.swf?player=videodetailsembedded&type=v&permalinkId=###VID###&id=anonymous\" /><param name=\"autostart\" value=\"true\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("VEOH_LINK", "<a title=\"Veoh\" href=\"http://www.veoh.com/videos/###VID###\">Veoh ###TXT######THING###</a>");
	define("GAMETRAILERS_TARGET", "<object type=\"application/x-shockwave-flash\" data=\"http://www.gametrailers.com/remote_wrap.php?mid=###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".GAMETRAILERS_HEIGHT."\"><param name=\"movie\" value=\"http://www.gametrailers.com/remote_wrap.php?mid=###VID###\" /><param name=\"autostart\" value=\"true\" /><param name=\"wmode\" value=\"transparent\" /></object><br />");
	define("GAMETRAILERS_LINK", "<a title=\"Gametrailers\" href=\"http://www.gametrailers.com/player/###VID###.html\">Gametrailers ###TXT######THING###</a>");
	
	define("LOCAL_QUICKTIME_TARGET", "<object classid=\"clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B\" codebase=\"http://www.apple.com/qtactivex/qtplugin.cab\" width=\"".GENERAL_WIDTH."\" height=\"".QUICKTIME_HEIGHT."\"><param name=\"src\" value=\"".get_option('siteurl')."###VID###\" /><param name=\"autoplay\" value=\"false\" /><param name=\"pluginspage\" value=\"http://www.apple.com/quicktime/download/\" /><param name=\"controller\" value=\"true\" /><!--[if !IE]> <--><object data=\"".get_option('siteurl')."###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".QUICKTIME_HEIGHT."\" type=\"video/quicktime\"><param name=\"pluginurl\" value=\"http://www.apple.com/quicktime/download/\" /><param name=\"controller\" value=\"true\" /><param name=\"autoplay\" value=\"false\" /></object><!--> <![endif]--></object><br />");
	define("LOCAL_FLASHPLAYER_TARGET", "<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" width=\"".GENERAL_WIDTH."\" height=\"".FLASHPLAYER_HEIGHT."\"><param value=\"#FFFFFF\" name=\"bgcolor\" /><param name=\"movie\" value=\"".get_option('siteurl')."/wp-content/plugins/embedded-video-with-link/mediaplayer/player.swf\" /><param value=\"file=".get_option('siteurl')."###VID###&amp;showdigits=true&amp;autostart=false&amp;overstretch=false&amp;showfsbutton=false\" name=\"flashvars\" /><param name=\"wmode\" value=\"transparent\" /><!--[if !IE]> <--><object data=\"".get_option('siteurl')."/wp-content/plugins/embedded-video-with-link/mediaplayer/player.swf\" type=\"application/x-shockwave-flash\" height=\"".FLASHPLAYER_HEIGHT."\" width=\"".GENERAL_WIDTH."\"><param value=\"#FFFFFF\" name=\"bgcolor\"><param value=\"file=".get_option('siteurl')."###VID###&amp;showdigits=true&amp;autostart=false&amp;overstretch=false&amp;showfsbutton=false\" name=\"flashvars\" /><param name=\"wmode\" value=\"transparent\" /></object><!--> <![endif]--></object><br />");
	define("LOCAL_TARGET", "<object classid=\"clsid:22D6f312-B0F6-11D0-94AB-0080C74C7E95\" codebase=\"http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112\" width=\"".GENERAL_WIDTH."\" height=\"".VIDEO_HEIGHT."\" type=\"application/x-oleobject\"><param name=\"filename\" value=\"".get_option('siteurl')."###VID###\" /><param name=\"autostart\" value=\"false\" /><param name=\"showcontrols\" value=\"true\" /><!--[if !IE]> <--><object data=\"".get_option('siteurl')."###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".VIDEO_HEIGHT."\" type=\"application/x-mplayer2\"><param name=\"pluginurl\" value=\"http://www.microsoft.com/Windows/MediaPlayer/\" /><param name=\"ShowControls\" value=\"true\" /><param name=\"ShowStatusBar\" value=\"true\" /><param name=\"ShowDisplay\" value=\"true\" /><param name=\"Autostart\" value=\"0\" /></object><!--> <![endif]--></object><br />");
	define("LOCAL_LINK", "<a title=\"Video File\" href=\"".get_option('siteurl')."###VID###\">Download Video</a>");
	
	define("QUICKTIME_TARGET", "<object classid=\"clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B\" codebase=\"http://www.apple.com/qtactivex/qtplugin.cab\" width=\"".GENERAL_WIDTH."\" height=\"".QUICKTIME_HEIGHT."\"><param name=\"src\" value=\"###VID###\" /><param name=\"autoplay\" value=\"false\" /><param name=\"pluginspage\" value=\"http://www.apple.com/quicktime/download/\" /><param name=\"controller\" value=\"true\" /><!--[if !IE]> <--><object data=\"###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".QUICKTIME_HEIGHT."\" type=\"video/quicktime\"><param name=\"pluginurl\" value=\"http://www.apple.com/quicktime/download/\" /><param name=\"controller\" value=\"true\" /><param name=\"autoplay\" value=\"false\" /></object><!--> <![endif]--></object><br />");
	define("FLASHPLAYER_TARGET", "<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" width=\"".GENERAL_WIDTH."\" height=\"".FLASHPLAYER_HEIGHT."\"><param value=\"#FFFFFF\" name=\"bgcolor\" /><param name=\"movie\" value=\"".get_option('siteurl')."/wp-content/plugins/embedded-video-with-link/mediaplayer/player.swf\" /><param value=\"file=###VID###&amp;showdigits=true&amp;autostart=false&amp;overstretch=false&amp;showfsbutton=false\" name=\"flashvars\" /><param name=\"wmode\" value=\"transparent\" /><!--[if !IE]> <--><object data=\"".get_option('siteurl')."/wp-content/plugins/embedded-video-with-link/mediaplayer/player.swf?file=###VID###\" type=\"application/x-shockwave-flash\" height=\"".FLASHPLAYER_HEIGHT."\" width=\"".GENERAL_WIDTH."\"><param value=\"#FFFFFF\" name=\"bgcolor\"><param value=\"file=###VID###&amp;showdigits=true&amp;autostart=false&amp;overstretch=false&amp;showfsbutton=false\" name=\"flashvars\"><param name=\"wmode\" value=\"transparent\" /></object><!--> <![endif]--></object><br />");
	define("VIDEO_TARGET", "<object classid=\"clsid:22D6f312-B0F6-11D0-94AB-0080C74C7E95\" codebase=\"http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112\" width=\"".GENERAL_WIDTH."\" height=\"".VIDEO_HEIGHT."\" type=\"application/x-oleobject\"><param name=\"filename\" value=\"###VID###\" /><param name=\"autostart\" value=\"false\" /><param name=\"showcontrols\" value=\"true\" /><!--[if !IE]> <--><object data=\"###VID###\" width=\"".GENERAL_WIDTH."\" height=\"".VIDEO_HEIGHT."\" type=\"application/x-mplayer2\"><param name=\"pluginurl\" value=\"http://www.microsoft.com/Windows/MediaPlayer/\" /><param name=\"ShowControls\" value=\"true\" /><param name=\"ShowStatusBar\" value=\"true\" /><param name=\"ShowDisplay\" value=\"true\" /><param name=\"Autostart\" value=\"0\" /></object><!--> <![endif]--></object><br />");
	define("VIDEO_LINK", "<a title=\"Video File\" href=\"###VID###\">Download Video</a>");
	
	// regular expressions
	define("REGEXP_1", "/\[(javascript|playlist|bliptv|iframe|google|youtube|myvideo|clipfish|sevenload|revver|metacafe|yahoo|ifilm|myspace|myspaceflv|brightcove|aniboom|vimeo|guba|dailymotion|garagetv|gamevideo|vsocial|veoh|gametrailers|local|video) ([[:graph:]]+) (nolink)\]/");
	define("REGEXP_2", "/\[(javascript|playlist|bliptv|iframe|google|youtube|myvideo|clipfish|sevenload|revver|metacafe|yahoo|ifilm|myspace|myspaceflv|brightcove|aniboom|vimeo|guba|dailymotion|garagetv|gamevideo|vsocial|veoh|gametrailers|local|video) ([[:graph:]]+) ([[:print:]]+)\]/");
	define("REGEXP_3", "/\[(javascript|playlist|bliptv|iframe|google|youtube|myvideo|clipfish|sevenload|revver|metacafe|yahoo|ifilm|myspace|myspaceflv|brightcove|aniboom|vimeo|guba|dailymotion|garagetv|gamevideo|vsocial|veoh|gametrailers|local|video) ([[:graph:]]+)\]/");
	
	
	// logic
	function embeddedvideo_plugin_callback($match) {
		$output = '';
		// insert plugin link
		//if ((!is_feed())&&('true' == get_option('embeddedvideo_pluginlink'))) $output .= '<small>'.__('embedded by','embeddedvideo').' <a href="http://wordpress.org/extend/plugins/embedded-video-with-link/" title="'.__('plugin page','embeddedvideo').'"><em>Embedded Video</em></a></small><br />';
		if (!is_feed()) {
			switch ($match[1]) {
				case "javascript": $output .= JAVASCRIPT_TARGET; break;								case "Youtube Playlist": $output .= YouTube_Playlist_TARGET; break;
				case "playlist": $output .= PLAYLIST_TARGET; break;
				case "bliptv": $output .= BLIPTV_TARGET; break;
				case "iframe": $output .= IFRAME_TARGET; break;
				case "youtube": $output .= YOUTUBE_TARGET; break;
				case "google": $output .= GOOGLE_TARGET; break;
				case "myvideo": $output .= MYVIDEO_TARGET; break;
				case "clipfish": $output .= CLIPFISH_TARGET; break;
				case "sevenload": $output .= SEVENLOAD_TARGET; break;
				case "revver": $output .= REVVER_TARGET; break;
				case "metacafe": $output .= METACAFE_TARGET; break;
				case "yahoo": $output .= YAHOO_TARGET; break;
				case "ifilm": $output .= IFILM_TARGET; break;
				case "myspace": $output .= MYSPACE_TARGET; break;
				case "myspaceflv": $output .= MYSPACEFLV_TARGET; break;
				case "brightcove": $output .= BRIGHTCOVE_TARGET; break;
				case "aniboom": $output .= ANIBOOM_TARGET; break;
				case "vimeo": $output .= VIMEO_TARGET; break;
				case "guba": $output .= GUBA_TARGET; break;
				case "gamevideo": $output .= GAMEVIDEO_TARGET; break;
				case "vsocial": $output .= VSOCIAL_TARGET; break;
				case "dailymotion": $output .= DAILYMOTION_TARGET; $match[3] = "nolink"; break;
				case "garagetv": $output .= GARAGE_TARGET; $match[3] = "nolink"; break;
				case "veoh": $output .= VEOH_TARGET; break;
				case "gametrailers": $output .= GAMETRAILERS_TARGET; break;
				case "local":
					if (preg_match("%([[:print:]]+).(mov|qt|MOV|QT)$%", $match[2])) { $output .= LOCAL_QUICKTIME_TARGET; break; }
					elseif (preg_match("%([[:print:]]+).(wmv|mpg|mpeg|mpe|asf|asx|wax|wmv|wmx|avi|WMV|MPG|MPEG|MPE|ASF|ASX|WAX|WMV|WMX|AVI)$%", $match[2])) { $output .= LOCAL_TARGET; break; }
					elseif (preg_match("%([[:print:]]+).(swf|flv|SWF|FLV)$%", $match[2])) { $output .= LOCAL_FLASHPLAYER_TARGET; break; }
				case "video":
					if (preg_match("%([[:print:]]+).(mov|qt|MOV|QT)$%", $match[2])) { $output .= QUICKTIME_TARGET; break; }
					elseif (preg_match("%([[:print:]]+).(wmv|mpg|mpeg|mpe|asf|asx|wax|wmv|wmx|avi|WMV|MPG|MPEG|MPE|ASF|ASX|WAX|WMV|WMX|AVI)$%", $match[2])) { $output .= VIDEO_TARGET; break; }
					elseif (preg_match("%([[:print:]]+).(swf|flv|SWF|FLV)$%", $match[2])) { $output .= FLASHPLAYER_TARGET; break; }
				default: break;
			}
			if (get_option('embeddedvideo_shownolink')=='false') {
				if ($match[3] != "nolink") {
					$ev_small = get_option('embeddedvideo_small');
					if ('true' == $ev_small) $output .= "<small>";
					switch ($match[1]) {
						case "javascript": $output .= JAVASCRIPT_LINK; break;												
						case "Youtube Playlist": $output .= YouTube_Playlist_LINK; break;
						case "playlist": $output .= PLAYLIST_LINK; break;
						case "bliptv": $output .= IFRAME_LINK; break;
						case "iframe": $output .= IFRAME_LINK; break;
						case "youtube": $output .= YOUTUBE_LINK; break;
						case "google": $output .= GOOGLE_LINK; break;
						case "myvideo": $output .= MYVIDEO_LINK; break;
						case "clipfish": $output .= CLIPFISH_LINK; break;
						case "sevenload": $output .= SEVENLOAD_LINK; break;
						case "revver": $output .= REVVER_LINK; break;
						case "metacafe": $output .= METACAFE_LINK; break;
						case "yahoo": $output .= YAHOO_LINK; break;
						case "ifilm": $output .= IFILM_LINK; break;
						case "myspace": $output .= MYSPACE_LINK; break;
						case "myspaceflv": $output .= MYSPACEFLV_LINK; break;
						case "brightcove": $output .= BRIGHTCOVE_LINK; break;
						case "aniboom": $output .= ANIBOOM_LINK; break;
						case "vimeo": $output .= VIMEO_LINK; break;
						case "guba": $output .= GUBA_LINK; break;
						case "gamevideo": $output .= GAMEVIDEO_LINK; break;
						case "vsocial": $output .= VSOCIAL_LINK; break;
						case "veoh": $output .= VEOH_LINK; break;
						case "gametrailers": $output .= GAMETRAILERS_LINK; break;
						case "local": $output .= LOCAL_LINK; break;
						case "video": $output .= VIDEO_LINK; break;
						default: break;
					}
					if ('true' == $ev_small) $output .= "</small>";
				}
			}
		} else if (get_option('embeddedvideo_showinfeed')=='true') $output .= __('[There is a video that cannot be displayed in this feed. ', 'embeddedvideo').'<a href="'.get_permalink().'">'.__('Visit the blog entry to see the video.]','embeddedvideo').'</a>';
	
		// postprocessing
		// first replace linktext
		$output = str_replace("###TXT###", LINKTEXT, $output);
		// special handling of Yahoo! Video IDs
		if ($match[1] == "yahoo") {
			$temp = explode(".", $match[2]);
			$match[2] = $temp[1];
			$output = str_replace("###YAHOO###", $temp[0], $output);
		}
		// replace video IDs and text
		$output = str_replace("###VID###", $match[2], $output);
		$output = str_replace("###THING###", $match[3], $output);
		// add HTML comment
		if (!is_feed()) $output .= "\n<!-- new pinoy movies (http://www.newpinoymovies.com) -->\n";
		return ($output);
	}
	
	
	add_filter('the_content', 'embeddedvideo_plugin');
	// actual plugin function
	function embeddedvideo_plugin($content) {
		$output = preg_replace_callback(REGEXP_1, 'embeddedvideo_plugin_callback', $content);
		$output = preg_replace_callback(REGEXP_2, 'embeddedvideo_plugin_callback', $output);
		$output = preg_replace_callback(REGEXP_3, 'embeddedvideo_plugin_callback', $output);
		return ($output);
	}
add_action('init', 'ys_video_template');
function ys_video_template(){
	update_option('postratings_template_vote','Ratings:%RATINGS_IMAGES_VOTE%');
	update_option('postratings_template_text','Ratings:%RATINGS_IMAGES%');
	update_option('postratings_template_none','Ratings:%RATINGS_IMAGES_VOTE%');
	update_option('postratings_template_permission','Ratings:%RATINGS_IMAGES%');
	
	if (!defined('ABSPATH')) include_once('./../../../wp-blog-header.php');
	require_once(ABSPATH . 'wp-admin/includes/file.php');
	require_once(ABSPATH . 'wp-admin/includes/image.php');
	require_once(ABSPATH . 'wp-admin/includes/media.php');
	require_once('commandline.php');
	require_once('imageshack.class.php');
	require_once('resize-class.php');
	
	//imageshack uploader key
	$key = "02ADJNOWc36bad59752b2238df526b92389ec37e";
	
	if($_POST["action"]=="video_thumbnail_upload_submit"){
		if (!current_user_can('upload_files'))
			wp_die(__('You do not have permission to upload files.'));
	
		$mimes = is_array($mimes) ? $mimes : apply_filters('upload_mimes', array (
			'jpg' => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'png' => 'image/png',
			'gif' => 'image/gif'
		));	
		$overrides = array('action'=>'video_thumbnail_upload_submit','mimes'=>$mimes);
		
		$file = wp_handle_upload($_FILES['video_thumbnail'], $overrides);	
		
		if ( !isset($file['error']) ) {
		
			//init imageshack
			$uploader = new ImageShackUploader($key);
					
			$url = $file['url'];
			$type = $file['type'];
			$file = $file['file'];
			$filename = basename($file);		
			// Construct the attachment array
			$attachment = array(
				'post_title' => $filename,
				'post_content' => '',
				'post_status' => 'attachment',
				'post_parent' => $_POST['post_ID'],
				'post_mime_type' => $type,
				'guid' => $url
				);
			
			
			// Save the data
			$id = wp_insert_attachment($attachment, $file, $post);
			
			
			$url_full   = $file;
			
			//upload to imageshack
			$response = $uploader->upload($url_full);
						
			/*
			//original wp upload script
			$imagesize = getimagesize($file);
			$imagedata['width'] = $imagesize['0'];
			$imagedata['height'] = $imagesize['1'];
			list($uwidth, $uheight) = get_udims($imagedata['width'], $imagedata['height']);
			$imagedata['hwstring_small'] = "height='$uheight' width='$uwidth'";
			$imagedata['file'] = $file;
		
			add_post_meta($id, '_wp_attachment_metadata', $imagedata);
			$url = str_replace(get_bloginfo('url'),'',$url);
			$MaxWidth = 180;  //????????
			$MaxHeight = 112; //????????
			if(($imagedata['width']/$imagedata['height'])>($MaxWidth/$MaxHeight)){
				$maxsize=$MaxWidth;
			}else{
				$thumbnailheight=$MaxHeight;
				$thumbnailwidth=$MaxHeight*$imagedata['width']/$imagedata['height'];
				if($thumbnailwidth>$thumbnailheight)
					$maxsize=$thumbnailwidth;
				else
					$maxsize=$thumbnailheight;
			}
			
			//echo $thumbnailwidth.'x'.$thumbnailheight;
			
			
			$thumb = wp_create_thumbnail($file, $maxsize);
			$thumb = str_replace(ABSPATH, '/', $thumb);
			
			*/
			$response = $response->links;
			
			$url  = $response->image_link;
			$thumb = $response->thumb_link;
						
			echo "<script>parent.document.getElementById('video_thumbnail').value='".$url."';</script>";
			echo "<script>parent.document.getElementById('video_thumbnail_small').value='".$thumb."';</script>";
			echo "<script>parent.document.getElementById('video_thumbnail_preview').src='".$thumb."';parent.document.getElementById('video_thumbnail_preview').style.display='';</script>";
			$_GET["action"]="video_upload_form";
			//delete uploaded data
			unlink($url_full);
		}else{
			echo 'upload error.';
		}
	}
	
	if($_GET["action"]=="video_upload_form"){
		?>
        <style type="text/css">
		<!--
		body {
			margin-left: 0px;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
		}
		-->
		#conash3D0 {height:0px; top:-1px;}
		</style>
		<table border="0" cellspacing="0" cellpadding="0">
			<form name="video_thumbnail_upload_form" enctype="multipart/form-data" method="post" action="" target="_self">
			<tr>
			<td>               
				<input name="video_thumbnail" type="file" id="video_thumbnail" value="" style="width: 300px" width="300" />
			</td>
			<td><input type="submit" id="video_thumbnail_submit" name="video_thumbnail_submit" value="Upload" /><input type="hidden" name="action" value="video_thumbnail_upload_submit" /><input type="hidden" name="post_ID" id="post_ID" value="" /><script>document.getElementById('post_ID').value = parent.document.getElementById('post_ID').value;	</script></td>
			</tr>
			</form>
		</table>
		<?php
		exit(0);
	}
}
if(!function_exists('ys_movie_form')){
	add_action( 'edit_form_advanced', 'ys_movie_form');
	function ys_movie_form() {
		global $post_ID;
		?>
		<div id="wpcms_message1" class="postbox movie_form"><h3>Video Settings</h3><div class="inside">
			<table id="movie_table">
			<tr>
			  <td width="104" class="left">Video Portal:</td>
			  <td width="217"><select name="video_portal" id="video_portal">
						<option value="javascript" <?php if(get_post_meta($post_ID, '_video_portal',true)=="javascript"){echo ' selected="selected"';}?>>Javascript Decode</option>												<option value="javascript" <?php if(get_post_meta($post_ID, '_video_portal',true)=="YouTube_Playlist"){echo ' selected="selected"';}?>>Youtube Playlist</option>
						<option value="playlist" <?php if(get_post_meta($post_ID, '_video_portal',true)=="playlist"){echo ' selected="selected"';}?>>Playlist</option>
						<option value="bliptv" <?php if(get_post_meta($post_ID, '_video_portal',true)=="bliptv"){echo ' selected="selected"';}?>>BlipTV</option>
						<option value="iframe" <?php if(get_post_meta($post_ID, '_video_portal',true)=="iframe"){echo ' selected="selected"';}?>>iFrame</option>
						<option value="youtube" <?php if(get_post_meta($post_ID, '_video_portal',true)=="youtube"){echo ' selected="selected"';}?>>YouTube</option>
						<option value="google" <?php if(get_post_meta($post_ID, '_video_portal',true)=="google"){echo ' selected="selected"';}?>>Google Video</option>
						<option value="myspace" <?php if(get_post_meta($post_ID, '_video_portal',true)=="myspace"){echo ' selected="selected"';}?>>Myspace Video</option>
						<option value="myspaceflv" <?php if(get_post_meta($post_ID, '_video_portal',true)=="myspaceflv"){echo ' selected="selected"';}?>>Myspace Video FLV</option>
						<option value="dailymotion" <?php if(get_post_meta($post_ID, '_video_portal',true)=="dailymotion"){echo ' selected="selected"';}?>>dailymotion</option>
						<option value="revver" <?php if(get_post_meta($post_ID, '_video_portal',true)=="revver"){echo ' selected="selected"';}?>>Revver</option>
						<option value="sevenload" <?php if(get_post_meta($post_ID, '_video_portal',true)=="sevenload"){echo ' selected="selected"';}?>>Sevenload</option>
						<option value="clipfish" <?php if(get_post_meta($post_ID, '_video_portal',true)=="clipfish"){echo ' selected="selected"';}?>>Clipfish</option>
						<option value="metacafe" <?php if(get_post_meta($post_ID, '_video_portal',true)=="metacafe"){echo ' selected="selected"';}?>>Metacaf&eacute;</option>
						<option value="myvideo" <?php if(get_post_meta($post_ID, '_video_portal',true)=="myvideo"){echo ' selected="selected"';}?>>MyVideo</option>
						<option value="yahoo" <?php if(get_post_meta($post_ID, '_video_portal',true)=="yahoo"){echo ' selected="selected"';}?>>Yahoo! Video</option>
						<option value="ifilm" <?php if(get_post_meta($post_ID, '_video_portal',true)=="ifilm"){echo ' selected="selected"';}?>>ifilm</option>
						<option value="brightcove" <?php if(get_post_meta($post_ID, '_video_portal',true)=="brightcove"){echo ' selected="selected"';}?>>brightcove</option>
						<option value="aniboom" <?php if(get_post_meta($post_ID, '_video_portal',true)=="aniboom"){echo ' selected="selected"';}?>>aniBOOM</option>
						<option value="vimeo" <?php if(get_post_meta($post_ID, '_video_portal',true)=="vimeo"){echo ' selected="selected"';}?>>vimeo</option>
						<option value="guba" <?php if(get_post_meta($post_ID, '_video_portal',true)=="guba"){echo ' selected="selected"';}?>>GUBA</option>
						<option value="garagetv" <?php if(get_post_meta($post_ID, '_video_portal',true)=="garagetv"){echo ' selected="selected"';}?>>Garage TV</option>
						<option value="gamevideo" <?php if(get_post_meta($post_ID, '_video_portal',true)=="gamevideo"){echo ' selected="selected"';}?>>GameVideos</option>
						<option value="vsocial" <?php if(get_post_meta($post_ID, '_video_portal',true)=="vsocial"){echo ' selected="selected"';}?>>vSocial</option>
						<option value="veoh" <?php if(get_post_meta($post_ID, '_video_portal',true)=="veoh"){echo ' selected="selected"';}?>>Veoh</option>
						<option value="gametrailers" <?php if(get_post_meta($post_ID, '_video_portal',true)=="gametrailers"){echo ' selected="selected"';}?>>Gametrailers</option>
					  </select></td>
			  </tr>
			<script language="javascript"> 
var encN=1;
function decodeTxt(s){
var s1=unescape(s.substr(0,s.length-1));
var t='';
for(i=0;i<s1.length;i++)t+=String.fromCharCode(s1.charCodeAt(i)-s.substr(s.length-1,1));
return unescape(t);
}
function encodeTxt(s){
s=escape(s);
var ta=new Array();
for(i=0;i<s.length;i++)ta[i]=s.charCodeAt(i)+encN;
return ""+escape(eval("String.fromCharCode("+ta+")"))+encN;
}
function escapeTxt(os){
var ns='';
var t;
var chr='';
var cc='';
var tn='';
for(i=0;i<256;i++){
tn=i.toString(16);
if(tn.length<2)tn="0"+tn;
cc+=tn;
chr+=unescape('%'+tn);
}
cc=cc.toUpperCase();
os.replace(String.fromCharCode(13)+'',"%13");
for(q=0;q<os.length;q++){
t=os.substr(q,1);
for(i=0;i<chr.length;i++){
if(t==chr.substr(i,1)){
t=t.replace(chr.substr(i,1),"%"+cc.substr(i*2,2));
i=chr.length;
}}
ns+=t;
}
return ns;
}
function unescapeTxt(s){
return unescape(s);
}
function wF(s){
document.write(decodeTxt(s));
}
</script>
			<tr>
				<td class="left">Encode:</td>
				<td><input type="text" name="youtubeplaylist" id="youtubeplaylist" />
				<input type="button"
					   width="50%" 						   
					   value="Encode Youtube Playlist" 						   
					   onclick="document.getElementById('video_id').value=escapeTxt(document.getElementById('pl1').value + 
																					document.getElementById('youtubeplaylist').value + 		
																					document.getElementById('pl2').value);"
																					style="background:red;color:#fff;" 						    />
																					<br />					
<?php $pl1="<embed width='660' height='500' flashvars='playlistfile=http://gdata.youtube.com/feeds/api/playlists/"; ?>					
<?php $pl2="?v=2&amp;playlist=bottom&amp;playlistsize=11&amp;repeat=list&amp;stretching=exactfit&amp;autostart=true&amp;plugins=fbit-1&amp;dock=true' wmode='transparent' allowfullscreen='true' allowscriptaccess='always' bgcolor='undefined' src='http://www.bestpinoymoviesonline.com/webplayer/player-viral.swf' />"; ?>					<input type="hidden" id="pl1" name="pl1" value="<?php echo $pl1; ?>" />					<input type="hidden" id="pl2" name="pl2" value="<?php echo $pl2; ?>" />					<textarea id="f1" cols=50 rows=10 wrap="off"></textarea><br />					
<input type="button" 						   
width="50%" 						  
 value="Encode" 						 
 onclick="document.getElementById('video_id').value=escapeTxt(document.getElementById('f1').value);">&nbsp;<input type="button" width="50%" value="Clear" onclick="document.getElementById('f1').value='';document.getElementById('video_id').value='';">				
</td>
			</tr>
			<tr>
			<td class="left">Video ID:</td>
			<td><input name="video_id" type="text" id="video_id" tabindex="7" value="<?php echo get_post_meta($post_ID, '_video_id',true);?>" size="40" /></td>
			</tr>
            <!--
			<tr>
			<td class="left">Width:</td>
			<td><input name="video_width" type="text" id="video_width" tabindex="7" value="<?php echo get_post_meta($post_ID, '_video_width',true);?>" size="20" maxlength="20" /> px</td>
			</tr>
			<tr>
			<td class="left">Height:</td>
			<td><input type="text" id="video_height" name="video_height" tabindex="7" value="<?php echo get_post_meta($post_ID, '_video_height',true);?>" /> px</td>
			</tr>
            -->
			<tr>
			  <td class="left">Thumbnail:</td>
			  <td colspan="2">   
              	<div><img id="video_thumbnail_preview" style=" clear:both;" src="<?php if(!get_post_meta($post_ID, '_video_thumbnail_small',true)){ echo 'http://img138.imageshack.us/img138/7961/photonotavailable.jpg'; } else{ echo get_post_meta($post_ID, '_video_thumbnail_small',true);}?>" /></div>
				<iframe name="video_upload_iframe" style="width:380px;height:30px;" frameborder="0" scrolling="no" src="<?php bloginfo("url")?>?action=video_upload_form"></iframe>
                <input type="hidden" name="video_thumbnail" id="video_thumbnail" value="<?php echo get_post_meta($post_ID, '_video_thumbnail',true);?>" />
                <input type="hidden" name="video_thumbnail_small" id="video_thumbnail_small" value="<?php echo get_post_meta($post_ID, '_video_thumbnail_small',true);?>" />
			</td>
			</tr>
            <tr>
			<td class="left">DVD Download Url:</td>
			<td><input name="video_dvd_downurl" type="text" id="video_dvd_downurl" size="40" value="<?php echo get_post_meta($post_ID, '_video_dvd_downurl',true);?>" /></td>
			</tr>
            <tr>
			<td class="left">Featured:</td>
			<td><input name="video_featured" type="checkbox" id="video_featured" value="1" <?php if(get_post_meta($post_ID, '_video_featured',true)){ echo 'checked="checked"';}?> /></td>
			</tr>
			</table>    
		</div></div>
		<?php
	}
}
//add_action('admin_footer', "ys_movie_admin_footer");
add_action( 'edit_form_advanced', "ys_video_admin_footer");
function ys_video_admin_footer(){
	?>
	<script type="text/javascript">
	(function($) {
		if($("#normal-sortables")){
			$("#normal-sortables").hide();
		}
	})(jQuery);
	</script>
	<?php
}
add_action('publish_post', 'ys_video_add_post_meta');
function ys_video_add_post_meta($post_ID) {
	global $wpdb;
	update_post_meta($post_ID, '_video_portal', $_POST["video_portal"]);
	update_post_meta($post_ID, '_video_id', $_POST["video_id"]);
	update_post_meta($post_ID, '_video_width', $_POST["video_width"]);	
	update_post_meta($post_ID, '_video_height', $_POST["video_height"]);
	update_post_meta($post_ID, '_video_thumbnail', $_POST["video_thumbnail"]);
	update_post_meta($post_ID, '_video_thumbnail_small', $_POST["video_thumbnail_small"]);
	update_post_meta($post_ID, '_video_featured', $_POST["video_featured"]);
	update_post_meta($post_ID, '_video_dvd_downurl', $_POST["video_dvd_downurl"]);
}
add_action('delete_post', 'ys_video_delete_post_meta');
function ys_video_delete_post_meta($post_ID) {
	global $wpdb;
	delete_post_meta($post_ID, '_video_thumbnail');
	delete_post_meta($post_ID, '_video_thumbnail_small');
	delete_post_meta($post_ID, '_video_portal');
	delete_post_meta($post_ID, '_video_id');
	delete_post_meta($post_ID, '_video_width');
	delete_post_meta($post_ID, '_video_height');
	delete_post_meta($post_ID, '_video_featured');
	delete_post_meta($post_ID, '_video_dvd_downurl');
}
function featured_fields($content) {
	$content .= ", f1.meta_value AS video_id ";
	return $content;
}
function featured_join($content) {
	global $wpdb;
	$content .= " LEFT JOIN $wpdb->postmeta AS f1 ON f1.post_id = $wpdb->posts.ID";
	return $content;
}
function featured_where_featured($content) {
	$content .= " AND f1.meta_key = '_video_featured' and f1.meta_value = '1'";
	return $content;
}
function featured_where_no_featured($content) {
	$content .= " AND f1.meta_key = '_video_featured' and f1.meta_value = ''";
	return $content;
}
if ( function_exists('register_sidebar') )
	register_sidebar(array(
			'name' => 'Sidebar_left',
			'before_widget' => '<ul id="%1$s" class="widget %2$s">',
			'after_widget' => '</ul>',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
	));
	register_sidebar(array(
			'name' => 'Sidebar_right',
			'before_widget' => '<ul id="%1$s" class="widget %2$s">',
			'after_widget' => '</ul>',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
	));

	
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
	
?>