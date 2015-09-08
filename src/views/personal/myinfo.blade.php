@extends('main-layout')
@section('content')
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        {{--<a href="#" class="fa "></a>--}}
                        {{--<a href="#" class="fa "></a>--}}
                    </div>

                    <h2 class="panel-title">Профиль пользователя {{$currentUser['name']}}</h2>
                </header>
                <div class="panel-body">

                    <p>Name: {{$currentUser['name']}}</p>
                    <p>E-mail: {{$currentUser['email']}}</p>

                    @if($currentUser['status'] == 'active') <p>Статус: Активный</p> @endif
                    @if($currentUser['status'] == 'locked') <p>Статус: Заблокирован</p> @endif
                    @if($currentUser['status'] == 'banned') <p>Статус: Забанен</p> @endif

                    <p>WMZ: Z{{$currentUser['wmz']}}</p>
                    <p>WMR: R{{$currentUser['wmr']}}</p>

                    <p>skype: {{$currentUser['skype']}}</p>
                    <p>jabber: {{$currentUser['jabber']}}</p>
                    <p>icq: {{$currentUser['icq']}}</p>
                    <p>Телефон: {{$currentUser['phone']}}</p>



                    @if($currentUser['is_admin'] == 1)
                        <p>Роль: Администратор</p>
                    @else
                        <p>Роль: Пользователь</p>
                    @endif
                    <p><a href="/myinfo/edit">Редактировать профиль</a></p>
                </div>
            </section>

            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        {{--<a href="#" class="fa "></a>--}}
                        {{--<a href="#" class="fa "></a>--}}
                    </div>

                    <h2 class="panel-title">Список последних авторизаций</h2>
                </header>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table mb-none">
                            <thead>
                            <tr>
                                <th>IP</th>
                                <th>OC</th>
                                <th>Дата и время</th>
                            </tr>
                            </thead>
                            <tbody id="tbody_container">
                            @foreach($lastLogin as $item)
                                <tr>
                                    <td>{{$item['ip']}}</td>
                                    <td>{{$item['os']}}</td>
                                    <td>{{$item['datetime']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
@endsection