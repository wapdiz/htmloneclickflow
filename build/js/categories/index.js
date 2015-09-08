$( document ).ready(function() {

    $('.category_delete').on('click',function(){
        var id = $(this).attr('category_id');
        $('#categoriesSettingsModal').modal('show');
        $('#category_id_input').val(id);
        $('#error-ajax').hide();
        return false;
    });

    $('#categorySettingsClose').on('click',function(){
        $('#categoriesSettingsModal').modal('hide');
        return false;
    });

    $('#categorySplitSettings').on('click',function(){

        var id = $('#category_id_input').val();
        console.log(id);
        var token = $('#categoryToken').val();

        var link = $('[category_id = '+id+']');
        var tr = link.parent().parent();


        $.ajax({
            url: '/admin/categories/delete',
            type: 'POST',
            data: { _token: token, category_id: id },
            success: function(msg){
                $('#categoriesSettingsModal').modal('hide');
                tr.hide();
            },
            error: function(){
                $('#error-ajax').show();
            }
        });

        return false;

    })

});
