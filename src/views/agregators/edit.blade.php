@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/admin/agregators/store" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Редактирование платежного агрегатора {{$agregator['name']}}</h2>
                </header>
                <div class="panel-body">
                    {{--@foreach($errors->all() as $error)--}}
                    {{--<p style="color: #ff0000">{{$error}}</p>--}}
                    {{--@endforeach--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$agregator['agregator_id']}}">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Название <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{$agregator['name']}}">
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="subs">Параметры (сразу в json)</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="subs" rows="3" >{{$agregator['subs']}}</textarea>
                        </div>
                    </div>
                    -->

                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Сохранить</button>
                </footer>
            </section>
        </form>
    </div>
@endsection