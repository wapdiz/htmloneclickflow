@extends('main-layout')
@section('content')
    <div class="col-lg-12">
        <form class="form-horizontal form-bordered" method="post" action="/tickets/create" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">
                        Создать новый тикет
                    </h2>
                </header>
                <div class="panel-body">

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="ticketType">Выберите тип обращения</label>
                        {{--Подгружать из базы--}}
                        <div class="col-md-6">
                            <select class="form-control mb-md" id="ticketType" name="ticketType">
                                <option value="1">Общий</option>
                                <option value="2">Технический</option>
                                <option value="3">Финансовый</option>
                                <option value="4">Жалобы</option>
                                <option value="5">Пожелания и предложения</option>
                                <option value="6">Улучшение системы</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="recipient">Выберите пользователя</label>
                        {{--Подгружать из базы--}}
                        <div class="col-md-6">
                            <select class="form-control mb-md" id="recipient" name="recipient">
                                @foreach($users as $user)
                                    <option value="{{$user['id']}}">{{$user['email']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3" for="ticketHeader">Заголовок обращения</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="ticketHeader" name="ticketHeader"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="ticketText">Текст обращения</label>
                        <div class="col-md-6">
                            <textarea class="form-control" rows="5" id="ticketText" name="ticketText" placeholder="Введите текст обращения"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="inputFile">Прикрепить файл</label>
                        <div class="col-md-6">
                            <input type="file" name="inputFile" id="inputFile" style="margin-top: 5px; margin-bottom: 12px" />
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary send_button">Отправить </button>
                </footer>
            </section>
        </form>
    </div>
@endsection