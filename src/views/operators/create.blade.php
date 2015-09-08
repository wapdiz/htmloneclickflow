@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <form method="POST" action="/admin/operators/store" id="operator-form" class="form-horizontal form-bordered">
            <section class="panel">
                <header class="panel-heading">
                    <h2>Добавить оператора</h2>
                </header>
                <div class="panel-body">

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif


                    {{--@foreach($errors->all() as $error)--}}
                    {{--<p style="color: #ff0000">{{$error}}</p>--}}
                    {{--@endforeach--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Название <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="theme">Страна <span style="color:#ff0000">*</span></label>
                        <div class="col-md-6">
                            <select class="form-control" name="country" id="country">
                                @foreach($country as $item)
                                    <option value="{{$item['country_id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label" for="theme">Тип ввода диапазонов</label>
                        <div class="col-md-6">

                            <div class="radio">
                                <label>
                                    <input type="radio" name="ip_type" class="ip_type" value="gamut"  checked >
                                    Диапазоны IP
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="ip_type" class="ip_type" value="cidr" >
                                    Диапазоны через CIDR нотацию
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="ip">
                            <span id="ip_mask_label" style="display:none;">Диапазоны IP адресов в CIDR нотации<span style="color:#ff0000">*</span> <br> (формат 85.115.248.4/30<br> по одному в строке)</span>
                            <span id="ip_gamut_label">Диапазоны IP адресов<span style="color:#ff0000">*</span> <br> (формат 192.168.0.1-192.168.1.254<br> по одному в строке)</span>
                        </label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="ip" rows="3" id="textareaDefault"></textarea>
                        </div>
                    </div>

                </div>
                <footer class="panel-footer">
                    <button class="btn btn-primary">Добавить оператора</button>
                </footer>
            </section>
        </form>
    </div>
@endsection