$( document ).ready(function() {

    $('.delete_from_list').on('click',function(){

        var link = $(this);
        var tr = $(this).parent().parent();
        var number = link.attr('number');

        $.ajax({
            url: '/admin/payments/delete_from_payment_list',
            type: 'GET',
            data: 'payment_id='+number,
            success: function(msg){
                tr.hide();
            },

            error: function(){
                link.after('<br> <span style="color: #ff0000">Ошибка!</span>');
            }
        });

        return false;

    });

    $('.get_payment_list_info').on('click',function(){

        var link = $(this);
        var tr = $(this).parent().parent();
        var hash = link.attr('hash');

        $.ajax({
            url: '/admin/payments/get_payment_list_info',
            type: 'GET',
            data: 'hash='+hash,
            success: function(msg){
                //tr.hide();
                tr.after(msg);
            },

            error: function(){
                link.after('<br> <span style="color: #ff0000">Ошибка!</span>');
            }
        });

        return false;

    })

});
