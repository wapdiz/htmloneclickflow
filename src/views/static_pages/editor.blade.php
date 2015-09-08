<div class="form-group" id="form-editor-element">
    <label class="col-md-3 control-label">Текст статьи</label>
    <div class="col-md-9">
        <div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>
            @if(isset($article))
            {!! $article['body'] !!}
            @endif
        </div>
        <input type="hidden" id="hidden-text-input" value="" name="body"/>
    </div>
</div>
