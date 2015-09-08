$( document ).ready(function() {

    //инициализируем дейтпикер
    $( "#datepicker" ).datepicker();

    $('.accept_button').on('click',function(){

        var token = $('#_token').val();
        var credit_id = $(this).attr('credit_id');

        var td = $(this).parent();

        $.ajax({
            url: '/admin/credits/change_status',
            type: 'POST',
            data: { _token: token, credit_id: credit_id, status: 'accept' },
            success: function(msg){
                console.log('Успешно одобрено!!');
                //дальше изменить статус и повесить disabled на кнопки
                td.children().each(function(index,element){
                    $(element).attr('disabled',1);
                });
                $('[td_credit_id = '+credit_id+']').text('Одобрен')

                var notice = new PNotify({
                    title: 'Уведомление',
                    text: 'Кредит одобрен!',
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'info'
                });

            },
            error: function(){
                console.log('Ошибка!');
                //вывести ее куда нить
            }
        });
    });

    $('.decline_button').on('click',function(){

        var token = $('#_token').val();
        var credit_id = $(this).attr('credit_id');

        var td = $(this).parent();

        $.ajax({
            url: '/admin/credits/change_status',
            type: 'POST',
            data: { _token: token, credit_id: credit_id, status: 'decline' },
            success: function(msg){
                console.log('Успешно отклонено!');
                //дальше изменить статус и повесить disabled на кнопки
                td.children().each(function(index,element){
                    $(element).attr('disabled',1);
                });
                $('[td_credit_id = '+credit_id+']').text('Отклонен');

                var notice = new PNotify({
                    title: 'Уведомление',
                    text: 'Кредит отклонен!',
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'error'
                });

            },
            error: function(){
                console.log('Ошибка!');
                //вывести ее куда нить
            }
        });
    });

    $('#filter_submit').on('click',function(){
        var status = $('#credit_status_filter').val();
        console.log(status);
        var date = $('#datepicker').val();
        console.log(date);
        var token = $('#_token').val();

        $.ajax({
            url: '/admin/credits/filter',
            type: 'POST',
            data: { _token: token, status: status, date: date },
            success: function(msg){
                console.log('Отфильтровано!!');

                $('#tbody_container').html(msg);

            },
            error: function(){
                var notice = new PNotify({
                    title: 'Уведомление',
                    text: 'Ошибка!',
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'error'
                });
            }
        });

    })

});