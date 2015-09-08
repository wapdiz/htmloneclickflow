$( document ).ready(function() {

    $('.show-dd-geo-params').on('click',function(){
        var id = $(this).attr('number');

        $('#show_container').html( $('.dd-geo-params-'+id).html() );

    });


    $('.show-request-params').on('click',function(){
        var id = $(this).attr('number');

        $('#show_container').html( $('.request-params-'+id).html() );

    });

    $('#button_log_switch').on('click',function(){
        var button = $(this);
        var enable = button.attr('enable');

        if(enable == 1){
            console.log('ajax запрос на выключение!');
            $.ajax({
                url: '/admin/analyze/tb_log_switch',
                type: 'GET',
                data: 'action=off',
                success: function(msg){
                    button.html('Логирование выключено');
                    button.attr('enable',0);
                    button.removeClass('btn-success');
                    button.addClass('btn-warning')
                },
                error: function(){
                    console.log('Error!');
                }
            });
        } else{
            console.log('ajax запрос на включение!');
            $.ajax({
                url: '/admin/analyze/tb_log_switch',
                type: 'GET',
                data: 'action=on',
                success: function(msg){
                    button.html('Логирование включено');
                    button.attr('enable',1);
                    button.removeClass('btn-warning');
                    button.addClass('btn-success')
                },
                error: function(){
                    console.log('Error!');
                }
            });
        }

    });

    //секция транкейта таблицы
    $('#button_truncate_log').on('click',function(){
        $('#truncateSettingsModal').modal('show');
    });
    $('#truncateSettingsClose').on('click',function(){
        $('#truncateSettingsModal').modal('hide');
        return false;
    });


    //$('#truncateSettingsAccept').on('click',function(){
    //
    //    var token = $('#truncateToken').val();
    //
    //    $.ajax({
    //        url: '/admin/analyze/tb_log_truncate',
    //        type: 'POST',
    //        data: { _token: token},
    //        success: function(msg){
    //            $('#truncateSettingsModal').modal('hide');
    //        },
    //        error: function(){
    //            $('#error-ajax').show();
    //        }
    //    });
    //
    //    return false;
    //
    //});

});

