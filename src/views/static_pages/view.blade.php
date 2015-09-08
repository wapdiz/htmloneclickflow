@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>{{$article['header']}}</h2>
            </header>
            <div class="panel-body">
                {!! $article['body'] !!}
            </div>
            <footer class="panel-footer">
                {{$article['created']}}
            </footer>
        </section>
    </div>
@endsection