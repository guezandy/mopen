/**
 * scrollbar.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([
      'slimScroll'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('slimScroll')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /**
   * CREATE DEFAULTS ONCE
   */
  $('.no-touch .slimscroll').each(function(index, value) {
    $(value).slimScroll({
      size: '8px',
      height: false,
      distance: '0px',
      wrapperClass: $(value).data('wrapper') || 'viewport',
      railClass: 'scrollrail',
      barClass: 'scrollbar',
      wheelStep: 10,
      railVisible: false
    });
  });

}));
