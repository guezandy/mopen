/**
 * carousel.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([
      'owl-carousel'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('owl-carousel')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /** default */
  $('#default').owlCarousel();

  /** autoplay */
  $('#auto-play').owlCarousel({
    autoPlay: true
  });

  /** lazy load */
  $('#lazy-load').owlCarousel({
    items: 3,
    lazyLoad: true
  });

  /** one slide */
  $('#one-slide').owlCarousel({
    navigation: true,
    singleItem: true
  });

}));
