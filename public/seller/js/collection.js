function collection() {
  var current = this;

  this.init = function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    current.update();
    current.delete();
  }

  this.update = function() {
    var dataId;
    $('.update').on('click', function() {
      dataId = $(this).data('id');
      var dataName = $(this).parent().prev();
      $('#collection-edit-name').val($.trim(dataName.html()));
    });

    $('#collection-edit').on('click', '.btn-primary', function() {
      $.ajax({
        url: '/seller/collection/updateAjax',
        type: 'POST',
        dataType: 'json',
        data: {
          id: dataId,
          name: $('#collection-edit-name').val()
        },
        async: false,
        success: function(data) {
          alert(data.sms);
          $('#collection-name-' + dataId).html($('#collection-edit-name').val());
          $('#collection-edit').modal('hide');
        },
        error: function(data) {
          var errors = '';
          for(datos in data.responseJSON){
            errors += data.responseJSON[datos] + '<br>';
          }
        $('.form-error').show().html(errors);
        }
      });
    });
  }

  this.delete = function() {
    var dataId;
    $('.delete').on('click', function() {
      dataId = $(this).data('id');
      $.ajax({
        url: '/seller/collection/deleteAjax',
        type: 'POST',
        dataType: 'json',
        data: {
          id: dataId
        },
        success: function(data) {
          alert(data.sms);
        }
      })
      $(this).parent().parent().remove();
    });
  }
}
