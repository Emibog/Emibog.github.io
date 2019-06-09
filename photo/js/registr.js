$(document).ready(function(){
var one = 0;
var two = 0;
var three = 0;




$(".open2").click(function(e) {
 if (two == 0) {
	 $(".one").attr("type", "text");
	 $(".open2").html("Скрыть пароль");
	 e.preventDefault();
	 two = 1;
 }else{
 	$(".one").attr("type", "password");
 	$(".open2").html("Показать пароль");
	 e.preventDefault();
	 two = 0;
 }
 });

$(".open3").click(function(e) {
 if (three == 0) {
	 $(".repeatpass").attr("type", "text");
	 $(".open3").html("Скрыть пароль");
	 e.preventDefault();
	 three = 1;
 }else{
 	$(".repeatpass").attr("type", "password");
 	$(".open3").html("Показать пароль");
	 e.preventDefault();
	 three = 0;
 }
 });


$('.one').on('keyup', function() {
	var ttwo = $('.one').val();
 var lntwo = ttwo.length;
 if (lntwo <= 5) {
 	$(".two").text("Пароль должен быть длиннее 5 символов.");

 }else {
 	$(".two").text("");
 }
});

$('.repeatpass').on('keyup', function() {
	var tthree = $('.repeatpass').val();
 var lnthree = tthree.length;
 if (lnthree <= 5) {
 	$(".three").text("Пароль должен быть длиннее 5 символов.");
 }else {
 	if ($('.one').val() != $('.repeatpass').val()) {
		$(".ch").text("Пароль не совпадает с новым!");
 	}else{
 		$(".ch").text("");
 	}
 	$(".three").text("");
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
	/*if ($('.one').val() != $('.two').val()) {
		$(".ch").text("Пароль не совпадает с новым!");
 	}else{
 		$(".ch").text("");
 	}*/