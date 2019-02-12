var $check = 0;

if ($(window).width() >= 1280){

$(window).scroll(function() {
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
})

}
