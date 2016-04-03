/**
 * sortable.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([
      'jquery-ui'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('jquery-ui')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /**
   * Sortable list
   */
  $('#sortable-list').sortable();
  $('#sortable-list').disableSelection();

  /**
   * Sortable grid
   */
  $('#sortable-panel').sortable({
    connectWith: '.panel',
    items: '.panel',
    opacity: 0.8,
    coneHelperSize: true,
    placeholder: 'ui-sortable-placeholder',
    forcePlaceholderSize: true,
    tolerance: 'pointer',
    helper: 'clone',
    cancel: '.panel-sortable-empty',
    revert: 250,
    update: function(b, c) {
      if (c.item.prev().hasClass('panel-sortable-empty')) {
        c.item.prev().before(c.item);
      }
    }
  });

}));
