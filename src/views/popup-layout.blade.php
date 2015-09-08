@yield('content')

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
