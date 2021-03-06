@extends('main-layout')

@section('content')

    <div class="container-fluid">
    <section class="panel">
        <header class="panel-heading">
            <h2>Настройка сплитов</h2>
        </header>
        <div class="panel-body">

          @if(!empty($streams))

          	<div class="col-md-3">            
              
          		<div class="btn-group">
  	            <div>
  	            	<label>
  		                <select id="id_stream">
  		                    @foreach($streams as $key => $value)
  		                        <option 
  		                        	@if($stream_id == $value['id_stream']) selected @endif
  		                        	id_category="{{$value['id_category']}}"
  		                        	value="{{$value['id_stream']}}">{{$value['name']}}</option>
  		                    @endforeach
  		                </select>
  	                <div class="marg-ver"></div>Поток
  	                </label>
  	            </div>
              </div>
         		
              <div class="marg-hor"></div>

  		       	<div class="btn-group">
      				  <button class="btn btn-default" id="setDefaultSettings">Установить настройки по умолчанию</button>
      				</div>

  			      <div class="marg-hor"></div>

              <div class="btn-group">
                <button class="btn btn-default" id="add-split">Добавить</button>
                <button class="btn btn-default" id="remove-split">Убавить</button>
              </div>
              
              <div class="marg-hor"></div>

              <div id="splits" >
            	</div>

            </div>
            


            <!-- Modal Landings  -->
            <div class="modal fade"  id="landingsModal" style="z-index:9003;" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="landingsModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:800px;">
                  <div class="modal-header">
                    <h4 class="modal-title" id="landingsModalLabel">Выбор лендингов</h4>
                  </div>
                  <div id="landingsContent" class="modal-body">
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="landingsModalClose">Закрыть</button>
                    <button type="button" class="btn btn-primary" id="landingsModalSave">Сохранить</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal OS  -->
            <div class="modal fade" id="osModal" style="z-index:9001;" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="osModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="osModalLabel">Выбор ОС</h4>
                  </div>
                  <div id="osContent" class="modal-body">
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="osModalClose">Закрыть</button>
                    <button type="button" class="btn btn-primary" id="osModalSave">Сохранить</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Browser  -->
            <div class="modal fade" id="browserModal" style="z-index:9002;" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="browserModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="browseModalLabel">Выбор браузеров</h4>
                  </div>
                  <div id="browserContent" class="modal-body">
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="browserModalClose">Закрыть</button>
                    <button type="button" class="btn btn-primary" id="browserModalSave">Сохранить</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal SplitSettings-->
            <div class="modal fade" id="splitsSettingsModal" style="z-index:9000;" tabindex="-1" role="dialog" aria-labelledby="splitsSettingModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="splitsSettingModalLabel">Настройка сплита - <span id="splitNumberForTitlePopup"></span></h4>
                  </div>
                  <div id="splitSettingContent" class="modal-body">
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="splitSettingsClose">Закрыть</button>
                    <button type="button" class="btn btn-primary" id="saveSplitSettings">Сохранить изменения</button>
                  </div>
                </div>
              </div>
            </div>

          @else
            <a class="btn btn-primary" href="/streams/create">Сначала создайте поток</a>
          @endif

        </div>
    </section>
</div>

@endsection