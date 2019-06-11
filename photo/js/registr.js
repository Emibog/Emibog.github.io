$(document).ready(function(){
var one = 0;
var two = 0;
var three = 0;




$(".open2").click(function(e) {
 if (two == 0) {
	 $(".one").attr("type", "text");
	 e.preventDefault();
	 two = 1;
 }else{
 	$(".one").attr("type", "password");
	 e.preventDefault();
	 two = 0;
 }
 });

$(".open3").click(function(e) {
 if (three == 0) {
	 $(".repeatpass").attr("type", "text");
	 e.preventDefault();
	 three = 1;
 }else{
 	$(".repeatpass").attr("type", "password");
	 e.preventDefault();
	 three = 0;
 }
 });

$('.email').on('keyup', function() {
	var ttwo = $('.email').val();
	$('.email_help').val(ttwo);
});
$('.login').on('keyup', function() {
	var ttwo = $('.login').val();
	var lntwo = ttwo.length;
	$('.login_help').val(ttwo);
	
 if (lntwo <= 2) {
 	$(".same").text("Логин должен быть длиннее 2 символов.");
 	$('.login').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});

 }else {
 	$(".same").text("");
 	$('.login').css({'boxShadow' : '0px 0px 5px green', 'border': 'solid 1px green'});
 }
});
$('.one').on('keyup', function() {
	var ttwo = $('.one').val();
	$('.one_help').val(ttwo);
});
$('.repeatpass').on('keyup', function() {
	var ttwo = $('.repeatpass').val();
	$('.repeatpass_help').val(ttwo);
});
$('.enter_capcha').on('keyup', function() {
	var ttwo = $('.enter_capcha').val();
	$('.enter_capcha_help').val(ttwo);
});
$('.one').on('keyup', function() {
	var ttwo = $('.one').val();
 var lntwo = ttwo.length;
 if (lntwo <= 5) {
 	$(".two").text("Пароль должен быть длиннее 5 символов.");
 	$('.one').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});

 }else {
 	$(".two").text("");
 	$('.one').css({'boxShadow' : '0px 0px 5px green', 'border': 'solid 1px green'});
 }
});

$('.repeatpass').on('keyup', function() {
	var tthree = $('.repeatpass').val();
 var lnthree = tthree.length;
 if (lnthree <= 5) {
 	$(".two").text("Пароль должен быть длиннее 5 символов.");
 	$('.repeatpass').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});
 }else {

 	if ($('.one').val() != $('.repeatpass').val()) {
		$(".three").text("Пароль не совпадает с новым!");
		$('.repeatpass').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});
 	}else{
 		$(".three").text("");
 		$('.repeatpass').css({'boxShadow' : '0px 0px 5px green', 'border': 'solid 1px green'});
 	}
 	$(".two").text("");
 }
 });
 $(".but").click(function(e) {
 		if($('.one').val().length > 5 && $('.repeatpass').val().length > 5){
 	
 				if ($('.one').val() == $('.repeatpass').val()) {

 				
 				}else {
 					
 					e.preventDefault();
 				}
 		
 		}else {
 			
 			e.preventDefault();
 		}
 		});
});