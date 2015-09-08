@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                Редактирование пользователя {{$user[0]['name']}}
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" method="post" action="/admin/users/edit">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$user[0]['id']}}">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{$user[0]['name']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email">E-Mail</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" name="email" value="{{$user[0]['email']}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="wmz">WMZ</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="wmz" name="wmz" value="{{$user[0]['wmz']}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="wmr">WMR</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="wmr" name="wmr" value="{{$user[0]['wmr']}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="wme">WME</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="wme" name="wme" value="{{$user[0]['wme']}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="skype">skype</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="skype" name="skype" value="{{$user[0]['skype']}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="jabber">jabber</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="jabber" name="jabber" value="{{$user[0]['jabber']}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="icq">icq</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="icq" name="icq" value="{{$user[0]['icq']}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="phone">Телефон</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$user[0]['phone']}}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="money_allocation">Процент отчислений</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="money_allocation" name="money_allocation" value="{{$user[0]['money_allocation']}}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="">Статус</label>
                        <div class="col-md-6">
                            <select class="form-control mb-md" name="status">
                                <option value="active">Активен</option>
                                <option value="locked">Заблокирован</option>
                                <option value="banned">Забанен</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label" for="password">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="password">Показывать полную статистику?</label>
                        <div class="col-md-6">
                            <select id="full_stat" name="full_stat">
                                <option value="0" @if($user[0]['full_stat'] == 0) selected @endif>Нет</option>
                                
                                <option value="1" @if($user[0]['full_stat'] == 1) selected @endif>Да</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary col-md-3 offset6">Изменить</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection