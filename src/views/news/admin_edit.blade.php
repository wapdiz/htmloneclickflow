@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/admin/news/store" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Добавить новость</h2>
                </header>
                <div class="panel-body">
                    {{--@foreach($errors->all() as $error)--}}
                    {{--<p style="color: #ff0000">{{$error}}</p>--}}
                    {{--@endforeach--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$news['id']}}"/>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="title">Заголовок</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="title" value="{{$news['title']}}">
                        </div>
                    </div>

                    <div class="form-group" id="form-editor-element2">
                        <label class="col-md-3 control-label">Текст новости</label>
                        <div class="col-md-9">
                            <textarea class="summernote"  id="hidden-text-input2" name="body" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>{{$news['body']}}</textarea>
                        </div>
                    </div>

                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Сохранить</button>
                </footer>
            </section>
        </form>
    </div>
@endsection