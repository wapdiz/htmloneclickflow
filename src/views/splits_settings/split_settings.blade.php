@extends('popup-layout')
	
@section('content')
<div>
    <div class="form-group" id="type_redirect">     
        <input type="hidden" id="splitNumberHidden" value="{{$splitNumber}}">   
        <div class="col-md-3">
        	<label class="control-label">Тип редиректа</label>
            <div class="radio">
                <label>
                    <input type="radio" name="redirect_type" class="redirect_type" value="0"   checked >
                    Как в потоке
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="redirect_type" class="redirect_type" value="1"ё >
                    Прямой
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="redirect_type" class="redirect_type" value="2" >
                    Кликандер
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="redirect_type" class="redirect_type" value="3" >
                    Блайнд
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="redirect_type" class="redirect_type" value="4"  >
                    Баннер
                </label>
            </div>
        </div>

        <div class="col-md-3">
        	<label class="control-label">Тип устройства</label>
            <div class="checkbox">
                @foreach($device_types as $value)
                    <label><input type="checkbox" class="device_type" name="device_type[]" checked="checked" value="{{$value['id']}}"/>{{$value['name']}}</label><br>
                @endforeach
            </div>
        </div>

        <div class="col-md-3">
        	<label class="control-label">ОС</label>
            <div class="radio">
                <label>
                    <input type="radio" name="os" class="os" value="all" checked >
                    Все
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="os" class="os" value="equal" >
                    Совпадает
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="os" class="os" value="not_equal" >
                    Исключает
                </label>
            </div>

            <input type="hidden" id="osIdsStorage">
            <input type="hidden" id="osLastState">            
        </div>

        <div class="col-md-3">
        	<label class="control-label">Браузер</label>
            <div class="radio">
                <label>
                    <input type="radio" name="browser" class="browser" value="all" checked >
                    Все
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="browser" class="browser" value="equal" >
                    Совпадает
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="browser" class="browser" value="not_equal" >
                    Исключает
                 </label>
             </div>

            <input type="hidden" id="browserIdsStorage">
            <input type="hidden" id="browserLastState">
        </div>
    </div>
<div>
<div class="panel-body">
    <input type="hidden" value="" id="landingIdsStorage">
	<div class="table-responsive">
		<table class="table table-bordered mb-none">
			<thead>
				<tr>
					<th>Страны</th>
					<th>Операторы</th>
				</tr>
			</thead>
			<tbody>               

				@foreach($operatorsAndCountries as $key => $value)
					<tr>
						<td>{{$value['country_name']}}</td>
						<td>
							@foreach($value['data'] as $key_1 => $value_1)								
								<button splitId="{{$splitNumber}}"
									id="splitNumber_{{$splitNumber}}"
                                    id_operator="{{$value_1['operator_id']}}"
                                    id_country="{{$value_1['country_id']}}"
									class="btn btn-primary openLandings"
									style="margin-top:15px;">{{$value_1['operator_name']}}</button>
                                    
                                <input type="hidden" class="operatorLandingsStorage" id_operator="{{$value_1['operator_id']}}"  value="" id="landingIdsStorageByOperatorId_{{$value_1['operator_id']}}">
                                <span id="count_landings_operator_id_{{$value_1['operator_id']}}" id_operator="{{$value_1['operator_id']}}" class="count_landings"></span>
							@endforeach
						</td>
					</tr>
				@endforeach
                
			</tbody>
		</table>
	</div>

    <style>
    .show_count_landings{
        display:inline-block !important;
    }
    .hide_count_landings{
        display:none;
    }
    .count_landings{
        margin-left:-15px;
        background: #0088cc;
        border-radius: 50%;
        height: 25px;
        width: 25px;      
        display:none;
        background: -webkit-radial-gradient(10px 10px, circle, #fff, #27C400);
        background: -moz-radial-gradient(10px 10px, circle, #fff,  #27C400);
        background: radial-gradient(10px 10px, circle, #fff,  #27C400);

        padding-left:9px;
        padding-top:3px;
    }
    </style>
</div>
@endsection