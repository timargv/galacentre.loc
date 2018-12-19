
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// require('typeahead/typeahead.js');
require('ekko-lightbox/dist/ekko-lightbox.min.js');

$(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})