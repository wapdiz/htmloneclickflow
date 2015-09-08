@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2> Действительно удалить "{{$article['header']}}"?</h2>
            </header>
            <div class="panel-body">
                @if($parent == true)
                    Невозможно удалить контейнер, так как он не пустой!
                    <a href="/">На главную</a>
                @else
                    <p>Действительно удалить "{{$article['title']}}" ?</p>

                    <form action="/articles/delete" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{$article['page_id']}}"/>
                        <input type="radio" name="check" value="yes"> Да<Br>
                        <input type="radio" name="check" value="no"> Нет<Br>
                        <button class="btn btn-primary">Применить</button>
                    </form>
                @endif

            </div>
        </section>
    </div>
@endsection