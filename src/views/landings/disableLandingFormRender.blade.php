
<input type="hidden" id="disableLandingId" name="disableLandingId" value="{{ $landingItem['id_land'] }}">

<div class="form-group mt-lg">
    <label class="col-sm-4 control-label">Заменить на лендинг</label>
    <div class="col-sm-8">
        <select class="form-control mb-md" id="disableLandingReplaceId" name="landing_id">
            <option value="0" @if($landingItem['replace_landing_id'] == 0) selected @endif >Не заменять</option>
            @foreach($landings as $landing)
                <option value="{{$landing['id_land']}}" @if($landingItem['replace_landing_id'] == $landing['id_land']) selected @endif >{{$landing['name']}}</option>
            @endforeach
        </select>
    </div>
</div>
