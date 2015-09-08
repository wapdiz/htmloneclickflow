@foreach($stream as $item)
    <li>
        <a href="/streams/show?id={{$item['params']['stream_id']}}&readed=1">
            <span class="title">
                {{$item['text']}}
            </span>
            <span class="message">
                {{$item['params']['status']}}
            </span>
        </a>
    </li>
@endforeach