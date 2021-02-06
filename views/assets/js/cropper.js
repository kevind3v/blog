$(() => {
  var modal = $('#modal');
  var image = document.getElementById('image_upload');
  var cropper;
  $('#upload_image').on('change', (event) => {
    var files = event.target.files;

    var done = (url) => {
      image.src = url;
      modal.modal({ backdrop: 'static', keyboard: false });
    };

    if (files && files.length > 0) {
      reader = new FileReader();
      reader.onload = (event) => {
        done(reader.result);
      };
      reader.readAsDataURL(files[0]);
    }
  });
  modal
    .on('shown.bs.modal', () => {
      cropper = new Cropper(image, {
        aspectRatio: 4 / 3,
        viewMode: 3,
        preview: '.preview',
      });
    })
    .on('hidden.bs.modal', () => {
      cropper.destroy();
      cropper = null;
    });
  $('#crop').on('click', () => {
    canvas = cropper.getCroppedCanvas({
      minWidth: 300,
      minHeight: 210,
      imageSmoothingQuality: 'high',
    });
    canvas.toBlob((b) => {
      url = URL.createObjectURL(b);
      var reader = new FileReader();
      reader.readAsDataURL(b);
      reader.onloadend = () => {
        var base64 = reader.result;
        $('#preview-img').attr('src', base64);
        $('#image-form').attr('value', base64);
        modal.modal('hide');
      };
    });
  });
});
