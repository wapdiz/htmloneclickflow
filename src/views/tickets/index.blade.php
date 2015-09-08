@extends('main-layout')
@section('content')
    <div id="mailbox-email-list" class="mailbox-email-list">
        <div class="nano">
            <div class="nano-content">
                <ul id="" class="list-unstyled">
                    @if(isset($tickets))
                        @foreach($tickets as $ticket)
                        <li @if((($ticket['unread'] === 'user') && !$currentUser['is_admin']) || (($ticket['unread'] === 'admin') && $currentUser['is_admin'])) class="unread" @endif>
                            <a href="/tickets/view?id={{$ticket['ticket_id']}}">
                                {{--Лейбл тоже формироваться от тайпа--}}
                                <i class="mail-label" style="border-color: {{$ticket_types[$ticket['type']-1]['ticket_type_color']}}"></i>

                                <div class="col-sender">
                                    {{--<div class="checkbox-custom checkbox-text-primary ib">--}}
                                        {{--<input type="checkbox" id="mail2">--}}
                                        {{--<label for="mail2"></label>--}}
                                    {{--</div>--}}
                                    <p class="m-none ib">{{$ticket['last_answer_by']}}</p>
                                </div>
                                <div class="col-mail">
                                    <p class="m-none mail-content">
                                        <span class="subject">{{$ticket['header']}}</span>
                                    </p>
                                    <p class="m-none mail-date">{{$ticket['create_date']}}</p>
                                </div>
                                {{--Добавить статус!--}}
                            </a>
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>

@endsection

