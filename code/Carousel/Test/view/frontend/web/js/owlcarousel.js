define([
    'jquery',
    'Carousel_Test/js/owlcarousel/owl.carousel.min'
], function($) {
    'use strict';
    var $owl = $('.owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        nav: true
    });
    $owl.trigger('refresh.owl.carousel');
});