@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <form class="form-horizontal form-bordered" id="create-form" method="post" action="/articles/edit">
                <header class="panel-heading">
                    Редактирование статьи "{{$article['header']}}"
                </header>
                <div class="panel-body">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="type" value="{{$article['type']}}">
                    <input type="hidden" name="id" value="{{$article['page_id']}}">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="type">Тип</label>
                        <div class="col-md-6">

                            <input type="radio" name="type" value="link" disabled @if($article['type'] == 'link') checked @endif >Ссылка<Br>
                            <input type="radio" name="type" value="parent" disabled @if($article['type'] == 'parent') checked @endif >Контейнер<Br>
                            <input type="radio" name="type" value="children" disabled @if($article['type'] == 'child') checked @endif >Дочерний<Br>
                        </div>
                    </div>
                    @if($article['type'] == 'children')
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
                    @endif

                    <div class="form-group" id="form-title-element">
                        <label class="col-md-3 control-label" for="title">Название</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="title" name="title" value="{{$article['title']}}" placeholder="отображаемое в ссылке">
                        </div>
                    </div>
                    @if($article['type'] == 'link' || $article['type'] == 'child')
                    <div class="form-group" id="form-header-element">
                        <label class="col-md-3 control-label" for="header">Заголовок статьи</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="header" name="header" value="{{$article['header']}}" placeholder="отображается в статье" >
                        </div>
                    </div>

                    @include('/static_pages/editor')
                    @endif
                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Сохранить</button>
                </footer>
            </form>
        </section>
    </div>
@endsection