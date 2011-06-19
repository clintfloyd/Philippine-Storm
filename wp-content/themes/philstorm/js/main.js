function getDate(){
	var m_names = new Array("January", "February", "March",
	"April", "May", "June", "July", "August", "September",
	"October", "November", "December");

	var d = new Date();
	var curr_date = d.getDate();
	var curr_month = d.getMonth();
	var curr_year = d.getFullYear();
	return (m_names[curr_month] + curr_date + ", "  + curr_year);
}
$(document).ready(function(){

	var txtValtmp = $("#s").val();

	if(txtValtmp != ""){
		$("#searchtxtoverlay").fadeOut();
	}else{
		$("#searchtxtoverlay").fadeIn();
	}

	$("#searchtxtoverlay").click(function(){
		$("#s").focus();
	});
	$("#s").keypress(function(){
		var txtValtmp2 = $("#s").val();
		$("#searchtxtoverlay").fadeOut();
	});
	
	$("#s").blur(function(){
		var txtVal = $("#s").val();
		if(txtVal == ""){
			$("#searchtxtoverlay").fadeIn();
		}
	});

	$("#todayis").html("Today is " + getDate());
	$.ajax({
	  url: "/weatherapi.php?location=Manila-Philippines&view=today&type=header",
	  context: document.body,
	  success: function(data) {
	  $('#weatherlocationdiv').html("");
		$('#weatherlocationdiv').html(data);
	  }
	});
	
	$.ajax({
	  url: "/weatherapi.php?location=Manila-Philippines&view=all&type=sidebar",
	  context: document.body,
	  success: function(data2) {
	  $('#weatherforecastsidebar').html("");
		$('#weatherforecastsidebar').html(data2);
	  }
	});
});


var theInt = null;
var $crosslink, $navthumb;
var curclicked = 0;

theInterval = function(cur){
	clearInterval(theInt);
	
	if( typeof cur != 'undefined' )
		curclicked = cur;
	
	$crosslink.removeClass("active-thumb");
	$navthumb.eq(curclicked).parent().addClass("active-thumb");
		$(".stripNav ul li a").eq(curclicked).trigger('click');
	
	theInt = setInterval(function(){
		$crosslink.removeClass("active-thumb");
		$navthumb.eq(curclicked).parent().addClass("active-thumb");
		$(".stripNav ul li a").eq(curclicked).trigger('click');
		curclicked++;
		if( 6 == curclicked )
			curclicked = 0;
		
	}, 3000);
};

$(function(){
	
	$("#main-photo-slider").codaSlider();
	
	$navthumb = $(".nav-thumb");
	$crosslink = $(".cross-link");
	
	$navthumb
	.click(function() {
		var $this = $(this);
		theInterval($this.parent().attr('href').slice(1) - 1);
		return false;
	});
	
	theInterval();
});
