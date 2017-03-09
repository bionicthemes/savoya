jQuery(function($){

	'use strict';

	var btnWide  = $('#wide');
	var btnBoxed = $('#boxed');

	btnWide.click(function(){
		$('.wrapper').removeClass('boxed');
		$('.wrapper').addClass('wide');
	});

	btnBoxed.click(function(){
		$('.wrapper').removeClass('wide');
		$('.wrapper').addClass('boxed');
	});

	var colorSwitch = $('#color-swither li');

	colorSwitch.each(function(){
		var code  = $(this).attr('data-color');
		$(this).click(function(){
			$('.wrapper').css({'color' : '#'+code});
		});
	});






});