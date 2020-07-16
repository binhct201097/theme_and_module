define([
    'jquery',
    'Carousel_Test/js/owlcarousel/owl.carousel.min'
], function($) {
    'use strict';
    $('.abc').owlCarousel({
        items: 4,
        loop: true,
        nav: true
    });
});