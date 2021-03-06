@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/projects/create" class="form-horizontal form-bordered">
        <section class="panel">
            <header class="panel-heading">
                <h2>Добавить новый проект</h2>
            </header>
            <div class="panel-body">
                @foreach($errors->all() as $error)
                    <p style="color: #ff0000">{{$error}}</p>
                @endforeach
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="name">Название проекта <span style="color:#ff0000">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="theme">Выберите тему из списка или укажите свою <span style="color:#ff0000">*</span></label>
                    <div class="col-md-6">
                        <select class="form-control" name="theme" id="theme_option">
                            <option value="custom" >Ввести самостоятельно</option>
                            @foreach($project_themes as $theme)
                                <option value="{{$theme['theme_id']}}">{{$theme['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group" id="userThemeContainer">
                    <label class="col-md-3 control-label" for="userTheme">Тема</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="userTheme" name="userTheme">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="landing">Группа лендингов </label>
                    <div class="col-md-6">
                        <select class="form-control" name="landing" id="landing">
                            @foreach($landing_groups as $group)
                                <option value="{{$group['id']}}">{{$group['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="url_trafficback">Ссылка на trafficback </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="url_trafficback" name="url_trafficback" value="{{old('url_trafficback')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="cookie_lifetime">Время жизни куки (в у.е.) </label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" id="cookie_lifetime" name="cookie_lifetime" value="{{old('cookie_lifetime')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="split_size">Размер сплита </label>
                    <div class="col-md-6">
                        <select class="form-control" name="split_size">
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                            <option value="1">5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="source_url">Источники трафика </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="source_url" name="source_url" value="{{old('source_url')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="project_domain">Домен проекта</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="project_domain" name="project_domain" value="{{old('project_domain')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="postback_url">Postback URL</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="postback_url" name="postback_url" value="{{old('postback_url')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="click_price">Цена клика (INT)L</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" id="click_price" name="click_price" value="{{old('click_price')}}">
                    </div>
                </div>
            </div>
            <footer class="panel-footer">
                <button class="btn btn-primary">Создать проект </button>
            </footer>
        </section>
        </form>
    </div>
@endsection