@extends('simple-layout')

@section('content')
    <section class="body-sign">
        <div class="center-sign">
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Вход</h2>
                </div>
                <div class="panel-body">
                    <form action="/auth" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif

                        @if(isset($status))
                            <div class="alert alert-success">
                                {{$status}}
                            </div>
                        @endif

                        <div class="form-group mb-lg">
                            <label>E-mail</label>
                            <div class="input-group input-group-icon">
                                <input name="email" type="email" class="form-control input-lg">
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <div class="clearfix">
                                <label class="pull-left">Пароль</label>
                                <a href="/lost-password" class="pull-right">Забыли пароль?</a>
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password" type="password" class="form-control input-lg">
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                            </div>
                        </div>

                        @if($captchaFlag == true)
                        <div class="row">
                            <input type="hidden" name="needCaptcha" value="1">
                            <div class="g-recaptcha" style="margin-left: 15px;" data-sitekey="6LfU4AkTAAAAAI1D2WOQlb9iOxs01WFfYXffAVG5"></div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="RememberMe" name="rememberme" type="checkbox">
                                    <label for="RememberMe">Запомнить меня</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Войти</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Войти</button>
                            </div>
                        </div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>Или</span>
							</span>

                        {{--<div class="mb-xs text-center">--}}
                            {{--<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>--}}
                            {{--<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>--}}
                        {{--</div>--}}

                        {{-- <p class="text-center">Не зарегистрированы? <a href="/register">Создать учетную запись!</a></p> --}}


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection