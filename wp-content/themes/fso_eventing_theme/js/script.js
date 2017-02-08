$(document).ready(function(){

	$('#menu-menu-1').addClass('nav navbar-nav');
	$('.fancybox-thumbs').fancybox({
			prevEffect : 'none',
			nextEffect : 'none',
			closeBtn  : true,
			arrows    : true,
			nextClick : true,
			helpers : {
					thumbs : {
							width  : 50,
							height : 50
					}
			}
		});

		$(window).on( 'resize', function () {
			  $('.img').height( $('.img').width() / 1.7 );
		}).resize();

});
