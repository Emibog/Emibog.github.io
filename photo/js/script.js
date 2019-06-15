$(document).ready(function(){

$(".dell").click(function() {
 var v = $(this).attr("id");
 $('input.for_id').val(v);
 });

var i = 'photo';
var wd = $(".content").css('width');
		var hg = $(".content").css('height');
$(".my_albums").click(function() {
	if ( i == 'photo') {
		
		$(".my_albums").css({'background-color': '#f2f3f2'});
		$(".my_photo").css({'background-color': '#ffffff'});
		wd = wd.slice(0, -2);
		hg = hg.slice(0, -2);
		$(".content").attr("style","overflow:hidden; width: 0px; height: 0px");

	  $(".albums").css("height", "100%");
   var h = $(".albums").height();
   $(".albums").css("height", "0px");
   $(".albums").attr("style","overflow:visible; width: 100%; height: "+h+"px");

	  i = 'albums';

	}else {
		
	}
 });

$(".my_photo").click(function() {
	if ( i == 'albums') {
	wd = wd.slice(0, -2);
		hg = hg.slice(0, -2);
		$(".albums").attr("style","overflow:hidden; width: 0px; height: 0px;");

		
		$(".content").attr("style","overflow:visible width: 100% height:"+hg+"px");
		$(".my_photo").css({'background-color': '#f2f3f2'});
		$(".my_albums").css({'background-color': '#ffffff'});
		
	  
	  i = 'photo';
	}else {
		
	}
 });

});