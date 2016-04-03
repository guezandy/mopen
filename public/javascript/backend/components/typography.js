/**
 * typography.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([
      'prettify'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('prettify')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /**
   * Prettify
   */
  prettyPrint();

}));
