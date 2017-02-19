var category = function() {

    this.init = function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        this.add();
        this.update();
        this.delete();
    }

    this.add = function() {
        $('.add-category').on('click', '.btn-primary.add', function () {
            $.ajax({
                type: 'POST',
                url: '/admin/category/addAjax',
                data: {
                    name: $('#nameCategory').val()
                },
                async: false,
                dataType: 'json',
                success: function (data) {
                    var str = "<tr class='odd gradeX' align='center'><td></td>";
                    str += "<td>" + $('#nameCategory').val() + "</td>";
                    str += "<td class='center' width='12%'><i class='fa fa-pencil fa-fw'></i>";
                    str += "<a href='javascript:void(0)' data-toggle='modal' data-target='.bs-example-modal-lg.edit'";
                    str += "data-id='{!! $category->id !!}' class='update'>Edit</a></td>";
                    str += "<td class='colum' width='12%'><i class='fa fa-trash-o fa-fw'></i>";
                    str += "<a href='javascript:void(0)' data-id='{!! $category->id !!}'"; 
                    str += "value='{!! $category->id !!}' class='delete'>Delete</a></td><tr>"

                    $('#category-list').append(str);
                    alert(data.sms);
                    $('.modal').modal('hide');
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

    this.update = function() {
        var dataId;
        $('.update').on('click', function() {
            dataId = $(this).data('id');
            var dataName = $(this).parent().prev();
            $('#nameEditCategory').val($.trim(dataName.html()));
        });

        $('.edit-category').on('click', '.btn-primary.edit', function() {
            $.ajax({
                type: 'POST',
                url: '/admin/category/updateAjax',
                data: {
                    id: dataId,
                    name: $('#nameEditCategory').val()
                },
                async: false,
                dataType: 'json',
                success: function (data) {
                    $('#category-name-' + dataId).html($('#nameEditCategory').val());
                    alert(data.sms);
                    $('.modal').modal('hide');
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
        $('.delete').on('click', function () {
            dataId = $(this).data('id');
            $.ajax({
                url: '/admin/category/deleteAjax',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: dataId
                },
                success: function (data) {
                    alert(data.sms);
                }
            })
            $(this).parent().parent().remove();
        });
    }
}
