/**
 * fileupload.js
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
   * Reset global drop and dragover
   */
  $(document).bind('drop dragover', function(e) {
    e.preventDefault();
  });

  /**
   * Define variables
   */
  var url = 'server/php/';
  var rowId = 0;
  var codeRowId = 0;
  var resRowId = 0;
  var assetRowId = 0;
  var imgId = 0;
  var uploadButton = $('<button/>')
    .addClass('btn btn-primary')
    .prop('disabled', true)
    .text('Processing...')
    .on('click', function() {
      var $this = $(this);
      var data = $this.data();

      $this
        .off('click')
        .text('Abort')
        .on('click', function() {
          $this.remove();
          data.abort();
        });
      data.submit().always(function() {
        $this.remove();
      });
    });

  /**
   * Init fileuploader
   */
  $('#basic-uploader input[type="file"]').fileupload({
    url: url,
    dataType: 'json',
    autoUpload: false,
    acceptFileTypes: /(\.|\/)(gif|jpe?g|png|java|xml)$/i, //TODO: fix acceptable file inputs
    maxFileSize: 5000000,
    dropZone: $('#basic-uploader .dropzone'),
    disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
    previewMaxWidth: 50,
    previewMaxHeight: 50,
    previewCrop: true
  }).on('fileuploadadd', function(e, data) {
    // $('#basic-uploader .upload-lists').children('tbody').append(
    //   '<tr class="upload-list-' + (rowId += 1) + '">' +
    //   '<td width="50"></td>' +
    //   '<td><strong>' + data.files[0].name + '</strong></td>' +
    //   '<td>' + data.files[0].type + '</td>' +
    //   '<td>' + (data.files[0].size * 1e-6) + 'MB</td>' +
    //   '<td class="text-right" width="80"></td>' +
    //   '</tr>'
    // );
    if(data.files[0].type === "text/xml") {
      $('#basic-uploader .upload-res').children('tbody').append(
        '<tr class="upload-res-' + (resRowId += 1) + '">' +
        '<td width="50"></td>' +
        '<td><strong>' + data.files[0].name + '</strong></td>' +
        '<td>' + data.files[0].type + '</td>' +
        '<td>' + (data.files[0].size * 1e-6) + 'MB</td>' +
        '<td class="text-right" width="80"></td>' +
        '</tr>'
      );
    } else if(data.files[0].name.indexOf('.java') > 0) {
      $('#basic-uploader .upload-code').children('tbody').append(
        '<tr class="upload-code-' + (codeRowId += 1) + '">' +
        '<td width="50"></td>' +
        '<td><strong>' + data.files[0].name + '</strong></td>' +
        '<td></td>' +
        '<td></td>' +
        '<td class="text-right" width="80"></td>' +
        '</tr>'
        );
    } else {
      $('#basic-uploader .upload-asset').children('tbody').append(
        '<tr class="upload-asset-' + (assetRowId += 1) + '">' +
        '<td width="50"></td>' +
        '<td><strong>' + data.files[0].name + '</strong></td>' +
        '<td>' + data.files[0].type + '</td>' +
        '<td>' + (data.files[0].size * 1e-6) + 'MB</td>' +
        '<td class="text-right" width="80"></td>' +
        '</tr>'
        );      
    }


    /** append the upload button */
    $('#basic-uploader .upload-lists').find('.upload-list-' + rowId + ' > td').eq(3).append(uploadButton.clone(true).data(data)[0]);
    $('#basic-uploader .upload-code').find('.upload-code-' + codeRowId + ' > td').eq(3).append(uploadButton.clone(true).data(data)[0]);
    $('#basic-uploader .upload-res').find('.upload-res-' + resRowId + ' > td').eq(3).append(uploadButton.clone(true).data(data)[0]);
    $('#basic-uploader .upload-asset').find('.upload-asset-' + assetRowId + ' > td').eq(3).append(uploadButton.clone(true).data(data)[0]);

  }).on('fileuploadprocessalways', function(e, data) {
    var index = data.index;
    var file = data.files[index];
    var $canvas = $(file.preview).addClass('img-circle pull-left');

    /** append the upload file */
    $('#basic-uploader .upload-lists').find('.upload-list-' + (imgId += 1) + ' > td').eq(0).append($canvas[0]);

    if (index + 1 === data.files.length) {
      $('#basic-uploader .upload-lists').find('.upload-list-' + rowId + ' > td > button').text('Upload').prop('disabled', !!data.files.error);
    }

  }).on('fileuploadprogressall', function(e, data) {
    var progress = parseInt(data.loaded / data.total * 100, 10);
    $('#basic-uploader .progress-bar').css('width', progress + '%');

  }).on('fileuploaddone', function(e, data) {
    $.each(data.result.files, function(index, file) {
      if (file.error) {
        $('#basic-uploader .alert').html('').addClass('alert-danger').append(file.error);
      }
    });

  }).on('fileuploadfail', function(e, data) {
    $.each(data.files, function() {
      $('#basic-uploader .alert').html('').addClass('alert-danger').html('File upload failed.');
    });

  }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

}));
