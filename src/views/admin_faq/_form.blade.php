        <form method="POST" action="/admin/faq/store" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>{{ isset($faq['id']) ? 'Редатировать FAQ' : 'Добавить FAQ' }}</h2>
                </header>
                <div class="panel-body">
                    {{--@foreach($errors->all() as $error)--}}
                    {{--<p style="color: #ff0000">{{$error}}</p>--}}
                    {{--@endforeach--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    @if(isset($faq['id']))
                    <input type="hidden" name="id" value="{{ $faq['id'] }}">
                    @endif

                    <div class="form-group" id="form-editor-element1">
                        <label class="col-md-3 control-label">Вопрос</label>
                        <div class="col-md-9">
                            <textarea class="summernote"  id="hidden-text-input2" name="question" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>
                                @if(isset($faq))
                                {!! $faq['question'] !!}
                                @endif
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group" id="form-editor-element2">
                        <label class="col-md-3 control-label">Ответ</label>
                        <div class="col-md-9">
                            <textarea class="summernote"  id="hidden-text-input2" name="answer" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>
                                @if(isset($faq))
                                {!! $faq['answer'] !!}
                                @endif
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="type">Тип</label>
                        <div class="col-md-6">                            
                            <input type="radio" name="public" value="1" @if(isset($faq['id'])) {{ $faq['public'] == 1 ? 'checked' : '' }} @else checked @endif>Публичный<Br>
                            <input type="radio" name="public" value="0" @if(isset($faq['id'])) {{ $faq['public'] == 0 ? 'checked' : '' }} @endif>Скрытый<Br>
                        </div>
                    </div>

                    <div class="form-group" id="faq_hidden_menu" style="display:none;">
                        <label class="col-md-3 control-label" for="type"></label>

                        @if(isset($faq['id']))
                        <div class="col-md-6">
                            Вставте в нужном месте значок всплывающей подсказки                             
                            <a data-toggle="modal" data-target="#hiddenFAQ" href="/faq/view/?id={{$faq['id']}}"><i class="fa fa-question-circle"></i></a>.
                            <br>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#hiddenFAQ_get_{{$faq['id']}}" href="#">Получить код</a>
                            <div style="display: none;" class="modal fade" id="hiddenFAQ_get_{{$faq['id']}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="defaultModalLabel">Код</h4>
                                        </div>
                                        <div class="panel-heading">
                                            &lt;a data-toggle="modal" data-target="#hiddenFAQ_{{$faq['id']}}" href="/faq/view/?id={{$faq['id']}}"&gt;&lt;i class="fa fa-question-circle"&gt;&lt;/i&gt;&lt;/a&gt;                        
                                            &lt;div style="display: none;" class="modal fade" id="hiddenFAQ_{{$faq['id']}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true"&gt;
                                                &lt;div class="modal-dialog"&gt;
                                                    &lt;div class="modal-content"&gt;
                                                    &lt;/div&gt;
                                                &lt;/div&gt;
                                            &lt;/div&gt;
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            После создания FAQ будет доступен код для его вставки в качестве всплывающей подсказки.
                        @endif
                    </div>

                    <div style="display: none;" class="modal fade" id="hiddenFAQ" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Сохранить FAQ</button>
                </footer>
            </section>
        </form>