/**
 * dashboard.js
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
      'jquery.flot',
      'jquery.flot.resize',
      'jquery.flot.categories',
      'jquery.flot.time',
      'jquery.flot.tooltip',
      'jquery.flot.spline'
    ], factory);
  } else if (typeof exports === 'object') {
    /** Node/CommonJS */
    module.exports = factory(
      require('selectize'),
      require('jquery.flot'),
      require('jquery.flot.resize'),
      require('jquery.flot.categories'),
      require('jquery.flot.time'),
      require('jquery.flot.tooltip'),
      require('jquery.flot.spline')
    );
  } else {
    /** Browser globals */
    factory();
  }
}(function() {

  'use strict';

  /**
   * Selectize
   */
  $('#selectize-customselect').selectize();

  /**
   * Sparkline
   */
  $('.sparklines').sparkline('html', {
    enableTagOptions: true
  });

  /**
   * Area Chart - Spline
   */
  $.plot('#chart-audience', [{
    'label': 'You',
    'color': '#83b81a',
    'data': [
      ['Jan', 7574],
      ['Feb', 6085],
      ['Mar', 9775],
      ['Apr', 6739],
      ['May', 9002],
      ['Jun', 8525],
      ['Jul', 7555],
      ['Aug', 9137],
      ['Sep', 7799],
      ['Oct', 9966]
    ]
  }, {
    'label': 'Others',
    'color': '#55acee',
    'data': [
      ['Jan', 8190],
      ['Feb', 5469],
      ['Mar', 7844],
      ['Apr', 5848],
      ['May', 6380],
      ['Jun', 5508],
      ['Jul', 8915],
      ['Aug', 7775],
      ['Sep', 8177],
      ['Oct', 6817]
    ]
  }], {
    series: {
      lines: {
        show: false
      },
      splines: {
        show: true,
        tension: 0.5,
        lineWidth: 5,
        fill: 0.2
      },
      points: {
        show: true,
        radius: 5
      }
    },
    grid: {
      borderWidth: 0,
      hoverable: true
    },
    tooltip: true,
    tooltipOpts: {
      content: '%y'
    },
    xaxis: {
      tickColor: 'rgba(0,0,0,0.05)',
      mode: 'categories'
    },
    yaxis: {
      tickColor: 'transparent',
      tickFormatter: function(v) {
        return '$' + v;
      }
    },
    shadowSize: 5
  });

}));
