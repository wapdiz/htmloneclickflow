@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Просмотр проекта</h2>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-3">
                        <p>Name:</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$project['name']}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <p>Тема:</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$project_theme_name}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <p>Группа лендингов:</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$landing['name']}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <p>Trafficback URL:</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$project['url_trafficback']}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <p>Время жизни куки:</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$project['cookie_lifetime']}} Минут</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <p>Размер сплита:</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$project['split_size']}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <p>URL источника:</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$project['source_url']}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <p>Домен проекта:</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$project['project_domain']}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <p>Postback URL:</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$project['postback_url']}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <p>Цена клика</p>
                    </div>
                    <div class="col-md-6">
                        <p>{{$project['click_price']}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <a href="/projects/edit?id={{$project['project_id']}}">Редактировать</a>
                </div>
            </div>
        </section>
    </div>
@endsection