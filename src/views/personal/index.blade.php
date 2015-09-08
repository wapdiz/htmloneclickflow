@extends('main-layout')
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-12 col-xl-6">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-primary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Подписки за сегодня</h4>
                                        <div class="info">
                                            <strong class="amount">{{$subs_today}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-tertiary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-tertiary">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Ребиллы</h4>
                                        <div class="info">
                                            <strong class="amount">{{$rebills_today}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-quartenary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-quartenary">
                                        <i class="fa  fa-money"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Заработано за день</h4>
                                        <div class="info">
                                            <strong class="amount"><i class="fa fa-rub"></i> {{$money_partner['rub']/100}}</strong><br>
                                            <strong class="amount"><i class="fa fa-usd"></i> {{$money_partner['usd']/100}}</strong><br>
                                            <strong class="amount"><i class="fa fa-eur"></i> {{$money_partner['eur']/100}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-secondary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-secondary">
                                        <i class="fa fa-usd"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Баланс</h4>
                                        <div class="info">
                                            <strong class="amount"><i class="fa fa-rub"></i> {{$currentUser['balance_rub']/100}}</strong><br>
                                            <strong class="amount"><i class="fa fa-usd"></i> {{$currentUser['balance_usd']/100}}</strong><br>
                                            <strong class="amount"><i class="fa fa-eur"></i> {{$currentUser['balance_eur']/100}}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-12 col-xl-6" id="plot_container">
            <section class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="flot-container">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @foreach($news as $item)
        <div class="col-md-6">
            <section class="panel">
                <header class="panel-heading">

                    <h2 class="panel-title">{{$item['title']}}</h2>
                    <p class="panel-subtitle">{{$item['created_at']}}</p>
                </header>
                <div class="panel-body">
                    {!! $item['body'] !!}
{{--                    {{$item['body']}}--}}
                </div>
            </section>
        </div>
        @endforeach


@endsection