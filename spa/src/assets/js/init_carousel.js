export function initSliderCarousel() {
    var owl = document.getElementsByClassName('.carousel-fade-transition');
    console.log(owl);
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
export function initBlogCarousel() {
    var owl = document.getElementsByClassName('.carousel-default');
    owl.owlCarousel({
        nav: true,
        dots: true,
        items: 1,
        loop: true,
        navText: ["&#xf007", "&#xf006"],
        autoplay: true,
        autoplayTimeout: 4000
    });
}