const categories = (select) => {
  if (select.value !== '#') {
    for (i = 0; i < select.options.length; i++) {
      var option = select.options[i];
      if (option.selected === true) {
        $('.card-category').html(option.text);
      }
    }
  } else {
    $('.card-category').html('Categoria');
  }
};
$(() => {
  $('#post-title').on('keyup', () => {
    var data = $('#post-title').val();
    if (data.length > 0) {
      $('.card-title').html(data);
    } else {
      $('.card-title').html('Título');
    }
  });
  $('#post-subtitle').on('keyup', () => {
    var data = $('#post-subtitle').val();
    if (data.length > 0) {
      if (data.length >= 120) {
        $('.card-subtitle').html(data.slice(0, 120) + '...');
      } else {
        $('.card-subtitle').html(data);
      }
    } else {
      $('.card-subtitle').html('subtítulo');
    }
  });
});
