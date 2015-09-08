@extends('popup-layout')
	
@section('content')


@if(count($landings) > 0)
<div id="owl-carousel" data-plugin-carousel
	data-plugin-options='{ "autoPlay": 3000, "items": 6, "itemsDesktop": [1199,4], "itemsDesktopSmall": [979,3], "itemsTablet": [768,2], "itemsMobile": [479,1] }'>
	@foreach($landings as $key => $value)
		<div class="item spaced landingImage" id="landing_wrapper_{{$value['id_land']}}" id_land="{{$value['id_land']}}" style="z-index:3;">
			<img style="cursor:pointer;" class="img-thumbnail" src="/files/landImages/{{$value['img_name']}}" alt="{{$value['name']}}">
			<div style="text-align:center;"><a target="blank" href="{{$value['land_url']}}">{{$value['name']}}</a></div>
		</div>
	@endforeach
</div>
@else
	Нет лендингов по этим условиям.
@endif
<input type="hidden" id="operator_id_for_landings" value="{{$id_operator}}">

@endsection