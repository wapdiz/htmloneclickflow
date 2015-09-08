@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <form class="form-horizontal form-bordered" id="create-form" method="post" action="/admin/static_pages/store">
            <header class="panel-heading">
                Создать статическую страницу или контейнер
            </header>
            <div class="panel-body">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="type">Тип</label>
                        <div class="col-md-6">
                            <input type="radio" name="type" value="link">Ссылка<Br>
                            <input type="radio" name="type" value="parent">Контейнер<Br>
                            <input type="radio" name="type" value="children">Дочерний<Br>
                        </div>
                    </div>
                    <div class="form-group" id="form-container-element">
                        <label class="col-md-3 control-label" for="parent">Контейнер</label>
                        <div class="col-md-6">
                            <select class="form-control" name="parent" id="parent">
                                @foreach($parents as $parent)
                                    <option value="{{$parent['id']}}">{{$parent['title']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="form-title-element">
                        <label class="col-md-3 control-label" for="title">Название</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title" value="" placeholder="отображаемое в ссылке">
                        </div>
                    </div>
                    <div class="form-group" id="form-header-element">
                        <label class="col-md-3 control-label" for="header">Заголовок статьи</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="header" name="header" value="" placeholder="отображается в статье" >
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label class="control-label col-md-3" for="body">Текст статьи</label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<textarea class="form-control" rows="5" id="body" name="body" placeholder="Тут типа должен быть редактор по идее"></textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    @include('/static_pages/editor')

            </div>
            <footer class="panel-footer">
                <button class="btn btn-primary">Создать</button>
            </footer>
        </form>
        </section>
    </div>
@endsection