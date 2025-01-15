jQuery(document).ready(function(){
    
	jQuery('#menuToggle').on('click', function () {
		jQuery('#navbar').toggleClass('open');
		jQuery('#close_divs').toggleClass('open');
		jQuery('#menuToggle').toggleClass('open')
	});
    
	jQuery('#close_divs').on('click', function () {
		jQuery('#navbar').removeClass('open');
		jQuery(this).removeClass('open');
		jQuery('#menuToggle').removeClass('open')
	});
	jQuery('#navbar li a').on('click', function () {
		jQuery('#navbar').removeClass('open');
		jQuery('#menuToggle input').trigger('click')
	});

	jQuery('li.menu-item-has-children').append('<span id="submenu" class="mobilesubmenu"><i class="fa fa-plus"></i></span>');
    
    jQuery('.cat_sub-menu').on('click', function(){
        var t = jQuery(this);
         t.toggleClass('open');
         t.next('ul').slideToggle();
         t.parent().siblings().find('.cat_sub-menu').removeClass('open');
     });
    
	jQuery('.nav-bar li #submenu').on('click', function () {
		jQuery(this).parent().toggleClass('open');
		jQuery(this).parent().siblings().removeClass('open');
		jQuery(this).prev().toggleClass('open-submenu');
		jQuery(this).find('i').toggleClass('fa-plus fa-minus');
		jQuery(this).parent().siblings().find('#submenu').html('<i class="fa fa-plus"></i>')
	});
	
	// counter animation
	jQuery('.statcounts').one("mouseenter", function() {
        jQuery(".menu").toggleClass("active");
        jQuery('.statcounts span').each(function () {
        jQuery(this).prop('Counter',0).animate({
            Counter: jQuery(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    jQuery(this).text(Math.ceil(now));
                }
            });
        });
    });
    
    jQuery('#home_slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
      arrows: false,
      dots: true,
      fade: true,
    });
	 
//    jQuery('#hproducts_slide').slick({
//      slidesToShow: 3,
//      slidesToScroll: 1,
//      autoplay: true,
//      autoplaySpeed: 3000,
//      arrows: true,
//      dots: false,
//      responsive: [
//        {
//          breakpoint: 831,
//          settings: {
//            slidesToShow: 2,
//            slidesToScroll: 1,
//          }
//        },
//        {
//          breakpoint: 668,
//          settings: {
//            slidesToShow: 1,
//            slidesToScroll: 1,
//          }
//        }
//      ]
//    });
    
    jQuery('#makehappy_slide').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: true,
      dots: false
    });
    
//    jQuery('li.blog-button').on('click', function(){
//        jQuery('html, body').animate({
//        scrollTop: jQuery("#blog_sec").offset().top
//        }, 1000);
//    });
//    jQuery('li.contact-button').on('click', function(){
//        jQuery('html, body').animate({
//        scrollTop: jQuery("#footer_sec").offset().top
//        }, 1000);
//    });
});