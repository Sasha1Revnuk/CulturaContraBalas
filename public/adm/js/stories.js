/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./public/adm/js-helpers/dataHelper.js":
/*!*********************************************!*\
  !*** ./public/adm/js-helpers/dataHelper.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "deleteItem": () => (/* binding */ deleteItem),
/* harmony export */   "getDatatable": () => (/* binding */ getDatatable),
/* harmony export */   "rowReorder": () => (/* binding */ rowReorder)
/* harmony export */ });
function deleteItem(translates, url, redirectUrl) {
  var dataTableSelector = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '#models';
  Swal.fire({
    title: translates[lang]['areYouSure'],
    text: translates[lang]['youWannaDeleteItem'],
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: translates[lang]['yesDelete'],
    cancelButtonText: translates[lang]['cancelDelete']
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        type: 'DELETE',
        url: url,
        headers: authHeaders
      }).then(function () {
        if ($(dataTableSelector).length) {
          $('#models').DataTable().ajax.reload();
        } else {
          window.location.replace(redirectUrl);
        }
      });
    }
  });
}
function getDatatable(columns, url, data) {
  var sortable = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;
  var dataTableSelector = arguments.length > 4 && arguments[4] !== undefined ? arguments[4] : '#models';
  return $(dataTableSelector).DataTable({
    processing: true,
    autoWidth: false,
    serverSide: true,
    lengthMenu: [10, 25, 50, 100, 250, 500, 1000, 2000, 5000],
    searching: false,
    ordering: false,
    responsive: true,
    columns: columns,
    order: [[0, 'asc']],
    rowReorder: sortable ? {
      selector: 'tr td.order',
      update: false
    } : null,
    ajax: {
      url: url,
      type: "GET",
      headers: authHeaders,
      data: data
    }
  });
}
function rowReorder(blocks, url) {
  var dataTableSelector = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '#models';
  blocks.on('row-reorder', function (e, diff, edit) {
    var ids = [];
    var ranges = [];
    for (var i = 0, ien = diff.length; i < ien; i++) {
      var rowData = blocks.row(diff[i].node).data();
      ids.push(rowData[1]);
      ranges.push(rowData[0]);
    }
    $.ajax({
      type: 'POST',
      url: url,
      headers: authHeaders,
      data: {
        'ids': ids,
        'ranges': ranges
      }
    }).then(function () {
      $(dataTableSelector).DataTable().ajax.reload();
    });
  });
}

/***/ }),

/***/ "./public/adm/lang/admin.json":
/*!************************************!*\
  !*** ./public/adm/lang/admin.json ***!
  \************************************/
/***/ ((module) => {

module.exports = JSON.parse('{"ua":{"areYouSure":"Ви впевнені?","youWannaDeleteItem":"Ви збираєтесь видалити елемент","yesDelete":"Так, видалити!","cancelDelete":"Відмінити!"},"en":{"areYouSure":"Are you sure?","youWannaDeleteItem":"Are you want to delete element?","yesDelete":"Yes, delete!","cancelDelete":"Cancel!"},"es":{"areYouSure":"Son y el miércoles?","youWannaDeleteItem":"¿Quieres dividir el elemento?","yesDelete":"¡Sí, eliminar!","cancelDelete":"¡Cancelar!"}}');

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
/*!*************************************!*\
  !*** ./resources/js/adm/stories.js ***!
  \*************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _adm_lang_admin_json__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../adm/lang/admin.json */ "./public/adm/lang/admin.json");

var dataHelper = __webpack_require__(/*! ../../../adm/js-helpers/dataHelper.js */ "./public/adm/js-helpers/dataHelper.js");
$(document).ready(function () {
  if ($('#models').length) {
    var columns = [{
      name: "sort",
      width: "1%",
      className: "table-text-align-center",
      visible: false
    }, {
      name: "id",
      className: "table-text-align-center",
      width: "5%"
    }, {
      name: "sorting",
      className: "table-text-align-center order",
      width: "5%"
    }, {
      name: "name"
    }, {
      name: "text"
    }, {
      name: "actions",
      className: "table-text-align-center",
      width: "10%"
    }];
    var url = "".concat(language, "/admin-menu/api/stories");
    var data = {};
    var blocks = dataHelper.getDatatable(columns, url, data, true);
    dataHelper.rowReorder(blocks, "".concat(language, "/admin-menu/api/stories/sorting"));
  }
  $('body').on('click', '.delete', function (e) {
    e.preventDefault();
    dataHelper.deleteItem(_adm_lang_admin_json__WEBPACK_IMPORTED_MODULE_0__, "".concat(language, "/admin-menu/api/stories/delete/").concat($(this).attr('data-model')), null);
  });
});
})();

/******/ })()
;