/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./public/adm/js-helpers/sweetAlertHelper.js":
/*!***************************************************!*\
  !*** ./public/adm/js-helpers/sweetAlertHelper.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "callCenterInfoSweetAlert": () => (/* binding */ callCenterInfoSweetAlert),
/* harmony export */   "callCenterQuestionSweetAlert": () => (/* binding */ callCenterQuestionSweetAlert)
/* harmony export */ });
function callCenterInfoSweetAlert(title, type) {
  var text = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  Swal.fire({
    title: title,
    icon: type,
    text: text,
    position: 'center'
  });
}
function callCenterQuestionSweetAlert(title, text, confirmButtonText, cancelButtonText, callBackSuccess, callBackFalse) {
  Swal.fire({
    title: title,
    text: text,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: confirmButtonText,
    cancelButtonText: cancelButtonText
  }).then(function (result) {
    if (result.value) {
      if (callBackSuccess) {
        callBackSuccess();
      }
    } else {
      if (callBackSuccess) {
        callBackFalse();
      }
    }
  });
}

/***/ }),

/***/ "./public/adm/lang/admin.json":
/*!************************************!*\
  !*** ./public/adm/lang/admin.json ***!
  \************************************/
/***/ ((module) => {

module.exports = JSON.parse('{"ua":{"areYouSure":"Ви впевнені?","youWannaDeleteItem":"Ви збираєтесь видалити елемент","yesDelete":"Так, видалити!","cancelDelete":"Відмінити!"},"en":{"areYouSure":"Are you sure?","youWannaDeleteItem":"Are you want to delete element?","yesDelete":"Yes, delete!","cancelDelete":"Cancel!"}}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!************************************************!*\
  !*** ./resources/js/adm/programPhotos/main.js ***!
  \************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _adm_lang_admin_json__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../adm/lang/admin.json */ "./public/adm/lang/admin.json");

var sweetAlertHelper = __webpack_require__(/*! ../../../adm/js-helpers/sweetAlertHelper.js */ "./public/adm/js-helpers/sweetAlertHelper.js");
$(document).ready(function () {
  $('body').on('click', '.programPhotosShow', function () {
    fetchData();
  });
  $('body').on('click', '.paginationProgramImage li.page-item a.page-link', function (e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetchData(page);
  });
  $('body').on('click', '.downloadProgramPhoto', function () {
    window.open("".concat(language, "/admin-menu/program-photos/download/").concat($(this).attr('data-image')), '_blank');
  });
  $('body').on('click', '.copyPathProgramPhoto', function () {
    $(this).html("<div class=\"spinner-border text-white m-1\" style=\"width: 10px !important; height: 10px !important;\" role=\"status\">\n                                                <span class=\"sr-only\">...</span>\n                                            </div>");
    var imgUrl = $(this).attr('data-image');
    navigator.clipboard.writeText(imgUrl);
    var button = $(this);
    setTimeout(function () {
      button.html("<i class=\"mdi mdi-content-copy d-block\"></i>");
    }, 500);
  });
  $('body').on('click', '.deleteProgramPhoto', function () {
    var imageId = $(this).attr('data-image');
    sweetAlertHelper.callCenterQuestionSweetAlert(_adm_lang_admin_json__WEBPACK_IMPORTED_MODULE_0__[lang]['areYouSure'], '', _adm_lang_admin_json__WEBPACK_IMPORTED_MODULE_0__[lang]['yesDelete'], _adm_lang_admin_json__WEBPACK_IMPORTED_MODULE_0__[lang]['cancelDelete'], function () {
      $.ajax({
        type: 'DELETE',
        url: "".concat(language, "/admin-menu/api/program-photos/delete/").concat(imageId),
        headers: authHeaders
      }).then(function (result) {
        fetchData();
      });
    }, function () {});
  });
});
function fetchData() {
  var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
  $.ajax({
    type: 'GET',
    url: "".concat(language, "/admin-menu/api/program-photos/index?page=").concat(page),
    headers: authHeaders
  }).then(function (result) {
    $('.programPhotoContainer').html(result);
    if ($('#programPhotos').is(':visible') == false) {
      $('#programPhotos').modal('show');
    }
  });
}
})();

/******/ })()
;