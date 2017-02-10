var user = function() {

    this.init = function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        this.show();
        this.delete();
    }

    this.show = function() {

        $('.detail').on('click', function() {
            var dataId = $(this).data('id');
            var dataName = $(this).data('name');
            var dataEmail = $(this).data('email');
            var dataPhone = $(this).data('phone');
            var dataAvatar = $(this).data('avatar');

            var dataAvatar = "<img src='"+dataAvatar+"' alt='' width='150px' height='150px'>";

            $('#user-name').html(dataName);
            $('#user-email').html(dataEmail);
            $('#user-phone').html(dataPhone);
            $('#user-avatar').html(dataAvatar);
        });
    }

    this.delete = function() {
        var dataId;
        $('.delete').on('click', function() {
            dataId = $(this).data('id');
            $.ajax({
                url: '/admin/user/deleteAjax ',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: dataId
                },
                success: function(data) {
                    alert(data.sms);
                }
            });
            $(this).parent().parent().remove();
        });
    }
}
