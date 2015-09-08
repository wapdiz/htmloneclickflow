@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/admin/route_settings/store" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Добавить настройку</h2>
                </header>
                <div class="panel-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="type">Тип настройки <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="type">
                                <option value="os" >Операционная система</option>
                                {{--<option value="device_type" >Тип устройства</option>--}}
                                <option value="vendor" >Производитель</option>
                                <option value="browser" >Браузер</option>
                                {{--<option value="opsos" >Оператор</option>--}}
                                {{--<option value="country" >Страна</option>--}}
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Название <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="">
                        </div>
                    </div>


                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Добавить </button>
                </footer>
            </section>
        </form>
    </div>
@endsection