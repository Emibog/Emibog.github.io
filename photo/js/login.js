$(document).ready(function(){
	var one = 0;
	
	$(".open1").click(function(e) {
 if (one == 0) {
	 $("#open1").attr("type", "text");
	 /*$(".open1").html("Скрыть пароль");*/
	 e.preventDefault();
	 one = 1;
 }else{
 	$("#open1").attr("type", "password");
 	/*$(".open1").html("Показать пароль");*/
	 e.preventDefault();
	 one = 0;
 }
});
	var i = 0;
var y = 0;
	$('.password').on('keyup', function() {
	var tone = $('.password').val();
	$('.password_help').val(tone);
 var lnone = tone.length;
 if (lnone <= 5) {
 	
 	if (i == 0) {
 	$(".one").text($('.one').text() + "Пароль должен быть длиннее 5 символов");
 	$('.password').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});
 	i = 1;
 }
 }else {
 	$(".one").text("");
 	$('.password').css({'boxShadow' : '0px 0px 5px green', 'border': 'solid 1px green'});
 	i = 0;
 }
});
	$('.login').on('keyup', function() {
	var tone = $('.login').val();
 var lnone = tone.length;
 $('.login_help').val(tone);
 var lnone = tone.length;
 if (lnone <= 2) {
 	
 	if (y == 0) {
 	$(".two").text($('.two').text() +"Логин должен быть длиннее 2 символов");
 	$('.login').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});
 	y = 1;
 }
 }else {
 	$(".two").text("");
 	$('.login').css({'boxShadow' : '0px 0px 5px green', 'border': 'solid 1px green'});
 	y = 0;
 }
});

	$(".but").click(function(e) {
		if ($('.password').val().length > 5 && $('.login').val().length > 2) {
		}
		else {
			e.preventDefault();
		}
	});
	
});