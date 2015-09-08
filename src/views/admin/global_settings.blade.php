@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/admin/global_settings/store" class="form-horizontal form-bordered">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Глобальные настройки</h2>
                </header>
                <div class="panel-body">
                    <div class="form-group" >
                        <label class="col-md-3 control-label" for="global_allocation">Процент выплат</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="global_allocation" value="{{$global_settings['global_allocation']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="session_duration">Длина сессии</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="session_duration" value="{{$global_settings['session_duration']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="tb_url">Глобальный трафикбек</label>
                        <div class="col-md-6">
                            <input type="url" class="form-control" name="tb_url" value="{{$global_settings['global_tb_url']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="global_ref_allocation">Глобальные отчисления рефоводам</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="global_ref_allocation" value="{{$global_settings['global_ref_allocation']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="min_payment_rub">Минимальная выплата в рублях <br><span style="color: red">Деньги в "копейках"!</span> </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="min_payment_rub" value="{{$global_settings['min_payment_rub']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="min_payment_usd">Минимальная выплата в USD <br><span style="color: red">Деньги в "копейках"!</span> </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="min_payment_usd" value="{{$global_settings['min_payment_usd']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="min_payment_eur">Минимальная выплата в EUR <br><span style="color: red">Деньги в "копейках"!</span> </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="min_payment_eur" value="{{$global_settings['min_payment_eur']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="max_percent_payment">Максимальный процент запрашиваемой выплаты </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="max_percent_payment" value="{{$global_settings['max_percent_payment']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="min_balance_payment_rub">Минимальный баланс для выплаты в рублях<br><span style="color: red">Деньги в "копейках"!</span> </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="min_balance_payment_rub" value="{{$global_settings['min_balance_payment_rub']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="min_balance_payment_usd">Минимальный баланс для выплаты в USD<br><span style="color: red">Деньги в "копейках"!</span> </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="min_balance_payment_usd" value="{{$global_settings['min_balance_payment_usd']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="min_balance_payment_eur">Минимальный баланс для выплаты в EUR<br><span style="color: red">Деньги в "копейках"!</span> </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="min_balance_payment_eur" value="{{$global_settings['min_balance_payment_eur']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="regular_payment_percent">Процент формируемых регулярных выплат </label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="regular_payment_percent" value="{{$global_settings['regular_payment_percent']}}">
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