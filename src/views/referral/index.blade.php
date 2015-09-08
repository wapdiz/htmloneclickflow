@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>Список рефералов</h2>
            </header>
            <div class="panel-body">
                <p>Ваша реферральная ссылка: {{$referral_link}}</p>
                @if(count($referrals)!=0)
                <div class="table-responsive" col-md-12>
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>E-mail</th>
                            <th>Действия</th>
                            <th>Заработано, рублей</th>
                            <th>Заработано, USD</th>
                            <th>Заработано, EURO</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($referrals as $referral)
                            <tr>
                                <td>{{$referral['referral_id']}}</td>
                                <td>
                                    {{$referral['name']}}
                                </td>
                                <td>{{$referral['email']}}</td>
                                <td>
                                    <a href="#">
                                        Можно что то сделать с ним
                                    </a>
                                </td>
                                <td>{{$referral['rub']/100}}</td>
                                <td>{{$referral['usd']/100}}</td>
                                <td>{{$referral['eur']/100}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <div class="alert alert-warning">
                        У Вас пока нет рефералов!
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection