$( document ).ready(function() {

    $('#filter_submit').on('click',function(){
        var status = $('#stream_status_select').val();
        var category = $('#stream_category_select').val();
        var user = $('#stream_user_select').val();
        var token = $('#csrf_token').val();

        $.ajax({
            url: '/admin/streams_control/filter',
            type: 'POST',
            data: { _token: token, status: status,category:category,user:user },
            success: function(msg){
               $('#tbody_container').html(msg);
                setModerationButtonsEvents();
            },
            error: function(msg){
                var notice = new PNotify({
                    title: 'Ошибка',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'error'
                });
            }
        });
    });

    setModerationButtonsEvents();

});

function setModerationButtonsEvents(){
    $('.accept-stream').on('click',function(){
        var link = $(this);
        var td = $(this).parent();

        $.ajax({
            url: '/admin/streams_control/update_status',
            type: 'GET',
            data: 'status=accept&stream_id='+$(this).attr('number'),
            success: function(msg){
                //console.log(msg);
                $('[number='+link.attr('number')+'].accept-stream').hide();
                $('[number='+link.attr('number')+'].decline-stream').hide();
                td.append('<span style="color: green">Поток принят!</span>');
            },

            error: function(){
                link.after('<br> <span style="color: #ff0000">Ошибка!</span>');
            }
        });

        return false;

    });

    $('.decline-stream').on('click',function(){
        var link = $(this);
        var td = $(this).parent();

        $.ajax({
            url: '/admin/streams_control/update_status',
            type: 'GET',
            data: 'status=decline&stream_id='+$(this).attr('number'),
            success: function(msg){
                $('[number='+link.attr('number')+'].accept-stream').hide();
                $('[number='+link.attr('number')+'].decline-stream').hide();
                td.append('<span style="color: green">Поток отклонен!</span>');
            },

            error: function(){
                link.after('<br> <span style="color: #ff0000">Ошибка!</span>');
            }
        });

        return false;

    });
}