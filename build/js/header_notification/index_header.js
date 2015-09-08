$( document ).ready(function() {

    //предусмотреть логику для кнопок "очистить" при котором удаляются все сообщения

    checkNotification();

    clearNotificationEvent();

    setInterval('checkNotification()',15000);

});

function checkNotification(){

    //получаем массив, в котором содержатся отдельно 3 типа уведомлений, затем передаем всё это в рендер
    $.ajax({
        url: '/notification/get',
        type: 'GET',
        success: function(msg){
            render(msg);
        },

        error: function(){
            console.log('server error!');
        }
    });

}

function render(msg){

    var data = JSON.parse(msg);

    //рендер тикетов
    $('#ticket_notification_container').html(data.ticket.view);
    if(data.ticket.count !== undefined){
        //показываем элемент и выводим счетчик
        $('#ticket_notification_count').show();
        $('#ticket_notification_count').text(data.ticket.count)
    } else{
        $('#ticket_notification_count').hide();
    }

    //рендер денег
    $('#money_notification_container').html(data.money.view);
    if(data.money.count !== undefined){
        //показываем элемент и выводим счетчик
        $('#money_notification_count').show();
        $('#money_notification_count').text(data.money.count)
    } else{
        $('#money_notification_count').hide();
    }

    //рендер стримов
    $('#stream_notification_container').html(data.stream.view);
    if(data.stream.count !== undefined){
        //показываем элемент и выводим счетчик
        $('#stream_notification_count').show();
        $('#stream_notification_count').text(data.stream.count)
    } else{
        $('#stream_notification_count').hide();
    }

}

function clearNotificationEvent(){

    $('.clear_notification').on('click',function(){

        var type = $(this).attr('type');

        var link = $(this);

        var empty = '<li><span class="title">Нет уведомлений</span></li>'

        $.ajax({
            url: '/notification/clear',
            type: 'GET',
            data: 'type='+type,
            success: function(msg){
                var count_class = '#'+type+'_notification_count';
                $(count_class).hide();
                $('#'+type+'_notification_container').html(empty)
            },

            error: function(){
                console.log('server error!');
            }
        });

        return false;
    })

}
