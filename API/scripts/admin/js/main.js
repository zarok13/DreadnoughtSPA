/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/admin/js/main.js":
/*!************************************!*\
  !*** ./resources/admin/js/main.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _createForOfIteratorHelper(o) { if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (o = _unsupportedIterableToArray(o))) { var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var it, normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

$(document).ready(function () {
  /* Ajax setup */
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); //error by status

  var statusErrorMap = {
    400: "Server understood the request, but request content was invalid.",
    401: "Unauthorized access.",
    403: "Forbidden resource can't be accessed.",
    413: 'Files size too large then 8MB',
    500: "Internal server error.",
    503: "Service unavailable."
  }; // Page type & template //

  $('body').on('change', '#page_type_id', function () {
    var page_type = $('#page_type_id :selected').val();
    var ajax_url = $('#page_type_id').data('url');
    var mainWrapper = 'div.wrapper';
    var imageLoader = '#image-loader';
    $.ajax({
      type: 'POST',
      url: ajax_url,
      dataType: 'json',
      data: {
        page_type: page_type
      },
      beforeSend: function beforeSend() {
        $(mainWrapper).fadeTo("fast", 0.2);
        $(mainWrapper).css('pointer-events', 'none');
        $(imageLoader).show();
      },
      success: function success(result) {
        if (result.status === 'ok') {
          console.log(result.response);
          $('#page_template_id').html(result.response);
        } else {
          console.log(result.message);
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.message,
            footer: 'Dreadnought Project'
          });
        }
      },
      error: function error(_error) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: _error,
          footer: 'Dreadnought Project'
        });
      },
      complete: function complete() {
        $(mainWrapper).fadeTo("fast", 1);
        $(mainWrapper).css('pointer-events', '');
        $(imageLoader).hide();
      }
    });
  }); // helper field types

  $('body').on('change', '#type', function () {
    var getType = $('#type');
    var url = getType.data('url');
    var id = getType.data('id');
    var type = $('#type :selected').val();
    var mainWrapper = 'div.wrapper';
    var imageLoader = '#image-loader';
    $.ajax({
      type: 'POST',
      url: url,
      dataType: 'json',
      data: {
        id: id,
        type: type
      },
      beforeSend: function beforeSend() {
        $(mainWrapper).fadeTo("fast", 0.2);
        $(mainWrapper).css('pointer-events', 'none');
        $(imageLoader).show();
      },
      success: function success(result) {
        if (result.status === 'ok') {
          console.log(result.response);
          $('#type_template').html(result.response);
        } else {
          console.log(result.message);
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.message,
            footer: 'Dreadnought Project'
          });
        }
      },
      error: function error(_error2) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: _error2,
          footer: 'Dreadnought Project'
        });
      },
      complete: function complete() {
        $(mainWrapper).fadeTo("fast", 1);
        $(mainWrapper).css('pointer-events', '');
        $(imageLoader).hide();

        if (type === '3') {
          tinymce.init({
            selector: 'textarea.editor',
            theme: 'silver',
            height: 400,
            plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help code',
            toolbar: 'insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | pagebreak | removeformat | template | code',
            templates: [{
              title: 'image',
              description: '',
              content: '[image src="image.jpg" top_title="About" title="სათაური" desc="მინი აღწერა"][/image]'
            }, {
              title: 'text',
              description: '',
              content: '[text]content[/text]'
            }]
          });
        } else {
          if (typeof tinymce !== 'undefined') {
            tinymce.remove();
          }
        }

        if (type === '4') {
          check();
        }
      }
    });
  }); // manual sort

  function JQueryUISort() {
    $("#sortable").sortable({
      axis: "y",
      update: function update(event, ui) {
        var data = $(this);
        var url = data.data('url');
        var i = 1;
        $(".ui-state-default > td > span").each(function () {
          $(this).html(i);
          i++;
        });
        $.ajax({
          url: url,
          type: 'POST',
          dataType: "json",
          data: {
            sortList: data.sortable("toArray")
          },
          success: function success(response) {
            if (response.status === "ok") {
              console.log(data.sortable("toArray"));
              toastr["success"]("<b>Dreadnought Project</b><br/>New sorting order has been successfully saved.");
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response.message,
                footer: 'Dreadnought Project'
              });
            }
          },
          error: function error(_error3) {
            if (typeof _error3.responseJSON != "undefined") {
              _error3 = _error3.responseJSON;
            }

            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: _error3,
              footer: 'Dreadnought Project'
            });
          }
        });
      }
    }); // manual sort's visual effects

    $("tr.ui-state-default").mousedown(function () {
      $(this).mousemove(function () {
        var target = "#" + this.id;
        $(target + " div.hideOnMove").attr("hidden", true);
      });
    }).mouseup(function () {
      $(this).unbind('mousemove');
      $("div.hideOnMove").attr("hidden", false);
    });
  }

  $(this).disableSelection();
  JQueryUISort(); //file store multiple file upload

  $("#dreadnought-file-store").on("change", function (e) {
    e.preventDefault();
    var url = $(this).data('url');
    var form = $(this)[0];
    var data = new FormData(form);
    data.append("multipleAttach", $("div.uploaded_files").hasClass('multiple_attach'));
    var resetFileUploader = 'input[name = "files[]"]';
    var dragAndDropContainer = '.drag-and-drop-container';
    var dragAndDroptitle = '.drag-and-drop-title';
    var imageLoader = '#file-uploading-loader';
    $.ajax({
      url: url,
      type: 'POST',
      enctype: 'multipart/form-data',
      processData: false,
      contentType: false,
      dataType: 'json',
      cache: false,
      data: data,
      timeout: 600000,
      beforeSend: function beforeSend() {
        $(dragAndDroptitle).fadeTo("fast", 0);
        $(dragAndDropContainer).css('pointer-events', 'none');
        $(imageLoader).show();
      },
      success: function success(result) {
        if (result.status === "ok") {
          $('.uploaded_files').html(result.response);
          $(resetFileUploader).val('');
          toastr["success"]("<b>Dreadnought Project</b><br/>File(s) has/have been successfully uploaded.");
        } else {
          $(resetFileUploader).val('');
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.message,
            footer: 'Dreadnought Project'
          });
        }
      },
      error: function error(_error4) {
        $(resetFileUploader).val('');
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: _error4,
          footer: 'Dreadnought Project'
        });
      },
      complete: function complete() {
        $(dragAndDroptitle).fadeTo("slow", 1);
        $(dragAndDropContainer).css('pointer-events', '');
        $(imageLoader).hide();
      }
    });
  }); // delete files from file store

  $('.uploaded_files').on('click', 'a.delete', function (e) {
    e.preventDefault();
    var url = $(this).data('url');
    var smallWindow = this.classList.contains('small_window');
    var mainWrapper = 'div.wrapper';
    var imageLoader = '#image-loader';
    $.ajax({
      url: url,
      type: 'DELETE',
      dataType: 'json',
      data: {
        smallWindow: smallWindow
      },
      beforeSend: function beforeSend() {
        $(mainWrapper).fadeTo("fast", 0.2);
        $(mainWrapper).css('pointer-events', 'none');
        $(imageLoader).show();
      },
      success: function success(result) {
        if (result.status === "ok") {
          $('.uploaded_files').html(result.response);
          toastr["success"]("<b>Dreadnought Project</b><br/>File has been successfully removed.");
        } else {
          $(resetFileUploader).val('');
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.message,
            footer: 'Dreadnought Project'
          });
        }
      },
      error: function error(_error5) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: _error5,
          footer: 'Dreadnought Project'
        });
      },
      complete: function complete() {
        $(mainWrapper).fadeTo("fast", 1);
        $(mainWrapper).css('pointer-events', '');
        $(imageLoader).hide();
      }
    });
  });
  var fileStoreWindow = window; //file attach with new small window

  $('.card-body').on('click', 'a.attach', function (e) {
    e.preventDefault();
    var url = $(this).attr("href");
    var width = $(this).data("width");
    var height = $(this).data("height");

    if (typeof width === 'undefined') {
      width = '950';
    }

    if (typeof height === 'undefined') {
      height = '500';
    }

    fileStoreWindow = window.open(url, 'File Store', 'left=20,top=20,width=' + width + ',height=' + height + ',toolbar=0,resizable=0,scrollbars=yes');
  }); // add particular file

  $('body').on('click', 'embed.choose', function (e) {
    e.preventDefault();
    var url = $(this).data('url');
    var path = $(this).attr('title');
    var inputName = $('input.text_upload', opener.document).attr('name');
    $.ajax({
      url: url,
      type: 'POST',
      dataType: "json",
      data: {
        path: path,
        inputName: inputName
      },
      success: function success(result) {
        if (result.status === "ok") {
          $('.attached_file_name', opener.document).html(result.response);
          $('a.upload_file_icons.view', opener.document).show();
          $('a.upload_file_icons.clear', opener.document).show();
          $('a.upload_file_icons.attach', opener.document).hide();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.message,
            footer: 'Dreadnought Project'
          });
        }
      },
      error: function error(_error6) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: _error6,
          footer: 'Dreadnought Project'
        });
      },
      complete: function complete() {
        if (fileStoreWindow) {
          fileStoreWindow.close();
        }
      }
    });
  }); // select multiple file

  $("body").on("click", "embed.multiple_attach", function () {
    if (!$(this).hasClass("selected_reference")) {
      $(this).addClass("selected_reference");
    } else {
      $(this).removeClass("selected_reference");
    }
  }); // add files to file references

  $("body").on("click", "a#apply_references", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    var fileReferences = [];
    var selectedReferences = $("embed.selected_reference");

    var _iterator = _createForOfIteratorHelper(selectedReferences),
        _step;

    try {
      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        var i = _step.value;
        fileReferences.push($(i).attr("id"));
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }

    var referenceID = url.split("/")[8];
    var referenceType = url.split("/")[7];
    $.ajax({
      url: url,
      type: "POST",
      dataType: "json",
      data: {
        fileReferences: fileReferences,
        reference_id: referenceID,
        reference_type: referenceType
      },
      success: function success(result) {
        if (result.status === "ok") {
          $(".uploaded_files", opener.document).html(result.response);

          if (fileStoreWindow) {
            fileStoreWindow.close();
          }
        } else {
          Swal.fire({
            icon: result.status == "warning" ? "warning" : "error",
            title: result.status == "warning" ? "Warning" : "Oops...",
            text: result.message,
            footer: "Dreadnought Project"
          });
        }
      },
      error: function error(_error7) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: _error7,
          footer: "Dreadnought Project"
        });
      }
    });
  }); // unset files from file references

  $(".uploaded_files").on("click", "a.unset", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    var fileID = $(this).closest("ul").parent().find("embed").attr("id");
    var referenceID = url.split("/")[8];
    var referenceType = url.split("/")[7];
    var mainWrapper = "div.wrapper";
    var imageLoader = "#image-loader";
    $.ajax({
      url: url,
      type: "DELETE",
      dataType: "json",
      data: {
        file_id: fileID,
        reference_id: referenceID,
        reference_type: referenceType
      },
      beforeSend: function beforeSend() {
        $(mainWrapper).fadeTo("fast", 0.2);
        $(mainWrapper).css("pointer-events", "none");
        $(imageLoader).show();
      },
      success: function success(result) {
        if (result.status === "ok") {
          $(".uploaded_files").html(result.response);
          toastr["success"]("<b>Dreadnought Project</b><br/>File has been successfully removed.");
        } else {
          $(resetFileUploader).val("");
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: result.message,
            footer: "Dreadnought Project"
          });
        }
      },
      error: function error(_error8) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: _error8,
          footer: "Dreadnought Project"
        });
      },
      complete: function complete() {
        $(mainWrapper).fadeTo("fast", 1);
        $(mainWrapper).css("pointer-events", "");
        $(imageLoader).hide();
      }
    });
  }); // Roles tree view

  $.fn.extend({
    rolesTree: function rolesTree() {
      $(this).addClass("tree");
      $(this).find('li').has("ul").each(function () {
        var branch = $(this);
        branch.find('.role_trigger').on('click', function (e) {
          $(this).find('.indicator').toggleClass('fa-plus fa-minus');
          $(this).siblings('ul').slideToggle();
        });
      });
    }
  });
  $('#tree1').rolesTree(); // role permission's checkboxes

  $("body").on("change", "input[type='checkbox'].special", function () {
    var name = $(this).attr('id');

    if ($(this).is(':checked')) {
      console.log('checked');
      $("input[name='" + name + "']").val(1);
    } else {
      console.log('not checked');
      $("input[name='" + name + "']").val(0);
    }
  }); // role select all permission checkbox

  $("body").on("change", "input[type='checkbox'].special_all", function () {
    var targetUl = $(this).parent().parent().parent();

    if ($(this).is(':checked')) {
      targetUl.find('input[type="checkbox"]').prop('checked', true);
      targetUl.find('input[type="hidden"]').val(1);
    } else {
      targetUl.find('input[type="checkbox"]').prop('checked', false);
      targetUl.find('input[type="hidden"]').val(0);
    }
  }); // 'attach_file' form

  function check() {
    // check input field on first load
    if ($('.text_upload').val() !== '') {
      $('a.upload_file_icons.view').show();
      $('a.upload_file_icons.clear').show();
    } else {
      $('a.upload_file_icons.attach').show();
    }
  }

  check();
  $('body').on('click', 'a.upload_file_icons.clear', function () {
    // toogle view clear vs attach when text input is empty
    $(this).hide();
    var viewLink = $('a.upload_file_icons.view');
    var defaultHref = viewLink.attr('title');
    viewLink.attr('href', defaultHref);
    viewLink.hide();
    $('input[type="text"].text_upload').val('');
    $('a.upload_file_icons.attach').show();
  });
  $('body').on('click', 'a.upload_file_icons.view', function () {
    // append to view link file name from text input
    var viewLink = $(this);
    var originalHref = viewLink.attr('href');

    if (originalHref.slice(-1) === '/') {
      // if the view's link don't has a file name
      originalHref = originalHref.slice(0, -1);
      var value = $('input[type="text"].text_upload').val();
      $(viewLink).attr('href', originalHref + value);
    }
  }); // MapBox
  // get marker form

  $('body').on('click', '.get_marker_form', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var mainWrapper = 'div.wrapper';
    var imageLoader = '#image-loader';
    $.ajax({
      type: 'GET',
      url: url,
      dataType: 'json',
      data: {},
      beforeSend: function beforeSend() {
        $(mainWrapper).fadeTo("fast", 0.2);
        $(mainWrapper).css('pointer-events', 'none');
        $(imageLoader).show();
      },
      success: function success(result) {
        if (result.status == 'ok') {
          console.log(result.response);
          $(".modal-content").html(result.response);
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.message,
            footer: 'Dreadnought Project'
          });
        }
      },
      error: function error(_error9) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: _error9,
          footer: 'Dreadnought Project'
        });
      },
      complete: function complete() {
        $(mainWrapper).fadeTo("fast", 1);
        $(mainWrapper).css('pointer-events', '');
        $(imageLoader).hide();
      }
    });
  }); // Markers Create/Update

  $('body').on('click', '#marker_form', function (e) {
    e.preventDefault();
    var url = $(this).data('url');
    var action = $(this).attr('title');
    var title = $('#title').val();
    var desc = $('#desc').val();
    var mainWrapper = 'div.wrapper';
    var imageLoader = '#image-loader';
    $.ajax({
      type: 'POST',
      url: url,
      dataType: 'json',
      data: {
        title: title,
        desc: desc
      },
      beforeSend: function beforeSend() {
        $('.marker_modal').modal('toggle');
        $(mainWrapper).fadeTo("fast", 0.2);
        $(mainWrapper).css('pointer-events', 'none');
        $(imageLoader).show();
      },
      success: function success(result) {
        if (result.status === 'ok') {
          console.log(result.response);

          if (action === 'Edit') {
            $("#markers_wrapper").html(result.response);
          } else {
            $("#markers_wrapper").html(result.response);
            $("#map_wrapper").html(result.response2);
          }
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.message,
            footer: 'Dreadnought Project'
          });
        }
      },
      error: function error(_error10) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: _error10,
          footer: 'Dreadnought Project'
        });
      },
      complete: function complete() {
        $(mainWrapper).fadeTo("fast", 1);
        $(mainWrapper).css('pointer-events', '');
        $(imageLoader).hide();
        JQueryUISort();
      }
    });
  }); // Markers Delete

  $('body').on('click', '.delete_marker', function (e) {
    e.preventDefault();
    var url = $(this).data('url');
    var mainWrapper = 'div.wrapper';
    var imageLoader = '#image-loader';
    $.ajax({
      type: 'DELETE',
      url: url,
      dataType: 'json',
      data: {},
      beforeSend: function beforeSend() {
        $(mainWrapper).fadeTo("fast", 0.2);
        $(mainWrapper).css('pointer-events', 'none');
        $(imageLoader).show();
      },
      success: function success(result) {
        if (result.status == 'ok') {
          console.log(result.response);
          $("#markers_wrapper").html(result.response);
          $("#map_wrapper").html(result.response2);
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.message,
            footer: 'Dreadnought Project'
          });
        }
      },
      error: function error(_error11) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: _error11,
          footer: 'Dreadnought Project'
        });
      },
      complete: function complete() {
        $(mainWrapper).fadeTo("fast", 1);
        $(mainWrapper).css('pointer-events', '');
        $(imageLoader).hide();
        JQueryUISort();
      }
    });
  }); // save data coordinates

  $('body').on('click', '#save_data_coordinates', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var template_type = $("#template_type option:selected").val();
    var myForm = document.getElementById('data_coordinates');
    var formData = new FormData(myForm);
    console.log(myForm);
    formData.append('template_type', template_type);
    $.ajax({
      type: 'POST',
      url: url,
      dataType: 'json',
      data: formData,
      processData: false,
      contentType: false,
      success: function success(result) {
        if (result.status === 'ok') {
          toastr["success"]("<b>Dreadnought Project</b><br/>New data coordinates have been successfully saved.");
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: result.message,
            footer: 'Dreadnought Project'
          });
        }
      },
      error: function error(_error12) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: _error12,
          footer: 'Dreadnought Project'
        });
      }
    });
  }); //Deletion confirm

  $('body').on('click', '.delete_an_item', function (e) {
    e.preventDefault();
    var id = $(this).attr('id').split('_');
    $('div.modal-body > p').html('Are you sure to remove this item ' + id.slice(0, -1).join('_') + '.');
    var modalHrefArray = $('div.modal #deletion_confirm').attr('href').split('/');
    modalHrefArray[modalHrefArray.length - 1] = id[id.length - 1];
    modalHrefArray = modalHrefArray.join('/');
    $('div.modal #deletion_confirm').attr('href', modalHrefArray);
  });
});

/***/ }),

/***/ 1:
/*!******************************************!*\
  !*** multi ./resources/admin/js/main.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/independent/dreadnoughtSPA/API/resources/admin/js/main.js */"./resources/admin/js/main.js");


/***/ })

/******/ });