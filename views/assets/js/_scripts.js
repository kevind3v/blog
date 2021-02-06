function loading() {
  $('#loading').fadeOut(1000);
}
$(function () {
  AOS.init();
  $(window).on('scroll', function () {
    if ($(window).scrollTop() < $('.header').height()) {
      $('.header').removeClass('sticky');
    } else {
      $('.header').addClass('sticky');
    }
  });
});
