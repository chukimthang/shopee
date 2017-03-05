function shop() {
  var current = this;
  var dataImage;

  this.init = function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

    $('#upload-shop').on('click', function () {
      if (typeof $('#photo-shop')[0].files[0] !== 'undefined') {
        current.uploadFile($('#photo-shop')[0].files[0]);
      } else {
        alert('File field is empty');
      }
    });
    
    current.add();
  };

  this.uploadFile = function (file) {
    var formData = new FormData();
    $('#upload-shop').prop('disabled', true);
    $('#process-shop').show();
    formData.append('upload', file);

    current.currentUpload = $.ajax({
      url: ' /user/shop/uploadImage',
      type: 'post', 
      dataType: 'json',
      complete: function (data) {
        $('#upload-shop').prop('disabled', false);
        $('#process-shop').hide();
        switch (data.status) {
          case 200:
            dataImage = data.responseJSON.url;
            $('#display-shop').html('');
            $('#display-shop').append("<img src='" + dataImage 
              + "' alt='' width='100px' height='100px'>");
            break;
          case 500: 
            alert('Unknown error: ' + data.status);
            break;
          default :
            alert(data.responseJSON.message);
        }
      },
      data: formData,
      cache: false,
      contentType: false,
      processData: false
    });
  };

  this.add = function() {
    $('.form-group').on('click', '.btn-primary', function () {
      $.ajax({
        url: '/user/shop/addAjax',
        type: 'POST',
        dataType: 'json',
        data: {
          name: $('#name').val(),
          address: $('#address').val(),
          description: $('#description').val(),
          category_id: $('#category_id').val(),
          image: dataImage
        },
        success: function(data) {
          alert(data.sms);
        },
        error: function(data) {
          var errors = '';
          for(datos in data.responseJSON){
            errors += data.responseJSON[datos] + '<br>';
          }
          $('.form-error').show().html(errors);
        }
      })
    });
  };
}
