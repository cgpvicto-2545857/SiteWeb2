jQuery(document).ready(function ($) {
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 100) {
      $(".back-to-top a").fadeIn();
    } else {
      $(".back-to-top a").fadeOut();
    }
  });

  $(".back-to-top a").on("click", function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, 800);
  });

});


// banner
jQuery(document).ready(function ($) {
    if ($.fn.owlCarousel) {
        $('.service-sec .owl-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            rtl: false,
            autoplay: false,
            responsive: {
                0: {
                    items: 1 // Mobile
                },
                768: {
                    items: 2 // Tablet
                },
                1024: {
                    items: 3 // Small Desktop
                },
                1200: {
                    items: 4 // Large Desktop
                }
            }
        });
    } else {
        console.log('Owl Carousel not loaded');
    }
});