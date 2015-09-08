/**
 * Created by Роман on 06.04.2015.
 */
$( document ).ready(function() {

    var TicketCollection = Backbone.Collection.extend({
        url: '/ticket_notification_api',
        render: function () {
            if (this.size() == 0) {
                $('#ticket_notification_count').hide();
            } else {
                $('#ticket_notification_count').text(this.size());
                $('#ticket_notification_count').show();
            }
            $('#ticket_notification_container').html('');
            this.each(function (item) {
                $('#ticket_notification_container').append('<li><a href="/tickets/view?id=' + item.get('ticket_id') + '" class="clearfix"> ' +
                '<span class="title">' + item.get('header') + '</span> ' + '<span class="message">' + item.get('body') + '</span>  ' + ' </a> </li>');
            });
        }

    });

    var ticketCollection = new TicketCollection();
    ticketCollection.reset('[]');
    ticketCollection.fetch();

    window.check = function check(){
        ticketCollection.render();
    };

    setInterval(check, 10000); // использовать функцию

});