
<input type="hidden" id="replaceFormLandingId" name="replaceFormLandingId" value="{{ $replaceLanding['id_land'] }}">

<div class="form-group mt-lg">
    <label class="col-sm-4 control-label">Заменить на лендинг</label>
    <div class="col-sm-8">
        <select class="form-control mb-md" id="replaceFormLandingForReplace" name="landing_id">
            @foreach($landings as $landing)
                <option value="{{$landing['id_land']}}" @if($landing['id_land'] == $replaceLanding['replace_landing_id']) selected @endif >{{$landing['name']}}</option>
            @endforeach
        </select>
    </div>
</div>
