@extends('simple-layout')

@section('content')
    <section class="body-sign">
        <div class="center-sign">
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
                </div>
                <div class="panel-body">
                    <form action="/password-restore" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group mb-lg">
                            <label>E-mail, указанный при регистрации</label>
                            <div class="input-group input-group-icon">
                                <input name="email" type="email" class="form-control input-lg">
                                @if($errors->any())
                                <span class="help-block" style="color:#ff0000">
                                    {{$errors->first()}}
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Восстановить</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection