var $check = 0;

if ($(window).width() >= 1280){
$(window).scroll(function() {
	if($(window).scrollTop() > 0){
	if($check == 0){
		$('nav').css('background-color', 'black');
		$('nav').animate({
				height: '+=20',
				opacity: '-=0.15'
			}, 300);
		$('ul.ul_nav').animate({
				marginTop: '+=10',
				marginLeft: '-=37%'
			}, 300);
		$('a.home').css('color', 'white');
		$('a.my_work').css('color', 'white');
		$('a.contact').css('color', 'white');
		$check=1;
	}
}else {
	$('nav').css('background-color', 'white');
	$('nav').animate({
			height: '-=20',
			opacity: '+=0.15'
		}, 300);
	$('ul.ul_nav').animate({
			marginTop: '-=10',
			marginLeft: '+=37%'
		}, 300);
		$('a.home').css('color', 'black');
		$('a.my_work').css('color', 'black');
		$('a.contact').css('color', 'black');
		$check = 0
}
})

}
