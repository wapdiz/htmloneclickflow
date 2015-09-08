@foreach($landings as $landing)
    <tr>
        <td>{{$landing['id_land']}}</td>
        <td> <a class="landing_name" land_img="{{$landing['img_name']}}" href="">{{$landing['name']}}</a></td>
        <td>
            {{ $countrys[$landing['id_country']]['name'] }}
        </td>
        <td landing_id="{{$landing['id_land']}}">
            @if($landing['disabled'] == 1)
                <span class="label label-danger">Выключен</span>
            @else
                <span class="label label-success">Включен</span>
            @endif
        </td>
        <td>
            {{ $operators[$landing['id_operator']]['name'] }}
        </td>
        <td>
            {{ $categories[$landing['id_category']]['name'] }}
        </td>
        <td>
            {{ $agregators[$landing['id_agregator']]['name'] }}
        </td>
        <td>
            {{ $landing['abonent_price'] / 100 }}
            @if($landing['currency'] == 1)
                Рублей
            @elseif($landing['currency'] == 2)
                USD
            @elseif($landing['currency'] == 3)
                EUR
            @endif
        </td>
        <td>{{$landing['land_url']}}</td>
        <td>
            <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/landings/edit?id={{$landing['id_land']}}">Редактировать</a>


            <a class="mb-xs mt-xs mr-xs btn btn-success landing_enable_button" style="display: @if($landing['disabled'] == 1) inline-block @else none @endif" href="#" landing_id="{{$landing['id_land']}}">Включить</a>
            <a class="mb-xs mt-xs mr-xs btn btn-danger landing_disabled_button" style="display: @if($landing['disabled'] == 1) none @else inline-block @endif" href="#" landing_id="{{$landing['id_land']}}">Выключить</a>

            <a class="mb-xs mt-xs mr-xs btn btn-info landing_replace_button" href="#replaceLandingModal" landing_id="{{$landing['id_land']}}">Заменить</a>

            <a class="mb-xs mt-xs mr-xs modal-basic btn btn-danger landing_delete" landing_id="{{$landing['id_land']}}" href="#">Удалить</a>
        </td>
    </tr>
@endforeach