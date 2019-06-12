$(document).ready(function(){

$('.email').on('keyup', function() {
	var ttwo = $('.email').val();
	$('.email_help').val(ttwo);
});

});