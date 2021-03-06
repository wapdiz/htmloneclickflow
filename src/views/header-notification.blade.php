<div style="display: inline-block; margin-right: 50px;" >
    <p>
        <b>Баланс: </b>&nbsp;
            <i class="fa fa-rub"></i>{{$currentUser['balance_rub']/100}}&nbsp;
            <i class="fa fa-usd"></i>{{$currentUser['balance_usd']/100}}&nbsp;
            <i class="fa fa-eur"></i>{{$currentUser['balance_eur']/100}}&nbsp;
    </p>
</div>


<ul class="notifications">
    <li>
        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
            <i class="fa fa-tasks"></i>
            <span class="badge" id="money_notification_count" style="display: none">0</span>
        </a>

        <div class="dropdown-menu notification-menu" id="dropdown_money_notification" >
            <div class="notification-title">
                Выплаты
            </div>

            <div class="content">
                <ul id="money_notification_container">
                    {{--Контейнер для рендера денег--}}
                    <li>
                        <span class="title">
                            Нет уведомлений
                        </span>
                    </li>
                </ul>

                <hr>
                <div class="text-right">
                    <a href="#" class="view-more clear_notification" type="money" >Очистить</a><br>
                    <a href="/payment/last" class="view-more"  >Просмотреть все</a>
                </div>
            </div>
        </div>

    </li>
    <li>
        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
            <i class="fa fa-envelope"></i>
            <span class="badge" id="ticket_notification_count" style="display: none">0</span>
        </a>

        <div class="dropdown-menu notification-menu" id="dropdown_ticket_notification" >
            <div class="notification-title">
                Тикеты
            </div>

            <div class="content">
                <ul id="ticket_notification_container">
                    {{--Контейнер для рендера тикетов--}}
                    <span class="title">
                            Нет уведомлений
                    </span>
                </ul>

                <hr>
                <div class="text-right">
                    <a href="#" class="view-more clear_notification" type="ticket" >Очистить</a><br>
                    <a href="/tickets" class="view-more">Просмотреть все</a>
                </div>
            </div>
        </div>

    </li>
    <li>
        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="badge" id="stream_notification_count" style="display: none">0</span>
        </a>

        <div class="dropdown-menu notification-menu" id="dropdown_stream_notification" >
            <div class="notification-title">
                Потоки
            </div>

            <div class="content">
                <ul id="stream_notification_container">
                    {{--Контейнер для рендера потоков--}}
                    <span class="title">
                            Нет уведомлений
                    </span>
                </ul>

                <hr>
                <div class="text-right">
                    <a href="#" class="view-more clear_notification" type="stream" >Очистить</a><br>
                    <a href="/streams" class="view-more">Просмотреть все</a>
                </div>
            </div>
        </div>

    </li>
</ul>