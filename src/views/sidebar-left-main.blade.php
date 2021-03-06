<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Меню
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    

                    @if($currentUser['is_admin'] == 1)
                        <li class="nav-parent                            
                            {{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin')}}
                        ">
                            <a>
                                <i class="fa fa-align-left" aria-hidden="true"></i>
                                <span>Админ</span>
                            </a>
                            <ul class="nav nav-children">
                                <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_global_settings')}}">
                                    <a href="/admin/global_settings">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                        Глобальные настройки
                                    </a>
                                </li>
                                <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_users_list')}}">
                                    <a href="/admin/users">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        Пользователи
                                    </a>
                                </li>

                                <li class="nav-parent                                    
                                    {{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_stream_group')}}
                                ">
                                    <a>
                                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                                        <span>Потоки</span>
                                    </a>
                                    <ul class="nav nav-children">                                            
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_streams_control')}}">
                                            <a href="/admin/streams_control">Потоки</a>
                                        </li>
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_splits_settings')}}">
                                            <a href="/admin/splits_settings">Сплиты</a>
                                        </li> 
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_landings')}}">
                                            <a href="/admin/landings">Лендинги</a>
                                        </li>


                                        <li class="nav-parent                                    
                                            {{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_category_group')}}
                                        ">
                                            <a>
                                                <i class="fa fa-list-ul" aria-hidden="true"></i>
                                                <span>Категории</span>
                                            </a>
                                            <ul class="nav nav-children"> 

                                                <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_categories')}}">
                                                    <a href="/admin/categories">Категориями LP</a>
                                                </li>

                                                <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_operators')}}">
                                                    <a href="/admin/operators">Операторы</a>
                                                </li>
                                                <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_agregators')}}">
                                                    <a href="/admin/agregators">Агрегаторы</a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </li>


                                <li class="nav-parent 
                                    {{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_info_group')}}
                                ">
                                    <a>
                                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                        <span>Информирование</span>
                                    </a>
                                    <ul class="nav nav-children"> 
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_faq')}}">
                                            <a href="/admin/faq">FAQ</a>
                                        </li>
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_news')}}">
                                            <a href="/admin/news">Новости</a>
                                        </li>
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_static_pages')}}">
                                            <a href="/admin/static_pages">Страницы</a>
                                        </li>
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_create_ticket')}}">
                                            <a href="/admin/admin_create_ticket">Отправить тикет юзеру</a>
                                        </li>
                                    </ul>
                                </li>                                

                                <li class="nav-parent 
                                    {{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_payments_group')}}
                                ">
                                    <a>
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                        <span>Выплаты</span>
                                    </a>
                                    <ul class="nav nav-children"> 
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_payments')}}">
                                            <a href="/admin/payments">Выплаты</a>
                                        </li>
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_payments_list')}}">
                                            <a href="/admin/payments_list">Листы выплат</a>
                                        </li>
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_regular_payments_list')}}">
                                            <a href="/admin/regular_payments_list">Рег. выплаты</a>
                                        </li>
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_credits')}}">
                                            <a href="/admin/credits">Кредитование</a>
                                        </li>
                                    </ul>
                                </li>
                                <!--
                                <li>
                                    <a href="/admin/statistic">Статистика</a>
                                </li>
                                -->

                                <li class="nav-parent
                                    {{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_analyze_group')}}
                                ">
                                    <a>
                                        <i class="fa fa-database" aria-hidden="true"></i>
                                        <span>Анализ трафика</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_analyze_tb_list')}}">
                                            <a href="/admin/analyze/tb">Последние причины ТВ</a>
                                        </li>
                                        <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_analyze_id_click')}}">
                                            <a href="/admin/analyze/stats_id_click">Анализ по id_click</a>
                                        </li>
                                        {{--<li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_analyze_click_list')}}">--}}
                                            {{--<a href="/admin/payments_list">Последние клики (позднее)</a>--}}
                                        {{--</li>--}}
                                    </ul>
                                </li>

                                <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'admin_statistic_grupped')}}">
                                    <a href="/admin/statistic_grupped">
                                        <i class="fa fa-table" aria-hidden="true"></i>
                                        Статистика
                                    </a>
                                </li>
                              
                                <li>
                                    <a href="/redis/flushall">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                        Сброс данных Redis
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif


                    <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'index')}}">
                        <a href="/">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Главная</span>
                        </a>
                    </li>
                    <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'referrals')}}">
                        <a href="/myinfo/referrals">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Рефералы</span>
                        </a>
                    </li>
                    <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'user_statistic_grupped')}}">
                        <a href="/statistic_grupped">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span>Статистика</span>
                        </a>
                    </li>
                    <!--
                    <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'statistic')}}">
                        <a href="/statistic">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span>Статистика</span>
                        </a>
                    </li>
                    -->
                    <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'news')}}">
                        <a href="/news">
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>
                            <span>Новости</span>
                        </a>
                    </li>

                    <li class="nav-parent
                        {{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'tickets_group')}}
                    ">
                        <a>
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            <span>Тикеты</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'tickets_create')}}">
                                <a href="/tickets/create">Создать</a>
                            </li>
                            <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'tickets')}}">
                                <a href="/tickets">Просмотр</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent
                        {{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'stream_group')}}
                    ">
                        <a>
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                            <span>Потоки</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'streams_create')}}">
                                <a href="/streams/create">Добавить</a>
                            </li>
                            <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'streams')}}">
                                <a href="/streams">Просмотр</a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'splits_settings')}}">
                        <a href="/splits_settings">
                            <i class="fa fa-list-ol" aria-hidden="true"></i>
                            <span>Сплиты</span>
                        </a>
                    </li>

                    <li class="nav-parent
                        {{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'payment_group')}}
                    ">
                        <a>
                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <span>Выплаты</span>
                        </a>
                        <ul class="nav nav-children">
                            <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'payment_last')}}">
                                <a href="/payment/last">Просмотр</a>
                            </li>
                            <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'payment_request')}}">
                                <a href="/payment/request">Запросить</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'faq')}}">
                        <a href="/faq">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>FAQ</span>
                        </a>
                    </li>
                    <li class="{{MenuHelper::getCssClass($page_settings['sidebar_active_li'] , 'credits')}}">
                        <a href="/credits">
                            <i class="fa fa-bank" aria-hidden="true"></i>
                            <span>Кредитование</span>
                        </a>
                    </li>
                    @if(isset($addMenu))
                        @foreach($addMenu as $link)
                            @if($link['parent'] == false)
                                <li>
                                    <a href="/articles/view?id={{$link['id']}}">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>{{$link['title']}}</span>
                                    </a>
                                </li>
                            @else
                            {{--Значит родитель(контейнер)!--}}
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <span>{{$link['title']}}</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        @if(isset($link['child']))
                                            @foreach($link['child'] as $child)
                                                <li>
                                                    <a href="/articles/view?id={{$child['id']}}">{{$child['title']}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    @endif

                </ul>
            </nav>
        </div>
    </div>

</aside>