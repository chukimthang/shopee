function user() {
  var current = this;
  var dataImage;

  this.init = function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

    $('#upload-avatar').on('click', function () {
      if (typeof $('#avatar')[0].files[0] !== 'undefined') {
        current.uploadFile($('#avatar')[0].files[0]);
      } else {
        alert('File field is empty');
      }
    });

    this.updateProfile();
  };

  this.uploadFile = function (file) {
    var formData = new FormData();
    $('#upload-avatar').prop('disabled', true);
    $('#process-avatar').show();
    formData.append('upload', file);

    current.currentUpload = $.ajax({
      url: '/user/user/updateAvatar',
      type: 'post', 
      dataType: 'json',
      complete: function (data) {
        $('#upload-avatar').prop('disabled', false);
        $('#process-avatar').hide();
        switch (data.status) {
          case 200:
            dataImage = data.responseJSON.url;
            $('#display-avatar').html('');
            $('#display-avatar').append("<img src='" + dataImage 
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

  this.updateProfile = function() {
    var dataId;
    $('.update-profile').on('click', '.btn-primary', function() {
      dataId = $('#email').attr('user-id');
      $.ajax({
        url: '/user/user/update',
        type: 'POST',
        dataType: 'json',
        data: {
          id: dataId,
          name: $('#name').val(),
          phone: $('#phone').val(),
          avatar: dataImage
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
  }
}
