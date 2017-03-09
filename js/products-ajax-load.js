jQuery(function($) {
	
	"use strict";

	//comming from wp_localize_script

	//wp_js_var.blog_pagination_type
	//wp_js_var.blog_layout	
	//wp_js_var.ajax_load_more_locale
	//wp_js_var.ajax_loading_locale
	//wp_js_var.ajax_no_more_items_locale

	var listing_class 		= ".blog-listing";
	var item_class 			= ".blog-listing article";
	var pagination_class 	= ".posts-navigation";
	var next_page_class 	= ".posts-navigation .nav-previous a";
	var ajax_button_class 	= ".posts_ajax_button";
	var ajax_loader_class 	= ".posts_ajax_loader";
	
	var ajax_load_items = {
	    
	    init: function() {

	        if (wp_js_var.blog_pagination_type == 'load_more_button' || wp_js_var.blog_pagination_type == 'infinite_scroll') {
	        
		        $(document).ready(function() {
		            
		            if ($(pagination_class).length) {
		                
		                $(pagination_class).before('<div class="'+ajax_button_class.replace('.', '')+'" data-processing="0">'+wp_js_var.ajax_load_more_locale+'</div>');
		                $(pagination_class).hide();

		            }		            		            

		        });
		        
		        $('body').on('click', ajax_button_class, function() {
		            
		            if ($(next_page_class).length) {
		                
		                $(ajax_button_class).attr('data-processing', 1).addClass('clicked'); // added class		                
		                
		                var href = $(next_page_class).attr('href');
		                
		                if( ! ajax_load_items.msieversion() ) {
							history.pushState(null, null, href);
						}

		                ajax_load_items.onstart();
		                
		                $(ajax_button_class).hide();		                
		                
		                $(pagination_class).before('<div class="'+ajax_loader_class.replace('.', '')+'">'+wp_js_var.ajax_loading_locale+'</div>');
		                
		                $.get(href, function(response) {
		                    
		                    $(pagination_class).html($(response).find(pagination_class).html());

		                    $(response).find(item_class).each(function() {

		                        if ( wp_js_var.blog_layout == "classic" ) {
		                        	
		                        	$(item_class+':last').after($(this));

		                        } else {

		                        	var grid = document.querySelector('#masonry_grid');
									var item = document.createElement('article');

									salvattore.appendElements(grid, [item]);
									item.outerHTML = $(this).prop('outerHTML');

		                        }		                        

		                    });

		                    $(ajax_loader_class).remove();               
		                    $(ajax_button_class).show();                    
		                    $(ajax_button_class).attr('data-processing', 0);
		                    
		                    ajax_load_items.onfinish();

		                    if ($(next_page_class).length == 0) {
		                        $(ajax_button_class).show().html(wp_js_var.ajax_no_more_items_locale).addClass('disabled').removeClass('scroll');
		                    }

		                });

		            } else {
		                		                
		                $(ajax_button_class).show().html(wp_js_var.ajax_no_more_items_locale).addClass('disabled').removeClass('scroll');

		            }

		        });

	        }
	        
	        if (wp_js_var.blog_pagination_type == 'infinite_scroll') {

		        var buffer_pixels = Math.abs(0);
		        
		        $(window).scroll(function() {
		           
		            if ($(listing_class).length) {
		                
		                var a = $(listing_class).offset().top + $(listing_class).outerHeight();
		                var b = a - $(window).scrollTop();

		                $(ajax_button_class).addClass('scroll'); // TEMP
		                
		                if ((b - buffer_pixels) < $(window).height()) {
		                    if ($(ajax_button_class).attr('data-processing') == 0) {

		                        $(ajax_button_class).trigger('click');
		                    }
		                }

		            }

		        });
	        }
	    },

	    onstart: function() {
	    },

	    onfinish: function() {
	    },

	    msieversion: function() {
	        var ua = window.navigator.userAgent;
	        var msie = ua.indexOf("MSIE ");

	        if (msie > 0)
	            return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));

	        return false;
	    },

	};

	ajax_load_items.init();
	//ajax_load_items.onfinish();

});