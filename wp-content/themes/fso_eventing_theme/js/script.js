$(document).ready(function(){

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

		var postReveal = {
		  delay    : 500,
		  easing   : 'ease-in-out',
		  scale    : 1.1
		};

		var animationReveal = {
			delay    : 200,
		  distance : '90px',
		  easing   : 'ease-in-out',
		  rotate   : { z: 10 },
		  //scale    : 1.1
		};

		window.sr = ScrollReveal();
		sr.reveal('.post, .hero-post',  animationReveal);
		sr.reveal('.fso-animation', animationReveal);
		sr.reveal('.cff-item', animationReveal);



});
