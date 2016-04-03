/**
 * timeline-v1.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([
      'magnific',
      'stellar'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('magnific'),
      require('stellar')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /**
   * Magnific Popup
   */
  $('#photo-list').magnificPopup({
    delegate: '.magnific',
    type: 'image',
    gallery: {
      enabled: true
    }
  });

  /**
   * Stellar
   */
  $.stellar({
    horizontalScrolling: false
  });

}));
