@extends('simple-layout')

@section('content')
    <section class="body-sign">
        <div class="center-sign">
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
                </div>
                <div class="panel-body">
                    <form action="/password-change" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <div class="form-group mb-lg">
                            <label>Новый пароль</label>
                            <div class="input-group input-group-icon">
                                <input name="password" type="password" class="form-control input-lg">
                            </div>
                            @if($errors->any())
                                <span class="help-block" style="color:#ff0000">
                                    {{$errors->first()}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group mb-lg">
                            <label>Повторите</label>
                            <div class="input-group input-group-icon">
                                <input name="password2" type="password" class="form-control input-lg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Сохранить</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection