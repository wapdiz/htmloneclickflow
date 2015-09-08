@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>FAQ</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Вопрос</th>
                            <th>Ответ</th>
                            <th>Тип</th>
                            <th>Код</th>                          
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faqs as $item)
                            <tr>
                                <td>{{$item['id']}}</td>
                                <td>{!!$item['question']!!}</td>
                                <td>{!!$item['answer']!!}</td>
                                <td>{{$item['public'] == 1 ? 'публичный' : 'скрытый'}}</td>
                                <td>
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#hiddenFAQ_get_{{$item['id']}}" href="#">Получить</a>
                                    <div style="display: none;" class="modal fade" id="hiddenFAQ_get_{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="defaultModalLabel">Код</h4>
                                                </div>
                                                <div class="panel-heading">
                                                    &lt;a data-toggle="modal" data-target="#hiddenFAQ_{{$item['id']}}" href="/faq/view/?id={{$item['id']}}"&gt;&lt;i class="fa fa-question-circle"&gt;&lt;/i&gt;&lt;/a&gt;                        
                                                    &lt;div style="display: none;" class="modal fade" id="hiddenFAQ_{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true"&gt;
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
                                </td>
                                <td>
                                    {{--<a href="/admin/faq/delete?id={{$item['id']}}">Удалить</a><br>--}}
                                    {{--<a href="">Редактировать</a><br>--}}
                                    <a class="mb-xs mt-xs mr-xs modal-basic btn btn-primary" href="/admin/faq/edit?id={{$item['id']}}">Редактировать</a>
                                    <a class="mb-xs mt-xs mr-xs btn btn-danger faq_delete" faq_id="{{$item['id']}}" href="#">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="panel-footer">
                <a class="mb-xs mt-xs mr-xs btn btn-primary" href="/admin/faq/new">Добавить</a><br>
            </footer>
        </section>
    </div>

    <div class="modal fade" id="faqSettingsModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="splitsSettingModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="faqSettingModalLabel">Удалить запись?</h4>
                </div>
                <div id="faqSettingContent" class="modal-body">
                    <div class="alert alert-danger" id="error-ajax" style="display: none">
                        Ошибка!
                    </div>
                    <form action="">
                        <input type="hidden" id="faqToken" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="faq_id_input" name="faq_id"/>
                        <button type="button" class="btn btn-default" id="faqSettingsClose">Закрыть</button>
                        <button type="button" class="btn btn-primary" id="faqSplitSettings">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection