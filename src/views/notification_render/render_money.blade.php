@foreach($money as $item)
    <li>
        @if($item['user_id'] != 0 )
            @if(isset($item['params']['credit']))
                <a href="/credits">
            @else
                <a href="/payment/last">
            @endif

        @else
            @if(isset($item['params']['credit']))
                <a href="/admin/credits">
            @else
                <a href="/admin/payments">
            @endif
        @endif
            <span class="title">
                {{$item['text']}}
            </span>
            <span class="message">
                {{$item['params']['type']}}
            </span>
        </a>
    </li>
@endforeach