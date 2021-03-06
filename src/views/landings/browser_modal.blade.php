
@extends('popup-layout')
	
@section('content')

<div class="form-group">	
	<div class="col-md-3">

		{{($loop = 1) ? '' : '' }}
		@foreach($browserList as $key => $value)

			@if($loop % 10 == 0)
				</div>
				<div class="col-md-3">
			@endif

			<div class="checkbox">		

				<label class="control-label">
					<input type="checkbox" class="browserCheckbox" name="browserCheckbox" value="{{$value['browser_id']}}"> {{$value['name']}}
				</label>
			
			</div>

		{{$loop++ ? '' : '' }}
		@endforeach

	</div>
</div>

@endsection