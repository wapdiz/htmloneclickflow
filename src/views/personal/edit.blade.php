@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                Редактирование пользователя {{$currentUser['name']}}
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="post" action="/myinfo/edit" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$currentUser['id']}}">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Имя</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{$currentUser['name']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="password">Пароль</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="password_confirmation">Подтверждение пароля</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="inputFile">Загрузить аватар</label>
                        <div class="col-md-6">
                            <input type="file" name="inputFile" id="inputFile" style="margin-top: 5px; margin-bottom: 12px" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary col-md-3 offset6">Сохранить</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection