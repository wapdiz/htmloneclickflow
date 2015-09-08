@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/payment/store_request" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Запросить выплату</h2>
                </header>
                <div class="panel-body">
                    {{--@foreach($errors->all() as $error)--}}
                    {{--<p style="color: #ff0000">{{$error}}</p>--}}
                    {{--@endforeach--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="{{ $currentUser['id'] }}">

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <div>
                        <p>Выплаты совершаются при балансе более {{$minMaxPaymentValues['min_balance_payment_rub']/100}} рублей,
                            {{$minMaxPaymentValues['min_balance_payment_usd']/100}} USD, {{$minMaxPaymentValues['min_balance_payment_eur']/100}} EUR.
                        </p>
                    </div>
                    <div>
                        <p>
                            Минимальная сумма выплаты - {{$minMaxPaymentValues['min_payment_rub']/100}} рублей,
                            {{$minMaxPaymentValues['min_payment_usd']/100}} USD, {{$minMaxPaymentValues['min_payment_eur']/100}} EUR.
                        </p>
                    </div>
                    <div>
                        <p>
                            Максимальная сумма выплаты - {{$minMaxPaymentValues['max_percent_payment']}}% от Вашего баланса
                            ({{(($currentUser['balance_rub']*($minMaxPaymentValues['max_percent_payment']/100))/100)^0}} рублей,
                             {{(($currentUser['balance_usd']*($minMaxPaymentValues['max_percent_payment']/100))/100)^0}} USD,
                             {{(($currentUser['balance_eur']*($minMaxPaymentValues['max_percent_payment']/100))/100)^0}} EUR)
                        </p>
                    </div>
                    <div>
                        <p class="text-warning">
                            Запрошенная сумма вычтется из Вашего баланса до принятия решения о выплате.
                        </p>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="value">Сумма <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="value" name="value">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="theme">Валюта <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="currency" id="currency">
                                    <option value="1">Российский рубль</option>
                                    <option value="2">Американский доллар</option>
                                    <option value="3">Евро</option>
                            </select>
                        </div>
                    </div>

                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Запросить</button>
                </footer>
            </section>
        </form>
    </div>
@endsection