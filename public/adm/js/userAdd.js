/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/adm/userAdd.js ***!
  \*************************************/
$(document).ready(function () {
  $(".input-mask").inputmask();
  $('.roleInput').change(function () {
    if ($(this).is(':checked')) {
      $(".".concat($(this).val().replace(' ', ''))).prop('checked', true);
    } else {
      $(".".concat($(this).val().replace(' ', ''))).prop('checked', false);
    }
  });
});
/******/ })()
;