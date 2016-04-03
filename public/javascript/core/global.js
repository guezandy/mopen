/**
 * global.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([
      'unveil',
      'bootstrap',
      'bootstrapHoverDropdown'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('unveil'),
      require('bootstrap'),
      require('bootstrapHoverDropdown')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /**
   * CREATE GLOBAL VARIABLE
   */
  window.adminre = {
    eventPrefix: 'fa',
    isMinimize: false,
    isScreenlg: false,
    isScreenmd: false,
    isScreensm: false,
    isScreenxs: false,
    breakpoint: {
      'lg': 1200,
      'md': 992,
      'sm': 768,
      'xs': 480
    }
  };

  /**
   * VIEWPORT WATCHER
   */
  Response.action(function() {
    window.adminre.isScreenlg = Response.band(window.adminre.breakpoint.lg);
    window.adminre.isScreenmd = Response.band(window.adminre.breakpoint.md, window.adminre.breakpoint.lg - 1);
    window.adminre.isScreensm = Response.band(window.adminre.breakpoint.sm, window.adminre.breakpoint.md - 1);
    window.adminre.isScreenxs = Response.band(0, window.adminre.breakpoint.xs);

    if (window.adminre.isScreenlg) {
      $('html')
        .addClass('screen-lg')
        .removeClass('screen-md')
        .removeClass('screen-sm')
        .removeClass('screen-xs');
    }

    if (window.adminre.isScreenmd) {
      $('html')
        .removeClass('screen-lg')
        .addClass('screen-md')
        .removeClass('screen-sm')
        .removeClass('screen-xs');
    }

    if (window.adminre.isScreensm) {
      $('html')
        .removeClass('screen-lg')
        .removeClass('screen-md')
        .addClass('screen-sm')
        .removeClass('screen-xs');
    }

    if (window.adminre.isScreenxs) {
      $('html')
        .removeClass('screen-lg')
        .removeClass('screen-md')
        .removeClass('screen-sm')
        .addClass('screen-xs');
    }
  });

  /**
   * INIT VARIOUS PLUGINS ON DOM READY
   */
  (function() {
    /** unveil INIT */
    $('[data-toggle~=unveil]').unveil(200, function() {
      $(this).load(function() {
        $(this).addClass('unveiled');
      });
    });

    /** Bootstrap tooltip INIT */
    $('[data-toggle~=tooltip]').tooltip();

    /** Bootstrap popover INIT */
    $('[data-toggle~=popover]').popover();

    /** Bootstrap dropdown hover INIT */
    $('[data-toggle="dropdown"].dropdown-hover').dropdownHover().dropdown();

    /** IE9 input placeholder INIT */
    $('input, textarea').placeholder();
  })();

}));
