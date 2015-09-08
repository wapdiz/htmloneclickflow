




<div class="timeline">
						<div class="tm-body">

							<ol class="tm-items">
								<li>
									<div class="tm-info">
										<div class="tm-icon"><i class="fa fa-star"></i></div>
										@if(!empty($traffic->id_click))
											<time class="tm-datetime" datetime="{{$traffic->datetime}}">
												<h4>Клик</h4>
												<div class="tm-datetime-date">{{\ViewHelper::dateFromStamp($traffic->datetime)}}</div>
												<div class="tm-datetime-time">{{\ViewHelper::timeFromStamp($traffic->datetime)}}</div>
											</time>

										@else
								    		В БД нет такого трафика.
								    	@endif
									</time>
									</div>
									<div style="animation-delay: 100ms;" class="tm-box appear-animation fadeInRight appear-animation-visible" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
										<div class="row" style="margin-bottom:30px;">
											<div class="col-md-12">
												<h4>
												@if(!empty($traffic->id_click))
													{!! \ViewHelper::col2('ID click:', $traffic->id_click, 12) !!}
													{!! \ViewHelper::col2('IP:', $traffic->ip, 12) !!}
													{!! \ViewHelper::col2('Валидный?:', ($traffic->is_valid == 1) ? 'Да' : 'Нет', 12) !!}
													{!! \ViewHelper::col2('Уровень сплита:', $traffic->split_number, 12) !!}
												@else
										    		В БД нет такого трафика.
										    	@endif
												</h4>
											</div>
										</div>

										<div class="row">

											<section class="panel">

											    <header class="panel-heading">
											        <div class="panel-actions">
											            <a href="#" class="fa fa-caret-up"></a>
											            <a href="#" class="fa fa-times"></a>
											        </div>

											        <h2 class="panel-title">Трафик</h2>
											    </header>
											    
											    <div class="panel-body" style="display:none;">
												    @if(!empty($traffic->id_click))
												    	{!! \ViewHelper::col2('Id click:', $traffic->id_click) !!}
												    	{!! \ViewHelper::col2('Id stream:', $traffic->id_source.' - '.$stream->name) !!}
												    	{!! \ViewHelper::col2('Id partner:', $traffic->id_partner.' - '.$user->email) !!}
												    	{!! \ViewHelper::col2('Id land:', $traffic->id_land.' - '.$stream->name) !!}
												    	{!! \ViewHelper::col2('Id category:', $traffic->id_category.' - '.$traffic_category->name) !!}
												    	{!! \ViewHelper::col2('Id agregator:', $traffic->id_agregator.' - '.$traffic_agregator->name) !!}
												    	{!! \ViewHelper::col2('Id operator:', $traffic->id_operator.' - '.$traffic_operator->name) !!}
												    	{!! \ViewHelper::col2('Id country:', $traffic->id_country.' - '.$traffic_country->name) !!}
												    	{!! \ViewHelper::col2('Id os:', $traffic->os.' - '.$traffic_os->name) !!}
												    	{!! \ViewHelper::col2('Id browser:', $traffic->browser.' - '.$traffic_browser->name) !!}
												    	{!! \ViewHelper::col2('Id device brand:', $traffic->id_device_brand.' - '.$traffic_device_brand->name) !!}
												    	{!! \ViewHelper::col2('Id device model:', $traffic->id_device_model.' - '.$traffic_device_model->name) !!}
												    	{!! \ViewHelper::col2('Id device type:', $traffic->device_type.' - '.$traffic_device_type->name) !!}
												    	{!! \ViewHelper::col2('IP:', $traffic->ip) !!}
												    	{!! \ViewHelper::col2('User agent:', $traffic->user_agent) !!}
												    	{!! \ViewHelper::col2('Валидный:', ($traffic->is_valid == 1) ? 'Да' : 'Нет') !!}
												    	@if(!empty($traffic->tb_reason))
												    		{!! \ViewHelper::col2('Причина TB:', $traffic->tb_reason) !!}
												    	@endif    	
												    	{!! \ViewHelper::col2('Время записи в бд:', $traffic->datetime) !!}
												    	{!! \ViewHelper::col2('Пришёл с:', '<a href="'.$traffic->ref_full.'">'.$traffic->ref_full.'</a>') !!}
												    	{!! \ViewHelper::col2('Location:', '<a href="'.$traffic->location.'">'.$traffic->location.'</a>') !!}
												    	{!! \ViewHelper::col2('Hash:', $traffic->uniq_hash) !!}
												    	{!! \ViewHelper::col2('Номер сплита:', $traffic->split_number) !!}
											    	@else
											    		В БД нет такого трафика.
											    	@endif
											    </div>
											    
											</section>


											<section class="panel">

											    <header class="panel-heading">
											        <div class="panel-actions">
											            <a href="#" class="fa fa-caret-up"></a>
											            <a href="#" class="fa fa-times"></a>
											        </div>

											        <h2 class="panel-title">Поток</h2>
											    </header>
											    
											    <div class="panel-body" style="display:none;">
												    @if(!empty($stream->id_stream))
												        {!! \ViewHelper::col2('Id stream:', $stream->id_stream) !!}
												        {!! \ViewHelper::col2('Название:', $stream->name) !!}
												        {!! \ViewHelper::col2('Id категории:', $stream->id_category) !!}
												        {!! \ViewHelper::col2('Категория:', $stream_category->name) !!}
												        {!! \ViewHelper::col2('TB url:', $stream->tb_url) !!}
												        {!! \ViewHelper::col2('Hash:', $stream->hash) !!}
												        {!! \ViewHelper::col2('Тип редиректа:', $stream->type_redirect) !!}
												        {!! \ViewHelper::col2('Postback enable:', $stream->postback_enable) !!}
												        {!! \ViewHelper::col2('Postback url:', '<a href="'.$stream->postback_url.'">'.$stream->postback_url.'</a>') !!}
												        {!! \ViewHelper::col2('Postback method:', $stream->postback_method) !!}
												        {!! \ViewHelper::col2('Postback events:', $stream->postback_events) !!}
												        {!! \ViewHelper::col2('Статус:', $stream->status) !!}
												        {!! \ViewHelper::col2('Комментарий статуса:', $stream->status_comment) !!}
											        @else
											    		В БД нет такого потока.
											    	@endif
											    </div>
											    
											</section>


											<section class="panel">

											    <header class="panel-heading">
											        <div class="panel-actions">
											            <a href="#" class="fa fa-caret-up"></a>
											            <a href="#" class="fa fa-times"></a>
											        </div>

											        <h2 class="panel-title">Сплит</h2>
											    </header>
											    
											    <div class="panel-body" style="display:none;">
											    	@if(!empty($split->id_split))
												    	{!! \ViewHelper::col2('Id split:', $split->id_split) !!}
												    	{!! \ViewHelper::col2('Id stream:', $split->stream_id) !!}
												    	{!! \ViewHelper::col2('Тип редиректа:', $split->redirect_type) !!}
												    	{!! \ViewHelper::col2('Тип баннера:', $split->banner_type) !!}
												    	{!! \ViewHelper::col2('Уровень сплита:', $split->split_order) !!}
												    	{!! \ViewHelper::col2('Лэндинги:', \ViewHelper::arr2lvlToStr($split_land, 'name', ', ')) !!}
												    	{!! \ViewHelper::col2('ОС:', \ViewHelper::arr2lvlToStr($split_os, 'name', ', ')) !!}
												    	{!! \ViewHelper::col2('Os equal type:', $split->os_equal_type) !!}
												    	{!! \ViewHelper::col2('Браузеры:', \ViewHelper::arr2lvlToStr($split_browser, 'name', ', ')) !!}
												    	{!! \ViewHelper::col2('Browser equal type:', $split->browser_equal_type) !!}
												    	{!! \ViewHelper::col2('Типы устройств:', \ViewHelper::arr2lvlToStr($split_device_type, 'name', ', ')) !!}
											    	@else
											    		В БД нет такого сплита.
											    	@endif
											    </div>
											    
											</section>


											<section class="panel">

											    <header class="panel-heading">
											        <div class="panel-actions">
											            <a href="#" class="fa fa-caret-up"></a>
											            <a href="#" class="fa fa-times"></a>
											        </div>

											        <h2 class="panel-title">Лэндинг</h2>
											    </header>
											    
											    <div class="panel-body" style="display:none;">
												    @if(!empty($land->id_land))
												    	{!! \ViewHelper::col2('Id land:', $land->id_land) !!}
												    	{!! \ViewHelper::col2('Название:', $land->name) !!}
												    	{!! \ViewHelper::col2('Промо:', $land->promo_name) !!}
												    	{!! \ViewHelper::col2('Id country:', $land->id_country) !!}
												    	{!! \ViewHelper::col2('Страна:', $land_country->name) !!}
												    	{!! \ViewHelper::col2('Id operator:', $land->id_operator) !!}
												    	{!! \ViewHelper::col2('Оператор:', $land_operator->name) !!}
												    	{!! \ViewHelper::col2('Id agregator:', $land->id_agregator) !!}
												    	{!! \ViewHelper::col2('Агрегатор:', $land_agregator->name) !!}
												    	{!! \ViewHelper::col2('Вес:', $land->weight) !!}
												    	{!! \ViewHelper::col2('Id category:', $land->id_category) !!}
												    	{!! \ViewHelper::col2('Категория:', $land_category->name) !!}
												    	{!! \ViewHelper::col2('Денежная единица:', $land_currency->name) !!}
												    	{!! \ViewHelper::col2('Abonent_price:', $land->abonent_price) !!}
												    	{!! \ViewHelper::col2('Allocation:', $land->allocation) !!}
												    	{!! \ViewHelper::col2('Url:', '<a href="'.$land->land_url.'">'.$land->land_url.'</a>') !!}
												    	{!! \ViewHelper::col2('Изображение:', '<img src="/files/landImages/'.$land->img_name.'}}">') !!}
												    	{!! \ViewHelper::col2('Url type:', $land->url_type) !!}
												    	{!! \ViewHelper::col2('Устройства:', \ViewHelper::obj2lvlToStr($land_device_types, 'name', ', ')) !!}
												    	{!! \ViewHelper::col2('ОС:', \ViewHelper::arr2lvlToStr($land_os, 'name', ', ')) !!}
												    	{!! \ViewHelper::col2('Браузеры:', \ViewHelper::arr2lvlToStr($land_browser, 'name', ', ')) !!}
												    	{!! \ViewHelper::col2('Alert message json:', $land->alert_message_json) !!}
												    	{!! \ViewHelper::col2('Trial days:', $land->trial_days) !!}
												    	{!! \ViewHelper::col2('Alert phrases:', $land->alert_phrases) !!}
											    	@else
											    		В БД нет такого лэндинга.
											    	@endif
											    </div>
											    
											</section>


											<section class="panel">

											    <header class="panel-heading">
											        <div class="panel-actions">
											            <a href="#" class="fa fa-caret-up"></a>
											            <a href="#" class="fa fa-times"></a>
											        </div>

											        <h2 class="panel-title">Партнёр</h2>
											    </header>
											    
											    <div class="panel-body" style="display:none;">
												    @if(!empty($user->id))
												    	{!! \ViewHelper::col2('Id user:', $user->id) !!}
												    	{!! \ViewHelper::col2('Название:', $user->name) !!}
												    	{!! \ViewHelper::col2('Админ?:', ($user->is_admin == 1) ? 'Да' : 'Нет') !!}
												    	{!! \ViewHelper::col2('Email:', $user->email) !!}
												    	{!! \ViewHelper::col2('% отчислений:', $user->money_allocation) !!}
												    	{!! \ViewHelper::col2('Статус:', $user->status) !!}
												    	{!! \ViewHelper::col2('Баланс rur:', $user->balance_rub) !!}
												    	{!! \ViewHelper::col2('Баланс usd:', $user->balance_usd) !!}
												    	{!! \ViewHelper::col2('Баланс eur:', $user->balance_eur) !!}
												    	{!! \ViewHelper::col2('Skype:', $user->skype) !!}
												    	{!! \ViewHelper::col2('Jabber:', $user->jabber) !!}
												    	{!! \ViewHelper::col2('ICQ:', $user->icq) !!}
												    	{!! \ViewHelper::col2('Телефон:', $user->phone) !!}
											    	@else
											    		В БД нет такого партнёра.
											    	@endif
											    </div>
											    
											</section>


										</div>
									</div>
								</li>

								@if(!empty($abonent->id))
								<li>
									<div class="tm-info">
										<div class="tm-icon"><i class="fa fa-thumbs-up"></i></div>
										<time class="tm-datetime" datetime="{{$abonent->datetime}}">
											<h4>Подписка</h4>
											<div class="tm-datetime-date">{{\ViewHelper::dateFromStamp($abonent->datetime)}}</div>
											<div class="tm-datetime-time">{{\ViewHelper::timeFromStamp($abonent->datetime)}}</div>
										</time>
									</div>

									<div style="animation-delay: 250ms;" class="tm-box appear-animation fadeInRight appear-animation-visible" data-appear-animation="fadeInRight" data-appear-animation-delay="250">
										<div class="row">
										{!! \ViewHelper::col2('ID:', $abonent->id) !!}
										{!! \ViewHelper::col2('Количество ребилов:', $money_count_rebill) !!}
										{!! \ViewHelper::col2('Количество ИК:', $money_count_ic) !!}																														
										{!! \ViewHelper::col2('Сумма денег всех:', $money_sum->money_full_sum) !!}
										{!! \ViewHelper::col2('Количество таймаутов:', $abonent->timeout_count) !!}
										{!! \ViewHelper::col2('Сумма денег партнёра:', $money_sum->money_partner_sum) !!}
										{!! \ViewHelper::col2('Id у агрегатора:', $abonent->payment_id) !!}	
										{!! \ViewHelper::col2('Сумма денег системы:', $money_sum->money_system_sum) !!}
										{!! \ViewHelper::col2('Живая?:', ($abonent->is_live == 1) ? 'Да' : 'Нет') !!}	
										{!! \ViewHelper::col2('Сумма денег реферера:', $money_sum->money_ref_sum) !!}
										{!! \ViewHelper::col2('Телефон подписчика:', $abonent->phone) !!}
										{!! \ViewHelper::col2('Параметры запроса:', $abonent->request_param) !!}
										</div>
									</div>
								</li>								
								@endif



								@foreach($money as $key => $value)
								<li>
									<div class="tm-info">
										<div class="tm-icon"><i class="fa 
											@if($value->currency == 1)
												fa-ruble
											@elseif($value->currency == 2)
												fa-usd
											@elseif($value->currency == 3)
												fa-euro
											@else
												fa-usd
											@endif"></i></div>
										<time class="tm-datetime" datetime="{{$value->datetime}}">
											<h4>
												@if($value->type == 'rebill')
													Ребил
												@elseif($value->type == 'ic')
													ИК
												@else
													{{$value->type}}
												@endif
											</h4>
											<div class="tm-datetime-date">{{\ViewHelper::dateFromStamp($value->datetime)}}</div>
											<div class="tm-datetime-time">{{\ViewHelper::timeFromStamp($value->datetime)}}</div>
										</time>
									</div>
									<div style="animation-delay: 250ms;" class="tm-box appear-animation fadeInRight appear-animation-visible" data-appear-animation="fadeInRight" data-appear-animation-delay="250">
										<div class="row">
										{!! \ViewHelper::col2('Id money:', $value->id_money) !!}
										{!! \ViewHelper::col2('Тип:', $value->type) !!}
										{!! \ViewHelper::col2('Денежная единица:', $money_currency->name) !!}
										{!! \ViewHelper::col2('Деньги все:', $value->money_full) !!}
										{!! \ViewHelper::col2('Деньги партнёра:', $value->money_partner) !!}
										{!! \ViewHelper::col2('Деньги системы:', $value->money_system) !!}
										{!! \ViewHelper::col2('Деньги реферала:', $value->money_ref) !!}								
										{!! \ViewHelper::col2('Количество таймаутов:', $value->timeout_count) !!}
										</div>
									</div>
								</li>									
								@endforeach



								@if(!empty($abonent->id) AND $abonent->is_live == 0)
								<li>
									<div class="tm-info">
										<div class="tm-icon"><i class="fa fa-thumbs-down"></i></div>
										<time class="tm-datetime" datetime="{{$abonent->datetime_death}}">
											<h4>Отписка</h4>
											<div class="tm-datetime-date">{{\ViewHelper::dateFromStamp($abonent->datetime_death)}}</div>
											<div class="tm-datetime-time">{{\ViewHelper::timeFromStamp($abonent->datetime_death)}}</div>
										</time>
									</div>
									<div style="animation-delay: 250ms;" class="tm-box appear-animation fadeInRight appear-animation-visible" data-appear-animation="fadeInRight" data-appear-animation-delay="250">
										<div class="row">
										{!! \ViewHelper::col2('ID:', $abonent->id) !!}
										{!! \ViewHelper::col2('Количество ребилов:', $money_count_rebill) !!}
										{!! \ViewHelper::col2('Количество ИК:', $money_count_ic) !!}																														
										{!! \ViewHelper::col2('Сумма денег всех:', $money_sum->money_full_sum) !!}
										{!! \ViewHelper::col2('Количество таймаутов:', $abonent->timeout_count) !!}
										{!! \ViewHelper::col2('Сумма денег партнёра:', $money_sum->money_partner_sum) !!}
										{!! \ViewHelper::col2('Id у агрегатора:', $abonent->payment_id) !!}	
										{!! \ViewHelper::col2('Сумма денег системы:', $money_sum->money_system_sum) !!}
										{!! \ViewHelper::col2('Живая?:', ($abonent->is_live == 1) ? 'Да' : 'Нет') !!}	
										{!! \ViewHelper::col2('Сумма денег реферера:', $money_sum->money_ref_sum) !!}
										{!! \ViewHelper::col2('Телефон подписчика:', $abonent->phone) !!}
										{!! \ViewHelper::col2('Параметры запроса:', $abonent->request_param) !!}
										</div>
									</div>
								</li>								
								@endif

							</ol>

						</div>
					</div>


