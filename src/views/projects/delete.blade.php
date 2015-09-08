@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Удалить проект {{$project['name']}}</h2>
            </header>
            <div class="panel-body">
                <p>Действительно удалить проект {{$project['name']}}?</p>

                <form action="/projects/delete" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$project['project_id']}}"/>
                    <input type="radio" name="check" value="yes"> Да<Br>
                    <input type="radio" name="check" value="no"> Нет<Br>
                    <button class="btn btn-primary">Применить</button>
                </form>
            </div>
        </section>
    </div>
@endsection