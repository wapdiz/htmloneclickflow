@extends('simple-layout')

@section('content')
    <section class="body-sign">
        <div class="center-sign">
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Регистрация</h2>
                </div>
                <div class="panel-body">
                    <form action="/register" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        <div class="form-group mb-lg">
                            <label>Имя<span style="color: red" >*</span></label>
                            <input name="name" type="text" class="form-control input-lg" @if(isset($name)) value="{{$name}}" @endif>
                        </div>

                        <div class="form-group mb-lg">
                            <label>E-mail <span style="color: red" >*</span></label>
                            <input name="email" type="email" class="form-control input-lg" @if(isset($email)) value="{{$email}}" @endif >
                        </div>

                        <p style="padding-top: 10px" class="text-center">
                            Платежная информация
                        </p>

                        <div class="form-group mb-none">
                            <div class="row">
                                <div class="col-sm-6 mb-lg">
                                    <label>WMR <span style="color: red" >*</span> </label>
                                    <input name="WMR" type="text" class="form-control input-lg" pattern="[ZER]+[0-9]{12}"  @if(isset($WMR)) value="{{$WMR}}" @endif>
                                </div>
                                <div class="col-sm-6 mb-lg">
                                    <label>WMZ <span style="color: red" >*</span> </label>
                                    <input name="WMZ" type="text" class="form-control input-lg" pattern="[ZER]+[0-9]{12}" @if(isset($WMZ)) value="{{$WMZ}}" @endif >
                                </div>
                                <div class="col-sm-6 mb-lg">
                                    <label>WME <span style="color: red" >*</span> </label>
                                    <input name="WME" type="text" class="form-control input-lg" pattern="[ZER]+[0-9]{12}" @if(isset($WME)) value="{{$WME}}" @endif >
                                </div>
                            </div>
                        </div>

                        <p style="padding-top: 10px" class="text-center">
                            Контакты
                        </p>

                        <div class="form-group mb-lg input-group-icon" >
                            <label>Skype</label>
                            <input name="skype" type="text" class="form-control input-lg" @if(isset($skype)) value="{{$skype}}" @endif>
                        </div>

                        <div class="form-group mb-lg">
                            <label>Jabber</label>
                            <input name="jabber" type="text" class="form-control input-lg" @if(isset($jabber)) value="{{$jabber}}" @endif>
                        </div>

                        <div class="form-group mb-lg">
                            <label>ICQ</label>
                            <input name="icq" type="text" class="form-control input-lg" @if(isset($icq)) value="{{$icq}}" @endif>
                        </div>

                        <div class="form-group mb-lg">
                            <label>Номер телефона</label>
                            <input name="phone" type="text" class="form-control input-lg" @if(isset($phone)) value="{{$phone}}" @endif >
                        </div>

                        <div class="form-group mb-none">
                            <div class="row">
                                <div class="col-sm-6 mb-lg">
                                    <label>Пароль <span style="color: red" >*</span> </label>
                                    <input name="password" type="password" class="form-control input-lg">
                                </div>
                                <div class="col-sm-6 mb-lg">
                                    <label>Подтверждение пароля <span style="color: red" >*</span> </label>
                                    <input name="password_confirmation" type="password" class="form-control input-lg">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="AgreeTerms" name="agreeterms" type="checkbox">
                                    <label for="AgreeTerms">Я согласен с <a href="#">правилами</a></label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Зарегистрироваться</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
                            </div>
                        </div>

                        <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                            <span></span>
                        </span>

                        {{--<div class="mb-xs text-center">--}}
                            {{--<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>--}}
                            {{--<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>--}}
                        {{--</div>--}}

                        <p style="padding-top: 10px" class="text-center">
                            Уже зарегистрированы? <a href="/auth">Войдите!</a>
                        </p>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-md mb-md">© Copyright 2014. All Rights Reserved.</p>
        </div>
    </section>

@endsection