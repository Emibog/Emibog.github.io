$(document).ready(function(){
var one = 0;
var two = 0;
var three = 0;


$(".open1").click(function(e) {
 if (one == 0) {
	 $("#open1").attr("type", "text");
	 e.preventDefault();
	 one = 1;
 }else{
 	$("#open1").attr("type", "password");
	 e.preventDefault();
	 one = 0;
 }
});

$(".open2").click(function(e) {
 if (two == 0) {
	 $("#open2").attr("type", "text");
	 e.preventDefault();
	 two = 1;
 }else{
 	$("#open2").attr("type", "password");
	 e.preventDefault();
	 two = 0;
 }
 });

$(".open3").click(function(e) {
 if (three == 0) {
	 $("#open3").attr("type", "text");
	 e.preventDefault();
	 three = 1;
 }else{
 	$("#open3").attr("type", "password");
	 e.preventDefault();
	 three = 0;
 }
 });

$('.oldpass').on('keyup', function() {
	var tone = $('.oldpass').val();
	$('.oldpass_help').val($('.oldpass').val());
 var lnone = tone.length;
 if (lnone <= 5) {
 	$(".one").text("Пароль должен быть длиннее 5 символов");
 	$('.oldpass').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});

 }else {
 	$(".one").text("");
 	$('.oldpass').css({'boxShadow' : '0px 0px 5px green', 'border': 'solid 1px green'});
 }
});

$('.newpass').on('keyup', function() {
	var ttwo = $('.newpass').val();
	$('.newpass_help').val($('.newpass').val());
 var lntwo = ttwo.length;
 if (lntwo <= 5) {
 	$(".one").text("Пароль должен быть длиннее 5 символов");
 	$('.newpass').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});
 }else {
 	if ($('.newpass').val() == $('.oldpass').val()) {
 		$(".same").text("Старый пароль совпадает с новым!");
 		$('.newpass').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});
 	}else{
 		if ($('.newpass').val() != $('.repeatpass').val()) {
		$(".ch").text("Пароль не совпадает с новым!");
		$('.repeatpass').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});
 	}else{
 		$(".ch").text("");
 		$('.repeatpass').css({'boxShadow' : '0px 0px 5px green', 'border': 'solid 1px green'});
 	}
 		$(".same").text("");
 		$('.newpass').css({'boxShadow' : '0px 0px 5px green', 'border': 'solid 1px green'});
 	}
 	$(".one").text("");
 }
});

$('.repeatpass').on('keyup', function() {
	var tthree = $('.repeatpass').val();
	$('.repeatpass_help').val($('.repeatpass').val());
 var lnthree = tthree.length;
 if (lnthree <= 5) {
 	$(".three").text("Пароль должен быть длиннее 5 символов");
 	$('.repeatpass').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});
 }else {
 	if ($('.newpass').val() != $('.repeatpass').val()) {
		$(".ch").text("Пароль не совпадает с новым!");
		$('.repeatpass').css({'boxShadow' : '0px 0px 5px red', 'border': 'solid 1px red'});
 	}else{
 		$(".ch").text("");
 		$('.repeatpass').css({'boxShadow' : '0px 0px 5px green', 'border': 'solid 1px green'});
 	}
 	$(".three").text("");
 }
 });
 $(".change").click(function(e) {
 		if($('.oldpass').val().length > 5 && $('.newpass').val().length > 5 && $('.repeatpass').val().length > 5){
 			if ($('.newpass').val() != $('.oldpass').val()){
 				if ($('.newpass').val() == $('.repeatpass').val()) {
 					
 				
 				}else {
 					
 					e.preventDefault();
 				}
 			}else {
 				
 			e.preventDefault();
 			}
 		}else {
 			
 			e.preventDefault();
 		}
 		});
});
