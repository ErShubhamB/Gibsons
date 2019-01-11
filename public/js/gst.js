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

/***/ "./resources/js/gst.js":
/*!*****************************!*\
  !*** ./resources/js/gst.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.summernote').summernote({});
  $('.popover').hide();
  $('#change_avatar').on('click', function () {
    $('#avatar').trigger('click');
  });
  /*avatar change */

  $('#avatar').change(function () {
    //alert("uploading");
    $("#change_avatar").html('Uploding Image');
    $("#loader").removeClass('fadeOut');
    var file_data = $('#avatar').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    $.ajax({
      url: '/update-user-avatar',
      type: 'POST',
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(e) {
        //$('#p_small').attr('src','/images/'+e);
        $('#profile_img').attr('src', '/uploads/' + e);
      }
    }).done(function () {
      $("#change_avatar").html('Change Avatar');
      $("#loader").addClass('fadeOut');
    });
  });
  $(".change_pwd_btn").on('click', function () {
    $('.change_pwd_btn').hide();
    $(".pwd").removeClass('chng_pwd');
    $("#new_name").focus();
  });
  $('#claimform').on('submit', function () {
    if ($.trim($('#gstin').val()) == '' || $.trim($('#gst_attachment').val()) == '') {
      new PNotify({
        title: 'Whops!',
        text: 'Looks like some important fields are missing! Please make sure you fill all the fields.',
        type: 'warning'
      });
      return false;
    }

    $('#uploadBtn').attr('disabled', true);
    $('#uploadBtn').html('Please wait...');
    /**
    * ajax call to save data
    */

    var response;
    var file_data = $('#gst_attachment').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('claim_details', $('#claimDetails').val());
    form_data.append('gstin', $('#gstin').val());
    form_data.append('claimAmount', $('#claimAmount').val());
    $("#loader").removeClass('fadeOut');
    $.ajax({
      url: '/add-new-claim',
      type: 'POST',
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(resp) {
        response = resp;
        $("#loader").addClass('fadeOut');
      },
      error: function error(e) {
        new PNotify({
          title: 'Whops!',
          text: 'Something went wrong! Please try again.',
          type: 'error'
        });
        $("#loader").addClass('fadeOut');
        return false;
      }
    }).done(function () {
      response = JSON.parse(response);

      if (response[0].status == 200) {
        new PNotify({
          title: 'Great!',
          text: 'We have received your claim. Please check your email for details.',
          type: 'success'
        });
        $("#claimform").trigger('reset');
        $('.summernote').summernote('code', '');
      } else {
        new PNotify({
          title: 'Whops!',
          text: 'Something went wrong! Please try again.',
          type: 'error'
        });
      }

      $('#uploadBtn').attr('disabled', false);
      $('#uploadBtn').html('Claim');
      $("#loader").addClass('fadeOut');
    });
  });
});

/***/ }),

/***/ 1:
/*!***********************************!*\
  !*** multi ./resources/js/gst.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\shubham\works\job\GST_App\resources\js\gst.js */"./resources/js/gst.js");


/***/ })

/******/ });