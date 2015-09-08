@extends('simple-layout')

@section('content')
    <div>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="defaultModalLabel">FAQ</h4>
        </div>
        <div class="modal-body">                                
	        <section>
	            <header class="panel-heading">
	                {!! $faq['question'] !!}
	            </header>
	            <div class="panel-body">
	                {!! $faq['answer'] !!} 
	            </div>
	        </section>
        </div>
    </div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
	</div>
@endsection