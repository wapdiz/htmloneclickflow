@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <form method="POST" action="/admin/landings/group/store" id="landing-form" class="form-horizontal form-bordered">
                <header class="panel-heading">
                    <h2>Добавить группу лендингов</h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title">Название <span style="color:#ff0000">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="weight">Вес <span style="color:#ff0000">*</span></label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="weight" name="weight">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="landing">Отметить лендинги <span style="color:#ff0000">*</span></label>
                            <div class="col-md-6">
                                @foreach($landings as $landing)
                                    <input type="checkbox" name="landing[{{$landing['id']}}]" value="{{$landing['id']}}">{{$landing['name']}}<Br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button>Создать</button>
                </footer>
            </form>
        </section>
    </div>
@endsection