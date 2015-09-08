@extends('main-layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">

            <div class="panel-body">
                <div class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="id_click">Id click</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="id_click">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-3">
                        <button class="mb-xs mt-xs mr-xs btn btn-primary" id="analize_button" type="button">
                            Анализировать
                        </button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="panel-body" id="analyze_result">
            </div>

        </section>
    </div>
</div>


@endsection