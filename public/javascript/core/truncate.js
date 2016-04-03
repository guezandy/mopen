/**
 * truncate.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory();
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /**
   * Create the defaults
   * @default
   */
  var Name = {
    KEBAB_CASE: 'truncate',
    CAMEL_CASE: 'Truncate'
  };

  var VERSION = '1.0.0';

  var Defaults = {
    height: null
  };

  var Toggle = {
    DATA_TOGGLE: '[data-toggle~="' + Name.KEBAB_CASE + '"]',
    DATA_OPTIONS: Name.KEBAB_CASE.replace(/-/g, '') + '-options'
  };

  var Helper = {
    TRUNCATE_CLASS: '.' + Name.KEBAB_CASE + '-js',
    TRUNCATED_CLASS: '.' + Name.KEBAB_CASE + 'd-js'
  };


  /**
   * The constructor
   * @param {Object} element
   * @param {Object} options
   */
  function Truncate(element, options) {
    this.element    = element;
    this.options    = $.extend({}, Defaults, options);

    this._name      = Name.KEBAB_CASE;
    this._version   = VERSION;
    this._defaults  = Defaults;

    this._init();
  }


  /**
   * Debounce
   * @private
   */
  function debounce(func, wait, immediate) {
    var timeout;

    return function() {
      var context = this;
      var args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) {
          func.apply(context, args);
        }
      };
      var callNow = immediate && !timeout;

      clearTimeout(timeout);
      timeout = setTimeout(later, wait);

      if (callNow) {
        func.apply(context, args);
      }
    };
  }


  /**
   * Apply truncate
   * @private
   * @param {Object} element
   */
  function applyTruncate(element) {
    $(element)
      .data(Name.KEBAB_CASE + '-isTruncate', true)
      .children()
      .removeClass(Helper.TRUNCATE_CLASS.slice(1))
      .addClass(Helper.TRUNCATED_CLASS.slice(1));
  }


  /**
   * Clear truncate
   * @private
   * @param {Object} element
   */
  function clearTruncate(element) {
    $(element)
      .data(Name.KEBAB_CASE + '-isTruncate', false)
      .children()
      .removeClass(Helper.TRUNCATED_CLASS.slice(1))
      .addClass(Helper.TRUNCATE_CLASS.slice(1));
  }


  /**
   * Calculate truncate inner height
   * @private
   * @param {Object} element
   */
  function innerHeight(element) {
    var elementHeight;
    var $hiddenElement = $(element).parents().filter(function() {
      return $(this).css('display') === 'none';
    });

    $hiddenElement.each(function() {
      this.style.display = 'block';
      this.style.visibility = 'hidden';
    });

    elementHeight = $(element).height();

    $hiddenElement.each(function() {
      this.style.display = '';
      this.style.visibility = '';
    });

    return elementHeight;
  }


  /**
   * Avoid prototype conflicts
   * @lends Truncate.prototype
   */
  $.extend(Truncate.prototype, {
    /**
     * Init function
     * @constructs
     */
    _init: function() {
      var element = this.element;
      var innerElement = $(element).wrapInner('<span class="' + Helper.TRUNCATE_CLASS.slice(1) + '"></span>').children()[0];

      if ($(element).height() < innerHeight(innerElement)) {
        applyTruncate(element);
      } else {
        clearTruncate(element);
      }

      $(window).resize(debounce(function() {
        if ($(element).height() < innerHeight(innerElement)) {
          applyTruncate(element);
        } else {
          clearTruncate(element);
        }
      }, 50));
    }
  });


  /**
   * Truncate plug-in wrapper
   * @param {Object} options
   * @todo
   */


  /**
   * Truncate data-api
   */
  $(Toggle.DATA_TOGGLE).each(function(index, element) {
    var options = $.extend({}, Defaults, $(element).data(Toggle.DATA_OPTIONS));
    new Truncate(element, options);
  });

}));
