/**
 * validation.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([
      'selectize',
      'parsley'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('selectize'),
      require('parsley')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /** Custom select */
  $('select').selectize();

}));
