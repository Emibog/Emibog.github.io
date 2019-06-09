$(document).ready(function(){
var one = 0;
var two = 0;
var three = 0;


$(".open1").click(function(e) {
 if (one == 0) {
	 $("#open1").attr("type", "text");
	 $(".open1").html("Скрыть пароль");
	 e.preventDefault();
	 one = 1;
 }else{
 	$("#open1").attr("type", "password");
 	$(".open1").html("Показать пароль");
	 e.preventDefault();
	 one = 0;
 }
});

$(".open2").click(function(e) {
 if (two == 0) {
	 $("#open2").attr("type", "text");
	 $(".open2").html("Скрыть пароль");
	 e.preventDefault();
	 two = 1;
 }else{
 	$("#open2").attr("type", "password");
 	$(".open2").html("Показать пароль");
	 e.preventDefault();
	 two = 0;
 }
 });

$(".open3").click(function(e) {
 if (three == 0) {
	 $("#open3").attr("type", "text");
	 $(".open3").html("Скрыть пароль");
	 e.preventDefault();
	 three = 1;
 }else{
 	$("#open3").attr("type", "password");
 	$(".open3").html("Показать пароль");
	 e.preventDefault();
	 three = 0;
 }
 });

$('.oldpass').on('keyup', function() {
	var tone = $('.oldpass').val();
 var lnone = tone.length;
 if (lnone <= 5) {
 	$(".one").text("Пароль должен быть длиннее 5 символов");
 }else {
 	$(".one").text("");
 }
});

$('.newpass').on('keyup', function() {
	var ttwo = $('.newpass').val();
 var lntwo = ttwo.length;
 if (lntwo <= 5) {
 	$(".two").text("Пароль должен быть длиннее 5 символов");

 }else {
 	if ($('.newpass').val() == $('.oldpass').val()) {
 		$(".same").text("Старый пароль совпадает с новым! Пожалуйста придумайте другой пароль.");
 	}else{
 		$(".same").text("");
 	}
 	$(".two").text("");
 }
});

$('.repeatpass').on('keyup', function() {
	var tthree = $('.repeatpass').val();
 var lnthree = tthree.length;
 if (lnthree <= 5) {
 	$(".three").text("Пароль должен быть длиннее 5 символов");
 }else {
 	if ($('.newpass').val() != $('.repeatpass').val()) {
		$(".ch").text("Пароль не совпадает с новым!");
 	}else{
 		$(".ch").text("");
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
