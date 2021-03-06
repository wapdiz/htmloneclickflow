@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/projects/edit" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Редактирование проекта {{$project['name']}}</h2>
                </header>
                <div class="panel-body">
                    @foreach($errors->all() as $error)
                        <p style="color: #ff0000">{{$error}}</p>
                    @endforeach
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$project['project_id']}}">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Название проекта<span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{$project['name']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="theme">Укажите тему из списка<span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="theme" id="theme_option">
                                <option value="custom">Ввести самостоятельно</option>
                                @foreach($project_themes as $theme)
                                    <option @if($theme['name'] == $project_theme_name) selected @endif value="{{$theme['theme_id']}}">{{$theme['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="userThemeContainer" style="display: none">
                        <label class="col-md-3 control-label" for="userTheme">Тема</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="userTheme" name="userTheme">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="landing">Landing: </label>
                        <div class="col-md-6">
                            <select class="form-control" name="landing" id="landing">
                                @foreach($landing_group as $group)
                                    <option @if($group['id'] == $landing) selected @endif value="{{$group['id']}}">{{$group['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="trafficback ">Ссылка на trafficback </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="trafficback " name="trafficback " value="{{$project['url_trafficback']}}"}}>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="cookie_lifetime">Время жизни куки (в у.е.) </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="cookie_lifetime" name="cookie_lifetime" value="{{$project['cookie_lifetime']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="split_size">Размер сплита </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="split_size" name="split_size" value="{{$project['split_size']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="source_url">Источники трафика </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="source_url" name="source_url" value="{{$project['source_url']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="project_domain">Домен проекта</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="project_domain" name="project_domain" value="{{$project['project_domain']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="postback_url">Postback URL</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="postback_url" name="postback_url" value="{{$project['postback_url']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="click_price">Цена клика (INT)</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="click_price" name="click_price" value="{{$project['click_price']}}">
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Изменить</button>
                </footer>
            </section>
        </form>
    </div>
@endsection