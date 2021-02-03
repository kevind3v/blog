function loading() {
  $('#loading').fadeOut(1000);
}
$(function () {
  $(window).on('scroll', function () {
    if ($(window).scrollTop() < $('.header').height()) {
      $('.header').removeClass('sticky');
    } else {
      $('.header').addClass('sticky');
    }
  });
});
