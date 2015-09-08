@extends('main-layout')
@section('content')

                <div class="row" style="margin: 20px">
                    <div class="col-lg-12">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                    {{--Само тело, комеентарии ниже--}}
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="panel-title">
                                {{$ticket[0]['name']}}
                            </p>
                        </div>
                        <div class="panel-body">
                            <p>{{$ticket[0]['body']}}</p>
                        </div>
                        <div class="panel-footer">
                            <p class="m-none">Пользователь: {{$ticket[0]['name']}}. <small> {{$ticket[0]['create_date']}}</small></p>
                            @if(isset($ticket[0]['attach_link']))
                            <p class="m-none">
                                    <a href="/files/UserFiles/{{$ticket[0]['attach_link']}}">Скачать прикрепленный файл</a>
                            </p>
                            @endif
                        </div>
                    </div>
                    {{--Должны пойти комментарии сюда--}}
                    @foreach($comments as $comment)
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="panel-title">
                                {{$comment['name']}}
                            </p>
                        </div>
                        <div class="panel-body">
                            <p>{{$comment['body']}}</p>
                        </div>
                        <div class="panel-footer">
                            <p class="m-none">Пользователь: {{$comment['name']}}. <small> {{$comment['create_date']}}</small></p>
                            @if($comment['attach_link'] != '')
                            <p class="m-none"><a href="/files/UserFiles/{{$comment['attach_link']}}">Скачать прикрепленный файл</a></p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div class="panel" id="panel_textarea">
                        <form action="/tickets/save" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" id="ticket_id" value="{{$ticket[0]['ticket_id']}}">
                            <div class="panel-heading">
                                <p class="panel-title">
                                    Оставить комментарий
                                </p>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-md-12">
                                    <textarea name="commentText" id="comment_text_area" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-md-3 control-label" for="ticketStatus">Перевести в статус: </label>
                                    {{--Подгружать из базы--}}
                                    <div class="col-md-6">
                                        <select class="form-control mb-md" id="ticketStatus" name="ticketStatus">
                                            <option value="0">Не переводить</option>
                                            @if($admin == 1)
                                            <option value="1">Новый</option>
                                            <option value="2">На рассмотрении</option>
                                            <option value="3">Поступил ответ</option>
                                            @endif
                                            <option value="4">Решено</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label col-md-3" for="inputFile">Прикрепить файл</label>
                                    <div class="col-md-6">
                                        <input type="file" name="inputFile" id="inputFile" style="margin-top: 5px; margin-bottom: 12px" />
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-primary send_button" id="submit_comment">Отправить </button>
                            </div>
                        </form>


                    </div>
                    </div>
                </div>

@endsection