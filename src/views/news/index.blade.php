@extends('main-layout')

@section('content')
    <div class="container-fluid">
        @foreach($news as $item)
            <section class="panel">
                <header class="panel-heading">
                    <h2>{{$item['title']}}</h2>
                </header>
                <div class="panel-body">
                    {!! $item['body'] !!}
                </div>
                <footer class="panel-footer">
                    {{$item['created_at'] }}
                </footer>
            </section>
        @endforeach
    </div>
@endsection