var jQuery = require("jquery");
export function owlCarousel() {
    jQuery(document).ready(function ($) {
        function initOwlCarousel() {
            var owl = $('.carousel-default');
            owl.owlCarousel({
                nav: true,
                dots: true,
                items: 1,
                loop: true,
                navText: ["&#xf007", "&#xf006"],
                autoplay: true,
                autoplayTimeout: 4000
            });
            owl = $('.carousel-fade-transition');
            owl.owlCarousel({
                nav: true,
                dots: true,
                items: 1,
                loop: true,
                navText: ["&#xf007", "&#xf006"],
                autoplay: true,
                animateOut: 'fadeOut',
                autoplayTimeout: 4000
            });
        }
        initOwlCarousel();
    });
}