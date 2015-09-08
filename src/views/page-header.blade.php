<header class="page-header">
    @if(isset($page_settings['header_title']))
        <h2>{{$page_settings['header_title']}}</h2>
    @endif


    <div class="right-wrapper pull-right">

        @if(isset($page_settings['breadcrumbs']))
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Mailbox</span></li>
                <li><span>Inbox</span></li>
            </ol>

        @endif

        {{--<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>--}}{{-- //стрелка вызова правого сайдбара--}}
    </div>
</header>