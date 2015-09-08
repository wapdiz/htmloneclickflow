
@foreach($customFilter['data'] as $key => $value)	
	
	<div style="display:inline-block;">

		@if($key != 'User')
			{{$customFilter['title'][$key]}}<br>
			<select id="customFilter_{{$name}}_{{$key}}" style="margin-right:20px; height:35px;padding:5px;">
			<option value="all">Все</option>

			@foreach($value as $value_1)
				<option value="{{$value_1[$customFilter['PKs'][$key]]}}">{{$value_1[$customFilter['nameColumnDisplay'][$key]]}}</option>
			@endforeach
			</select>
		@else
		
		@endif
	</div>
@endforeach