<menu id="content-menu" class="inner-menu" role="menu">
    <div class="nano">
        <div class="nano-content">

            <div class="inner-menu-toggle-inside">
                <a href="#" class="inner-menu-collapse">
                    <i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Hide Menu
                </a>

                <a href="#" class="inner-menu-expand" data-open="inner-menu">
                    Show Menu <i class="fa fa-chevron-down"></i>
                </a>
            </div>

            <div class="inner-menu-content">
                <a href="/tickets/create" class="btn btn-block btn-primary btn-md pt-sm pb-sm text-md">
                    <i class="fa fa-envelope mr-xs"></i>
                    Создать новый
                </a>

                <ul class="list-unstyled mt-xl pt-md">
                    <li>
                        <a href="/tickets" class="menu-item @if($page_settings['active_status'] == 'all') active @endif">Все</a>
                    </li>
                    <li>
                        <a href="/tickets?status=new" class="menu-item @if($page_settings['active_status'] == 'new') active @endif">Новые</a>
                    </li>
                    <li>
                        <a href="/tickets?status=review" class="menu-item @if($page_settings['active_status'] == 'review') active @endif">На расмотрении</a>
                    </li>
                    <li>
                        <a href="/tickets?status=answer" class="menu-item @if($page_settings['active_status'] == 'answer') active @endif">Поступил ответ</a>
                    </li>
                    <li>
                        <a href="/tickets?status=closed" class="menu-item @if($page_settings['active_status'] == 'closed') active @endif">Решено</a>
                    </li>
                </ul>

                <hr class="separator" />

                <div class="sidebar-widget m-none">
                    <div class="widget-header">
                        <h6 class="title">Labels</h6>
                        <span class="widget-toggle">+</span>
                    </div>
                    <div class="widget-content">
                        <ul class="list-unstyled mailbox-bullets">
                            @foreach($ticket_types as $type)
                                <li>
                                    <a href="/tickets?type={{$type['ticket_type_id']}}" class="menu-item @if($page_settings['active_status'] == $type['ticket_type_id']) active @endif ">{{$type['ticket_type_name']}} <span class="ball" style="border-color: {{$type['ticket_type_color']}}"></span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{--</div>--}}
            </div>
        </div>
    </div>
</menu>