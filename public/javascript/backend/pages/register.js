/**
 * register.js
 *
 * Copyright 2016 pampersdry@gmail.com
 * License https://wrapbootstrap.com/help/licenses
 */
(function(factory) {

  'use strict';

  if (typeof define === 'function' && define.amd) {
    /** AMD. Register as an anonymous module. */
    define([
      'parsley'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('parsley')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /**
   * Register form function
   */
  var $form = $('form[name=form-register]');

  /** On button submit click */
  $form.on('click', 'button[type=submit]', function(e) {
    var $this = $(this);

    /** Run parsley validation */
    if ($form.parsley().validate()) {
      /** Disable submit button */
      $this.prop('disabled', true);

      /**
       * you can do the ajax request here
       * this is for demo purpose only
       */
      setTimeout(function() {
        /** done nprogress bar */
        NProgress.done();

        /** redirect user */
        location.href = 'page-login.html';
      }, 500);
    } else {
      /** toggle animation */
      $form
        .removeClass('animation animating shake')
        .addClass('animation animating shake')
        .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
          $(this).removeClass('animation animating shake');
        });
    }

    /** prevent default */
    e.preventDefault();
  });

}));
