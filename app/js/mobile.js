$(function() {

	$('.answer').on('swiperight', function() {
		$(this).find('.label').addClass('animated bounceOutRight')
				.on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
					$(this).removeClass('animated bounceOutRight').hide();
				});
	});
	
	$('.answer').on('swipeleft', function() {
		$(this).find('.label').addClass('animated bounceOutLeft')
				.on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
					$(this).removeClass('animated bounceOutLeft').hide(); 
				});
	});
});