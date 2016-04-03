/**
 * home-v2.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([
      'owl-carousel',
      'layerslider'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('owl-carousel'),
      require('layerslider')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /**
   * Carousel
   */
  $('#customer-reviews').owlCarousel({
    singleItem: true,
    autoPlay: true,
    autoHeight: true
  });

  /**
   * Stellar
   */
  $.stellar({
    horizontalScrolling: false
  });

}));
