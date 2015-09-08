$( document ).ready(function() {

    if($('#alert_message').is('div')){

        var text =  $('#alert_message').html();

        var notice = new PNotify({
            title: 'Уведомление',
            text: text,
            addclass: 'stack-topleft',
            delay: 1000,
            type: 'info'
        });
    }

});