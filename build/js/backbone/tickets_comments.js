$( document ).ready(function() {

    /**
     * Модель конкретного комментария
     * */
    var TicketCommentsItem = Backbone.Model.extend({
        initialize:function(){
            this.save();
        }
    });

    /**
     * Коллекция
     * Гордо делегируем ей урлу апишки
     * */
    var TicketCommentsCollection = Backbone.Collection.extend({
        url: '/ticket_comments_api'
    });

    /**
     * Представление для конкретного комментария
     * Умеет рендерить вьюшку с бэкэнда))
     * */
    var TicketCommentsView = Backbone.View.extend({
        model: TicketCommentsItem,
        initialize: function () { // Подписка на событие модели
            this.model.bind('change', this.render, this);
        },
        render: function(){
            $('#panel_textarea').before(this.model.attributes.view);
        }
    });

    /**
     * Общее представление для комментов
     * */
    var TicketCommentsApp = Backbone.View.extend({
        initialize: function() {

            this.body = this.$("#comment_text_area");
            this.token = this.$('#csrf_token');
            this.ticket_id = this.$('#ticket_id');
            /** Бинд на добавление в коллекцию, будет вызван метод addOne() аппликейшена*/
            ticketComments.bind('add',this.addOne,this);
        },
        events: {
            "click #submit_comment": "submitClick"
        },
        addOne: function(comment){
            /** после добавления создаем и рендерим вьюшку, потом очищаем текстареа*/
            var view = new TicketCommentsView({model:comment});
            this.body.val('');
        },
        submitClick: function(){
            /** Создаем новый элемент в коллекции*/
            ticketComments.create({
                body: this.body.val(),
                _token: this.token.val(),
                ticket_id:this.ticket_id.val()
            });
        }
    });

    var ticketComments = new TicketCommentsCollection();

    var app = new TicketCommentsApp({ el: $("body") });
});