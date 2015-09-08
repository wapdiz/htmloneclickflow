$( document ).ready(function() {
    $('#credit_info_button_today').on('click',function(){
        if($(this).attr('active') != 'true'){

            //заменили класс и переставили атрибут в активный
            $(this).removeClass('btn-default');
            $(this).addClass('btn-primary');
            $(this).attr('active','true');

            var yesterday = $('#credit_info_button_yesterday');
            yesterday.attr('active','false');
            yesterday.removeClass('btn-primary');
            yesterday.addClass('btn-default');

            //сменили спан с инфой
            $('#credit_info_today').show();
            $('#credit_info_yesterday').hide();

            //выставили значение в инпуте
            $('#credit_date_input').val('today');


            if($(this).attr('enabled') == 1){
                $('#credit_submit_button').removeAttr('disabled');
            }else{
                $('#credit_submit_button').attr('disabled',1);
            }

        }
    });

    $('#credit_info_button_yesterday').on('click',function(){
        if($(this).attr('active') != 'true'){

            //заменили класс и переставили атрибут в активный
            $(this).removeClass('btn-default');
            $(this).addClass('btn-primary');
            $(this).attr('active','true');

            var today = $('#credit_info_button_today');
            today.attr('active','false');
            today.removeClass('btn-primary');
            today.addClass('btn-default');

            //сменили спан с инфой
            $('#credit_info_yesterday').show();
            $('#credit_info_today').hide();

            //выставили значение в инпуте
            $('#credit_date_input').val('yesterday');

            if($(this).attr('enabled') == 1){
                $('#credit_submit_button').removeAttr('disabled');
            }else{
                $('#credit_submit_button').attr('disabled',1);
            }

        }
    });

    $('#credit_submit_button').on('click',function(){

        var day  =  $('#credit_date_input').val();
        var token = $('#_token').val();

        $.ajax({
            url: '/credits/request_new',
            type: 'POST',
            data: { _token: token, day: day },
            success: function(msg){
                if(msg.error !== undefined){
                    var notice = new PNotify({
                        title: 'Ошибка',
                        text: msg.error,
                        addclass: 'stack-topleft',
                        delay: 1000,
                        type: 'error'
                    });
                } else{

                    var notice = new PNotify({
                        title: 'Успешно',
                        text: 'Заявка на кредит отправлена',
                        addclass: 'stack-topleft',
                        delay: 1000,
                        type: 'info'
                    });

                    $('#last_credits_container').html(msg);
                    if($('#credit_info_button_today').attr('active') == 'true'){
                        $('#credit_info_today').html('Доступных для кредитования подписок: <strong>0</strong> / Доступная сумма кредита: <strong>0</strong> рублей');
                    } else{
                        $('#credit_info_yesterday').html('Доступных для кредитования подписок: <strong>0</strong> / Доступная сумма кредита: <strong>0</strong> рублей');
                    }
                }
            },
            error: function(msg){
                console.log('Не отправлено!');
                console.log(msg);

            }
        });
    })

});