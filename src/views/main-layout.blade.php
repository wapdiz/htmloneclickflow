<!doctype html>
<html class="fixed
    @if(isset($page_settings['sidebar']) && $page_settings['sidebar'] == 'compact')
        sidebar-left-collapsed
    @endif
" lang="ru" >
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@if(isset($page_settings['header_title'])){{$page_settings['header_title']}}@endif</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="/assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="/assets/vendor/summernote/summernote.css" />
    <link rel="stylesheet" href="/assets/vendor/summernote/summernote-bs3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="/assets/vendor/modernizr/modernizr.js"></script>

</head>
<body>
<section class="body">

    <!-- start: header -->
        {{--Общий хедер, используется на всех страницах--}}
        @include('main-header')
    <!-- end: header -->

    <div class="inner-wrapper">

        <!-- start: sidebar -->
        {{--Выше - хрень, левый сайдбар один, меняется класс в <html>--}}
        @include('sidebar-left-main')
        <!-- end: sidebar -->

        <section role="main" class="content-body">
            {{--Хедер над секцией контента и дополнительной менюшкой--}}
            @include('page-header')

            <!-- start: page -->
            {{--В зависимости от переданных параметров нужно выбрать нужный шаблон общей части страницы, куда помещаем контент--}}
            {{--Шаблон для емейлов--}}
            @if($page_settings['page_type'] == 'main')
                @yield('content')
            @elseif($page_settings['page_type'] == 'mail')
                @include('/addmenu_and_mailbox/index')
            @endif
            <!-- end: page -->
        </section>
    </div>
    {{--Правый сайдбар, пока тупо для совместимости--}}
    {{--@include('sidebar-right')--}}
</section>

<!-- Vendor -->
<script src="/assets/vendor/jquery/jquery.js"></script>
<script src="/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="/assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->

<script src="/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="/assets/vendor/summernote/summernote.js"></script>

<script src="/assets/vendor/flot/jquery.flot.js"></script>
<script src="/assets/vendor/flot/jquery.flot.time.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="/assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/assets/javascripts/theme.init.js"></script>

{{--Прошлая версия нотификейшенов  на бекбоне--}}
{{--<script src="/js/underscore-min.js"></script>--}}
{{--<script src="/js/backbone-min.js"></script>--}}
{{----}}
{{--<script src="/js/backbone/tickets.js"></script>--}}

<script src="/js/header_notification/index_header.js"></script>

<script src="/assets/vendor/pnotify/pnotify.custom.js"></script>
<link rel="stylesheet" href="/assets/vendor/pnotify/pnotify.custom.css" />
<script src="/js/notification_main.js" ></script>



{{--Блок под алерты--}}
@if(isset($alert_message))
    <div id="alert_message">{{$alert_message}}</div>
@endif

{{--Юзерские скрипты, подключаются если есть переменная--}}
@if(isset($scripts))
    @foreach($scripts as $script)
        <script src="/js/{{$script}}"></script>
    @endforeach
@endif

{{--Юзерские стили, подключаются если есть переменная--}}
@if(isset($styles))
    @foreach($styles as $style)
        <link rel="stylesheet" href="/css/{{$style}}">
    @endforeach
@endif

</body>
</html>