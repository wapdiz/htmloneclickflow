@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Кредитование</h2>
            </header>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-12">
                        <h2>Запросить кредит</h2>
                    </div>
                </div>

                <div class="alert alert-warning">Минимальное число подписок за день для оформления кредита: {{$credit_info['minimumAmountSubs']}}</div>
                <div class="alert alert-warning">Кредит можно брать один раз за определенный день</div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="button" @if($credit_info['subsToday'] > $credit_info['minimumAmountSubs']) enabled="1" @else enabled="0" @endif active="true" id="credit_info_button_today" class="mb-xs mt-xs mr-xs btn btn-primary">За сегодня</button>
                        <button type="button" @if($credit_info['subsYesterday'] > $credit_info['minimumAmountSubs']) enabled="1" @else enabled="0" @endif active="false" id="credit_info_button_yesterday" class="mb-xs mt-xs mr-xs btn btn-default">За вчера</button>
                        <span id="credit_info_today">Доступных для кредитования подписок: <strong>{{$credit_info['subsToday']}}</strong>
                            / Доступная сумма кредита: <strong>{{$credit_info['creditMoneyToday']/100}}</strong> рублей</span>
                        <span id="credit_info_yesterday" style="display: none;">Доступных для кредитования подписок: <strong>{{$credit_info['subsYesterday']}}</strong>
                            / Доступная сумма кредита: <strong>{{$credit_info['creditMoneyYesterday']/100}}</strong> рублей</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="date" id="credit_date_input" value="today">
                        <button type="button" @if($credit_info['subsToday'] < $credit_info['minimumAmountSubs']) disabled @endif id="credit_submit_button" class="mb-xs mt-xs mr-xs btn btn-success">Отправить заявку!</button>
                    </div>
                </div>

                <div id="error_msg" class="alert alert-danger" style="display: none;"></div>
                <div id="msg_success" class="alert alert-success" style="display: none;" >Отправлено!</div>


                <div id="last_credits_container">
                    {!! $credit_info['html_table'] !!}
                    {{--{{$credit_info['html_table']}}--}}
                </div>

            </div>
        </section>
    </div>
@endsection