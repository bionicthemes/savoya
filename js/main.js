jQuery(function($) {

	'use strict';

	var searchIconDestop	= $('.header-tools .search-icon > span.icon-search'),
	    searchIconMobile 	= $('.header-icons-mobile li.search-icon > a'),
		headerSearch 		= $('.header-search'),
		closeBtn 			= $('.header-tools .search-icon > span.icon-close');



	// open search 	
	$(document).on('click', '.icon-search', function() {
		$(this).attr('class', 'icon-close');
		$('.page-wrapper').addClass('moveAtSearch');
		headerSearch.addClass('active');
		setTimeout(function() {
			$(".header-search.active input[type='search']").focus();
		},1500);
	});

	// close search
	$(document).on('click', '.icon-close', function() {
		$('.page-wrapper').removeClass('moveAtSearch');
		$(this).attr('class', 'icon-search');
		headerSearch.removeClass('active');
	});


	searchIconMobile.on('click', function(e) {
		e.preventDefault();
		headerSearch.addClass('active');
		setTimeout(function() {
			$(".header-search.active input[type='search']").focus();
		},501);
	});


	$(document).mouseup(function (e) {
		e.preventDefault();
		var headerSearch       = $('.header-search');
		var offcanvasRight      = $(".offcanvas-right");
		var offcanvasMinicart  = $('.offcanvas-minicart');

		if (offcanvasRight.hasClass('active'))
        {
		    if (!offcanvasRight.is(e.target) // if the target of the click isn't the quickCart...
		        && offcanvasRight.has(e.target).length === 0) // ... nor a descendant of the quickCart
		    {
	        	offcanvasRight.removeClass('active');
		    }
		}

		// if (headerSearch.hasClass('active'))
  //       {
		//     if (!headerSearch.is(e.target) // if the target of the click isn't the quickCart...
		//         && headerSearch.has(e.target).length === 0) // ... nor a descendant of the quickCart
		//     {
	 //        	headerSearch.removeClass('active');
		//     }
		// }

		if (offcanvasMinicart.hasClass('active'))
        {
		    if (!offcanvasMinicart.is(e.target) // if the target of the click isn't the quickCart...
		        && offcanvasMinicart.has(e.target).length === 0) // ... nor a descendant of the quickCart
		    {
	        	offcanvasMinicart.removeClass('active');
		    }
		}
	});


	$('.offcanvas-icon-open').click(function(e) {
		e.preventDefault();
		if (!$('.offcanvas-right').hasClass('active')) {
			$('.offcanvas-right').addClass('active');
		} else {
			$('.offcanvas-right').removeClass('active');
		}
	});

	$('.offcanvas_close').on('click', function(e){
		e.preventDefault();
		if (!$('.offcanvas-right').hasClass('active')) {
			$('.offcanvas-right').addClass('active');
		} else {
			$('.offcanvas-right').removeClass('active');
		}
	});

	$('#minicartOpen').click(function(e) {
		e.preventDefault();
		if (!$('.offcanvas-minicart').hasClass('active')) {
			$('.offcanvas-minicart').addClass('active');
		} else {
			$('.offcanvas-minicart').removeClass('active');
		}
	});

	$('#minicartClose').on('click', function(e){
		e.preventDefault();
		if (!$('.offcanvas-minicart').hasClass('active')) {
			$('.offcanvas-minicart').addClass('active');
		} else {
			$('.offcanvas-minicart').removeClass('active');
		}
	});





    // Sticky Header

 var $document = $(document),
    $element = $('.site-header'),
    className = 'active';

	$document.scroll(function() {
		if ( $element.hasClass('header-sticky') ) {
			$element.toggleClass(className, $document.scrollTop() > 45);
		}
		// var siteHeader     = $('.site-header.sticky');
		// var mainNavWrapper = $('.main-navigation');
		// var mainNavMenu = $('.main-navigation > ul.menu');

		// mainNavWrapper.height(siteHeader.height() + 2 ); 
		// mainNavMenu.css('line-height', siteHeader.css('line-height')); 
		
	});


		$('.offcanvas-navigation').mmenu({
			offCanvas: false,
			navbar: {
				title: 'Menu'
			},
		});


      // Slider

      	 // $('.slider-container').slick({});


      	 $('.slider-container')
		    .on('init', function(slick) {
		        $('.slider-container').css({
		        	'overflow' : 'visible', 'width' : 'auto'
		        });
		    })
		    .slick({
		        fade: true,
		        focusOnSelect: true,
		        lazyLoad: 'ondemand',
		        speed: 3000,
		        autoplay: true,
		        autoplaySpeed: 3000
	  		});
	      

     


      // map

      $('.maps').click(function () {
		    $('.maps iframe').css("pointer-events", "auto");
	  });

	  $('.gallery').find('img').attr('data-lightbox', 'test');



	  $('.gallery').find('a').each(function(i, v) {

	  		$(this).attr('rel', 'lightbox');
	  });


	   

	  $('li.cta .free-quote').click(function() {

	  	$('.freequote-overlay').addClass('active');

	  });



	  $('.button.upload-form').click(function() {

	  	$('.upload-overlay').addClass('active');

	  });


	   $('.btn-close-upload').click(function() {

	  		if (   $('.upload-overlay').hasClass('active')  )
	  		{
	  			$('.upload-overlay').removeClass('active');
	  		}
	  });



	  $('.custom-form-close-btn-1').click(function() {

	  		if (   $('.freequote-overlay').hasClass('active')  )
	  		{
	  			$('.freequote-overlay').removeClass('active');
	  		}
	  });



	  $(document).on('click', '.freequote-overlay', function(e) {

	  	if (  $(this).is(e.target) ) {
	  		$(this).removeClass('active');
	  	}

	  });

	  $(document).on('click', '.upload-overlay', function(e) {

	  	if (  $(this).is(e.target) ) {
	  		$(this).removeClass('active');
	  	}

	  });




});



