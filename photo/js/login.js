$(document).ready(function(){
	var one = 0;
	
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
	$('.oldpass').on('keyup', function() {
	var tone = $('.oldpass').val();
 var lnone = tone.length;
 if (lnone <= 5) {
 	$(".one").text("Пароль должен быть длиннее 5 символов");
 }else {
 	$(".one").text("");
 }
});
	$(".but").click(function(e) {
		if ($('.oldpass').val().length > 5) {
		}
		else {
			e.preventDefault();
		}
	});
});