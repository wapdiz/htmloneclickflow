@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/admin/categories/store" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Редактировать категорию</h2>
                </header>
                <div class="panel-body">
                    {{--@foreach($errors->all() as $error)--}}
                    {{--<p style="color: #ff0000">{{$error}}</p>--}}
                    {{--@endforeach--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $category['category_id'] }}">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Название <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" value="{{$category['name']}}">
                        </div>
                    </div>
                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Сохранить категорию</button>
                </footer>
            </section>
        </form>
    </div>
@endsection