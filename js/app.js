const $ = require('jquery');
require('bootstrap/dist/js/bootstrap');

$(window).scroll(function() {
  if ($(window).scrollTop() >= 100) {
    $('.navbar').addClass('fixed-top');
  } else {
    $('.navbar').removeClass('fixed-top');
  }
});
$(function() {
  $('.navbar .trigger').bind('click', function(event) {
    event.preventDefault();
    var $anchor = $(this);
    console.log($anchor.attr('href'));
    $('html, body')
      .stop()
      .animate(
        {
          scrollTop: $($anchor.attr('href')).offset().top
        },
        1000
      );
    event.preventDefault();
  });
});
