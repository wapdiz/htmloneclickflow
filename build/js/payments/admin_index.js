$( document ).ready(function() {

    addHandler();

    $('.decline_payment').on('click',function(){
        var link = $(this);
        var tr = $(this).parent().parent();

        $.ajax({
            url: '/admin/payments/decline_payment',
            type: 'GET',
            data: 'payment_id='+$(this).attr('number'),
            success: function(msg){
                link.hide();
                var status = $('[number='+link.attr('number')+'].item_status');
                console.log(status);
                status.removeClass('text-warning');
                status.addClass('text-danger');
                status.text('Отклонено');

                $('[number='+link.attr('number')+'].add_in_payment_list').hide();
            },

            error: function(){
                link.after('<br> <span style="color: #ff0000">Ошибка!</span>');
            }
        });

        return false;

    });

    $('#filter_submit').on('click',function(){
        $.ajax({
            url: '/admin/payments/get_payments_with_filter',
            type: 'GET',
            data: 'currency='+$('#filter_currency').val()+'&status='+$('#filter_status').val()
            +'&type='+$('#filter_type').val()+'&date='+$('#filter_datepicker').val(),
            success: function(msg){
               $('#content_container').html(msg);
                addHandler();
            },

            error: function(){
                console.log('Error!');
            }
        });
    });

    $('#main_checkbox').on('click',function(){
        if($(this).prop('checked')){

            console.log(1);
            $('[process=1].add_in_list_checkbox').each(function(index,element){
                $(element).attr('checked',true);
            })
        } else{
            console.log(2);
            $('[process=1].add_in_list_checkbox').each(function(index,element){
                $(element).attr('checked',false);
            });

        }

    });

    $('#add_all_in_payment_list').on('click',function(){
        var array = [];

        //console.log(12312);

        $('[process=1].add_in_list_checkbox').each(function(index,element){
            if($(element).prop('checked')) array.push($(element).attr('number'));
        });

        console.log(array);

        $.ajax({
            url: '/admin/payments/add_in_payment_list_array',
            type: 'GET',
            data: 'array='+JSON.stringify(array),
            success: function(msg){

                $('[process=1].add_in_list_checkbox').attr('checked',false);

                array_length = array.length;
                console.log(array_length);
                console.log(array);

                for(var i = 0;i<array_length;i++){
                    number = array.pop();
                    console.log(number);
                    $('[number='+number+'].decline_payment').hide();
                    $('[number='+number+'].add_in_payment_list').hide();
                    $('[number='+number+'].add_in_list_checkbox').removeAttr('process');
                    $('#in_list_'+number).text('Да');
                }

            },

            error: function(){
                link.after('<br> <span style="color: #ff0000">Ошибка!</span>');
            }
        });

        return false;

    });

});

function addHandler(){
    $('.add_in_payment_list').on('click',function(){

        var link = $(this);
        var tr = $(this).parent().parent();

        $.ajax({
            url: '/admin/payments/add_in_payment_list',
            type: 'GET',
            data: 'payment_id='+$(this).attr('number'),
            success: function(msg){

                link.hide();
                $('[number='+link.attr('number')+'].decline_payment').hide();

                var id = '#in_list_'+link.attr('number');
                $(id+'').text('Да');
            },

            error: function(){
                link.after('<br> <span style="color: #ff0000">Ошибка!</span>');
            }
        });

    });
};

