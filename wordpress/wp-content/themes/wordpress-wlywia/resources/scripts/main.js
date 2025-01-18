/**
 * External Dependencies
 */
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

$(() => {
  $('.hamburger').click(function () {
    $(this).not('.is-static').toggleClass('is-active')
    if ($(this).parents('.navbar').length) {
      $('.navbar').toggleClass('is-active')
      $('body').toggleClass('navbar-active')
      $(this).attr('aria-expanded', function (index, attr) {
        return attr === 'true' ? false : true
      })
    }
  })

  /**
   * Uncomment this block if using offcanvas
   */
  const navOffcanvas = document.getElementById('primary-navigation')
  navOffcanvas.addEventListener('hidden.bs.offcanvas', function () {
    $('.navbar').toggleClass('is-active')
    $('body').toggleClass('navbar-active')
    $('.hamburger:not(.is-static)').toggleClass('is-active')
    $('.hamburger').attr('aria-expanded', function (index, attr) {
      return attr === 'true' ? false : true
    })
  })
});
