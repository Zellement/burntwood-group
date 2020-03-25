jQuery(function ($) {
    $(document).ready(function() {

		$( '.swipebox' ).swipebox();
		
		// Adtrak Cookies

		$('body').adtrakCookies();

		// MMenu

		$("#mmenu").mmenu({
			"offCanvas": {
			"position": "right"
			}
		});

		// Back to top
		$("#back-top").hide();
		// fade in #back-top
		$(function () {
			$(window).scroll(function () {
				if ($(this).scrollTop() > 300) {
					$('#back-top').fadeIn();
				} else {
					$('#back-top').fadeOut();
				}
			});
		});
		$("#back-top").click(function() {
			$("html, body").animate({
			scrollTop: $("header").offset().top
			}, 750);
		});
        
    });
});

	