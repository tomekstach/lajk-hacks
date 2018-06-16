jQuery(document).ready(function($) {
	$('.button-cat-desc').click(function(){
		$('.cont-cat').hide('fast');
		$('.cont-cat-desc').show('fast');
	});
	$('.button-cat-exit').click(function(){
		$('.cont-cat-desc').hide('fast');
		$('.cont-cat').show('fast');
	});
});