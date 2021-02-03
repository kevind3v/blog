$(function () {
  $(document).on('submit', "form:not('.ajax_off')", function (e) {
    e.preventDefault();
    var form = $(this);
    var load = $('#loading');
    var flashClass = 'ajax_response';
    var flash = $('.' + flashClass);

    form.ajaxSubmit({
      url: form.attr('action'),
      type: 'POST',
      dataType: 'json',
      beforeSend: function () {
        load.show();
      },
      success: function (response) {
        //redirect
        if (response.redirect) {
          window.location.href = response.redirect;
        }

        //message
        if (response.error) {
          flash.html(response.message).fadeIn(100).effect('bounce', 300);
        } else {
          flash.fadeOut(100);
          Swal.fire({
            icon: 'success',
            title: 'Aee!!',
            text: response.message,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          });
        }
      },
      complete: function () {
        load.hide();
        if (form.data('reset') === true) {
          form.trigger('reset');
        }
      },
    });
  });
});
