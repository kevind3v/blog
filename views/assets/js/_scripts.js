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
  tinymce.init({
    selector: '#content',
    menubar: false,
    language: 'pt_BR',
    resize: false,
    plugins: [
      'advlist autolink lists charmap print hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'table emoticons template paste help',
    ],
    toolbar:
      'undo redo | code | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | print | forecolor backcolor emoticons | help ',
  });
});
