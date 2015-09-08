$( document ).ready(function() {

    $('#filter_submit').on('click',function(){

        var token = $('#csrf_token').val();
        var status = $('#user_status').val();

        $.ajax({
            url: '/admin/users/filter',
            type: 'POST',
            data: {_token: token ,status: status },
            success: function(msg){
                $('#tbody_container').html(msg);
            },

            error: function(){
                console.log('Error!');
            }
        });
    });

});