
$(document).ready(function(){	

	if(splits.getCategoryId() > 0){
		splits.addListeners();

		splits.getSplitsBlock().html(splits.loadIcon);
		splits.getState(function(stage){
			splits.loadStage(stage);
		});
	}
});


var splits = {

	maxSplits: 5,
	cssSelectorSplits: '#splits',
	cssClassSplitButton: 'splitButton',
	cssSelectorSettingContent: '#splitSettingContent',
	cssSelectorSelectCategory: '#category_id',
	cssSelectorSettingsModal: '#splitsSettingsModal',
	cssSelectorSettingsModalCloseButton: '#splitSettingsClose',

	cssSelectorOsModal: '#osModal',
	cssClassSelectOs: 'os',
	cssSelectorOsContent: '#osContent',
	cssSelectorOsCheckbox: '.osCheckbox',
	cssSelectorOsModalSave: '#osModalSave',
	cssSelectorOsModalClose: '#osModalClose',
	cssSelectorOsIdsStorage: '#osIdsStorage',

	cssSelectorBrowserModal: '#browserModal',
	cssClassSelectBrowser: 'browser',
	cssSelectorBrowserContent: '#browserContent',
	cssSelectorBrowserCheckbox: '.browserCheckbox',
	cssSelectorBrowserModalSave: '#browserModalSave',
	cssSelectorBrowserModalClose: '#browserModalClose',
	cssSelectorBrowserIdsStorage: '#browserIdsStorage',

	cssSelectorOpenLandingsButton: '.openLandings',
	cssSelectorLandingsModal: '#landingsModal',
	cssSelectorLandingsModalContent: '#landingsContent',
	cssSelectorCloseLandingsButton: '#landingsModalClose',

	loadIcon: '<div><img src="/assets/images/load.gif"></div>',

	cssSelectorLandingsSave: '#landingsModalSave',
	cssSelectorLandingImageWrapper: '.landingImage',
	cssSelectorLandingCheckerImage: '.selectedLanding',
	cssSelectorLandingIdsStorage: '#landingIdsStorage',

	cssBaseSelectorLandingWrapper: '#landing_wrapper_',

	cssSelectorSaveSplitSettings: '#saveSplitSettings',

	cssSelectorRedirectType: '.redirect_type',
	cssSelectorDeviceType: '.device_type',

	cssSelectorSplitNumber: '#splitNumberHidden',

	splits_setting_state: [],

	queryType: 'get',

	cssSelectorlandingIdsStorageByOperatorIdBase: '#landingIdsStorageByOperatorId_',
	cssSelectorOperatorIdForLandings: '#operator_id_for_landings',
	cssSelectorOperatorLandingsStorage: '.operatorLandingsStorage',

	cssSelectorCountLadndingsByOperatorIdBase: '#count_landings_operator_id_',

	cssClassCountLandingsByOperatorId: 'count_landings',

	cssSelectorOsLastState: '#osLastState',
	cssSelectorBrowserLastState: '#browserLastState',


	addListeners: function(){

		$(document).on('click', '#add-split', function(){
			splits.add();
		});

		$(document).on('click', '#remove-split', function(){
			splits.remove();
		});

		$(document).on('click', '.'+this.cssClassSplitButton, function(){			
			splits.settingsOpen($(this).attr('splitId'));
		});	

		$(document).on('click', this.cssSelectorSettingsModalCloseButton, function(){
			splits.settingsClose();
		});

		$(document).on('change', '.'+this.cssClassSelectOs, function(){
			splits.osOpenPopup();
		});

		$(document).on('change', '.'+this.cssClassSelectBrowser, function(){
			splits.browserOpenPopup();
		});

		$(document).on('click', this.cssSelectorOsModalSave, function(){
			splits.osPopupSave();
		});

		$(document).on('click', this.cssSelectorBrowserModalSave, function(){
			splits.browserPopupSave();
		});

		$(document).on('click', this.cssSelectorOsModalClose, function(){
			splits.osPopupClose();
		});

		$(document).on('click', this.cssSelectorBrowserModalClose, function(){
			splits.browserPopupClose();
		});

		$(document).on('click', this.cssSelectorOpenLandingsButton, function(){
			splits.landingsOpenPopup(this);
		});

		$(document).on('click', this.cssSelectorCloseLandingsButton, function(){
			splits.landingsPopupClose();
		});

		$(document).on('click', this.cssSelectorLandingImageWrapper, function(){
			splits.landingsSelect(this, $(this).attr('id_land'));
		});

		$(document).on('click', this.cssSelectorLandingsSave, function(){
			splits.landingsSave();
		});

		$(document).on('click', this.cssSelectorSaveSplitSettings, function(){
			splits.saveSplitSettings();
		});

		$(document).on('change', this.cssSelectorSelectCategory, function(){

			if(splits.getCategoryId() > 0){
				splits.getSplitsBlock().html(splits.loadIcon);
				
				splits.getState(function(stage){
					splits.loadStage(stage);
				});
			}
			
		});
		//TODO сделать возврат состояния селекта при нажатии кнопки закрыть в попате
		//доделать всё остальное
		$(document).on('focus', '.'+splits.cssClassSelectOs, function(){

			dom.log('os_click');
			dom.log('SelectOs');
			dom.log(dom.getElem('.'+splits.cssClassSelectOs+':checked').val());
			dom.getElem(splits.cssSelectorOsLastState).val( dom.getElem('.'+splits.cssClassSelectOs+':checked').val() );

		});

		$(document).on('focus', '.'+splits.cssClassSelectBrowser, function(){

			dom.log('browser_click');
			dom.log('SelectBrowser');
			dom.log(dom.getElem('.'+splits.cssClassSelectBrowser+':checked').val());
			dom.getElem(splits.cssSelectorBrowserLastState).val( dom.getElem('.'+splits.cssClassSelectBrowser+':checked').val() );

		});
		
	},

	getElementsCountLandingsByOperatorId: function(){
		return $('.'+this.cssClassCountLandingsByOperatorId);
	},

	getOpenLandingsButton: function(){
		return $(this.cssSelectorOpenLandingsButton);
	},

	getCategoryId: function(){
		return $(this.cssSelectorSelectCategory).val();
	},

	getSplitsBlock: function(){
		return $(splits.cssSelectorSplits);
	},

	loadStage: function(stage){

		$(this.cssSelectorSplits).html('');
		var categories_id = $(this.cssSelectorSelectCategory).val();
				
		for(key in stage[categories_id]){			
			this.add();
		}

	},

	getState: function(callback){
		$.ajax({
            url: '/admin/splits_settings/get_state',
            type: splits.queryType,
            beforeSend: function(){

            },
            success: function(msg){            	
            	
            	var stage = JSON.parse(msg);	
            		
            	if(typeof(callback) == 'function'){
            		callback(stage);
            	}
            	
            },
            error: function(){	
            	alert('Ошибка.');                
                console.log('error!');
            }
        });
	},

	getJSONArrayFromString: function(str_separate_comma){
		var arr = str_separate_comma.split(',');
		var json = JSON.stringify(arr);

		return json;
	},

	saveSplitSettings: function(){	

			var split_order = $(this.cssSelectorSplitNumber).val();
			var categories_id = $(this.cssSelectorSelectCategory).val();
			var redirect_type = $(this.cssSelectorRedirectType+':checked').val();
			//var device_type = $(this.cssSelectorDeviceType+':checked').val();
			var os = $('.'+this.cssClassSelectOs+':checked').val();
			var browser = $('.'+this.cssClassSelectBrowser+':checked').val();	

			var device_type = $(this.cssSelectorDeviceType+':checked');
			var device_type_ids = device_type.map(function(){
				return $(this).val();
			}).get();		
			device_type_ids = device_type_ids.join(',');
			
			if(os == 'all'){
				var os_array = 'all';
				var os = 'equal';
			}else{
				os_array = $(this.cssSelectorOsIdsStorage).val();
				os_array = this.getJSONArrayFromString(os_array);
			}

			if(browser == 'all'){
				var browser_array = 'all';
				var browser = 'equal';
			}else{
				browser_array = $(this.cssSelectorBrowserIdsStorage).val();
				browser_array = this.getJSONArrayFromString(browser_array);				
			}

			dom.log('device_type_ids');
			dom.log(device_type_ids);
			device_type = this.getJSONArrayFromString(device_type_ids);

			//вынимаем id лендингов из хранилищ каждого оператора
			var operatorLandingsStorage = $(this.cssSelectorOperatorLandingsStorage);
			var selectedLandingsIdsByOperator = operatorLandingsStorage.map(function(){
				return $(this).val();
			}).get();

			//удаление пустых элементов
			var selectedLandingsIdsByOperatorClear = [];
			for (var i = 0; i < selectedLandingsIdsByOperator.length; i++) {

			    if ( i in selectedLandingsIdsByOperator && selectedLandingsIdsByOperator[i] !== '') {

			        selectedLandingsIdsByOperatorClear.push(selectedLandingsIdsByOperator[i]);

			    }

			}

			var land_array = selectedLandingsIdsByOperatorClear.join(',');
	
			if(land_array == ''){
				alert('Вы не выбрали лендинги');
				return false;
			}else{
				land_array = this.getJSONArrayFromString(land_array);
			}

			$.ajax({
	            url: '/admin/splits_settings/split_settings_save',
	            type: splits.queryType,
	            data: 'split_order='+split_order+'&categories_id='
	            	+categories_id+'&redirect_type='+redirect_type
	            	+'&device_type='+device_type+'&os_array='+os_array
	            	+'&browser_array='+browser_array+'&land_array='+land_array+'&os='+os+'&browser='+browser,
	            beforeSend: function(){

	            },
	            success: function(msg){
					alert('Сохранено.');
					splits.settingsClose();            	
	            },
	            error: function(){	
	            	alert('Ошибка сохранения.');                
	                console.log('error!');
	            }
	        });
	},

	landingsSave: function(){
		var selectedLandings = $(this.cssSelectorLandingCheckerImage);

		var selectedLandingsIds = selectedLandings.map(function(){
			return $(this).attr('id_land');
		}).get();

		$(this.cssSelectorlandingIdsStorageByOperatorIdBase+this.getOperatorIdForLandings()).val(selectedLandingsIds);

		if(selectedLandingsIds.length < 1){
			alert('Вы не выбрали ни одного лендинга.');
			return false;
		}


		this.displayLandingsCount();
		
		$(this.cssSelectorLandingsModal).modal('hide');
	},

	getOperatorIdForLandings: function(){
		return $(this.cssSelectorOperatorIdForLandings).val();
	},

	landingsSelect: function(element, id_land){

	    var selectedLanding = $(element).find(".selectedLanding");	    

	    if(selectedLanding.length === 0){
	      $(element).append(this.getLandingCheckedImage(id_land));
	         
	    }else{
	        selectedLanding.remove();
	          
	    }   
	},

	loadingSelectedLandingsFromStorage: function(){

		var ids_land = $(this.cssSelectorlandingIdsStorageByOperatorIdBase+this.getOperatorIdForLandings()).val();

		ids_land = ids_land.split(',');
		
		for(key in ids_land){
			$(this.cssBaseSelectorLandingWrapper+ids_land[key]).append(this.getLandingCheckedImage(ids_land[key]));
		}

	},

	getLandingCheckedImage: function(id_land){

		return '<img id_land="'+id_land+'" class="selectedLanding" style="display:block; position:absolute;\
	        bottom:10px; right:10px; z-index:2;" src="/assets/images/button_ok.png">';
	},

	landingsPopupClose: function(){
		$(this.cssSelectorLandingsModal).modal('hide');
	},

	landingsOpenPopup: function(element){

		$(this.cssSelectorLandingsModal).modal('show');
		var contentModal = $(this.cssSelectorLandingsModalContent);

		var id_category = $(this.cssSelectorSelectCategory).val();
		var id_operator = $(element).attr('id_operator');
		var id_country = $(element).attr('id_country');

		$.ajax({
            url: '/admin/splits_settings/landings',
            type: splits.queryType,
            data: 'id_category='+id_category+'&id_operator='+id_operator+'&id_country='+id_country,
            beforeSend: function(){
                contentModal.html(this.loadIcon);            	
            },
            success: function(msg){
            	contentModal.html(msg);
			    contentModal.queue(function (next) {              
			    	splits.loadingSelectedLandingsFromStorage();			    	
					next();
			    }); 
            	
            },
            error: function(){
                contentModal.html('Error!');
                console.log('error!');
            }
        });
	},

	osPopupClose: function(){	

		dom.log('os_close');
		dom.getElem('.'+splits.cssClassSelectOs+'[value='+dom.getElem(splits.cssSelectorOsLastState).val()+']').prop('checked', true);

		$(this.cssSelectorOsModal).modal('hide');
	},

	browserPopupClose: function(){

		dom.log('browser_close');
		dom.getElem('.'+splits.cssClassSelectBrowser+'[value='+dom.getElem(splits.cssSelectorBrowserLastState).val()+']').prop('checked', true);

		$(this.cssSelectorBrowserModal).modal('hide');
	},

	getCheckedIds: function(cssSelectorCheckbox){

		var сheckboxChecked = $(cssSelectorCheckbox+':checked');

		var checkedIds = сheckboxChecked.map(function(){
			return $(this).val();
		}).get();

		return checkedIds;
	},

	osPopupSave: function(){
		var checkedIds = this.getCheckedIds(this.cssSelectorOsCheckbox);

		if(checkedIds.length < 1){

			alert('Не выбраны ОС.');
			
			return false;		
		}
		$(this.cssSelectorOsIdsStorage).val(checkedIds);

		$(this.cssSelectorOsModal).modal('hide');

		return true;
	},

	browserPopupSave: function(){
		var checkedIds = this.getCheckedIds(this.cssSelectorBrowserCheckbox);

		if(checkedIds.length < 1){

			alert('Не выбраны браузеры.');
			
			return false;		
		}
		$(this.cssSelectorBrowserIdsStorage).val(checkedIds);

		$(this.cssSelectorBrowserModal).modal('hide');

		return true;
	},

	loadContentPopup: function(contentModal, content, cssSelectorIdsStorage, cssSelectorCheckbox){
	    contentModal.html(content); 
	    contentModal.queue(function (next) {              
	        var checkedIds = $(cssSelectorIdsStorage).val();
	        var checkedIdsArr = checkedIds.split(',');
	        var checkBox
	        for (key in checkedIdsArr){
	        	checkBox = $(cssSelectorCheckbox+'[value='+checkedIdsArr[key]+']');
	        	$(checkBox).prop('checked', true);	
			}    	
			next();
	    });  
	},

	osOpenPopup: function(){
		
		var select = $('.'+this.cssClassSelectOs+':checked').val();		
		if(select == 'all'){
			return false;
		}

		$(this.cssSelectorOsModal).modal('show');
		var contentModal = $(this.cssSelectorOsContent);

		$.ajax({
            url: '/admin/splits_settings/os_select',
            type: splits.queryType,
            //data: 'split_number='+splitNumber+'&category_id='+category_id,
            beforeSend: function(){
                contentModal.html(this.loadIcon);            	
            },
            success: function(msg){
                splits.loadContentPopup(
                	contentModal, msg, splits.cssSelectorOsIdsStorage, splits.cssSelectorOsCheckbox
                );
            },
            error: function(){
                contentModal.html('Error!');
                console.log('error!');
            }
        });
	},

	browserOpenPopup: function(){		

		var select = $('.'+this.cssClassSelectBrowser+':checked').val();		
		if(select == 'all'){
			return false;
		}

		$(this.cssSelectorBrowserModal).modal('show');
		var contentModal = $(this.cssSelectorBrowserContent);

		$.ajax({
            url: '/admin/splits_settings/browser_select',
            type: splits.queryType,
            //data: 'split_number='+splitNumber+'&category_id='+category_id,
            beforeSend: function(){
                contentModal.html(this.loadIcon);            	
            },
            success: function(msg){
                splits.loadContentPopup(
                	contentModal, msg, splits.cssSelectorBrowserIdsStorage, splits.cssSelectorBrowserCheckbox
                );
            },
            error: function(){
                contentModal.html('Error!');
                console.log('error!');
            }
        });
	},
	
	add: function(){

		var splitNumber = this.getNumberAddSplit();
		if(splitNumber > 0){
			$(this.cssSelectorSplits).append(
				'<div><button splitId="'+splitNumber+'" id="splitNumber_'+splitNumber+'" class="btn btn-primary '
				+this.cssClassSplitButton+'" style="margin-bottom:15px;">Сплит '
				+splitNumber+'</button></div>'
			);
		}
	},

	remove: function(){

		var count_splits = this.countSplits();

		var splitNumber = this.getNumberRemoveSplit();
		var category_id = $(this.cssSelectorSelectCategory).val();
		$('#splitNumber_'+splitNumber).remove();

		$.ajax({
            url: '/admin/splits_settings/delete_max_split_in_category',
            type: splits.queryType,
            data: 'category_id='+category_id+'&count_splits='+count_splits,
            beforeSend: function(){
                         	
            },
            success: function(msg){
            	console.log('success delete split!');
            },
            error: function(){                
                console.log('error!');
            }
        });
	},

	getNumberAddSplit: function(){
		
		var splitNumber = this.countSplits() + 1;
		if(splitNumber > this.maxSplits){
			return null;
		}

		return splitNumber;
	},

	getNumberRemoveSplit: function(){
		return this.countSplits();
	},

	countSplits: function(){
		return $('.'+this.cssClassSplitButton).size();
	},

	settingsOpen: function(splitNumber){

		
	
		$(this.cssSelectorSettingsModal).modal('show');		
		var settingContent = $(this.cssSelectorSettingContent);
		var category_id = $(this.cssSelectorSelectCategory).val();
		$.ajax({
            url: '/admin/splits_settings/split_settings',
            type: splits.queryType,
            data: 'split_number='+splitNumber+'&category_id='+category_id,
            beforeSend: function(){
                settingContent.html(this.loadIcon);            	
            },
            success: function(msg){
                settingContent.html(msg);
                
                settingContent.queue(function (next) {             	
					
					splits.getState(function(stage){
						splits.loadSettingsState(stage, splitNumber);							
					});
					next();
			    }); 
            },

            error: function(){
                settingContent.html('Error!');
                console.log('error!');
            }
        });
		
	},

	settingsClose: function(){
		$(this.cssSelectorSettingsModal).modal('hide');
	},

	displayLandingsCount: function(){

		this.getElementsCountLandingsByOperatorId().removeClass('show_count_landings');

		var value = '';
		var valueArr = '';
		var id_operator = '';
		var operatorIds = $('.operatorLandingsStorage').map(function(){
			id_operator =  $(this).attr('id_operator');

			value = $(this).val();

			if(value != ''){
				valueArr = value.split(',');
				valueArrLength = valueArr.length;

				$(splits.cssSelectorCountLadndingsByOperatorIdBase+id_operator).text(valueArrLength);
				$(splits.cssSelectorCountLadndingsByOperatorIdBase+id_operator).addClass('show_count_landings');
			}

		}).get();	

	},
	

	loadSettingsState: function(state, splitNumber){
		
		var categories_id = $(this.cssSelectorSelectCategory).val();
		var land_array = '';
		var os_array = '';
		var browser_array = '';
		var os_equal_type = '';
		var browser_equal_type = '';
		if(state[categories_id] != undefined && splitNumber in state[categories_id]){

			
			land_array = state[categories_id][splitNumber]['land_array'];
			
			//заливка ids лендингов в хранища операторов
			for(key in land_array){				
				$(this.cssSelectorlandingIdsStorageByOperatorIdBase+key).val(land_array[key]);
			}

			this.displayLandingsCount();

			os_array = state[categories_id][splitNumber]['os_array'];
			browser_array = state[categories_id][splitNumber]['browser_array'];

			os_equal_type = state[categories_id][splitNumber]['os_equal_type'];
			browser_equal_type = state[categories_id][splitNumber]['browser_equal_type'];

			os_array = this.jsonToStringCommaSeparated(os_array);
			browser_array = this.jsonToStringCommaSeparated(browser_array);

			$(this.cssSelectorLandingIdsStorage).val(land_array);
			$(this.cssSelectorOsIdsStorage).val(os_array);
			$(this.cssSelectorBrowserIdsStorage).val(browser_array);

			if(os_array == 'all'){
				$('.'+this.cssClassSelectOs+'[value=all]').prop('checked', true);
			}else{
				$('.'+this.cssClassSelectOs+'[value='+os_equal_type+']').prop('checked', true);
			}

			if(browser_array == 'all'){
				$('.'+this.cssClassSelectBrowser+'[value=all]').prop('checked', true);
			}else{
				$('.'+this.cssClassSelectBrowser+'[value='+browser_equal_type+']').prop('checked', true);
			}

			$(this.cssSelectorRedirectType+'[value='+state[categories_id][splitNumber]['redirect_type']+']').prop('checked', true);


			dom.log('this.cssSelectorDeviceType');
			dom.log(this.cssSelectorDeviceType);

			state[categories_id][splitNumber]['device_type'] = JSON.parse(state[categories_id][splitNumber]['device_type']);

			$(this.cssSelectorDeviceType).prop('checked', false);

			dom.log('state[categories_id][splitNumber]["device_type"]');
			dom.log(state[categories_id][splitNumber]['device_type']);

			for(key in state[categories_id][splitNumber]['device_type']){
				$(this.cssSelectorDeviceType+'[value='+state[categories_id][splitNumber]['device_type'][key]+']').prop('checked', true);
			}
			
			
		}

	},

	jsonToStringCommaSeparated: function(json){
		if(json != 'all'){			
			var array = JSON.parse(json);			
			var str = array.join(',');
			json = str;
		}		

		return json;
	}
}

var dom = {

	consoleLog: 1,

	log: function(msg){

		if(this.consoleLog == 1){
			console.log(msg);
		}

	},

	getElem: function(cssSelector){
		return $(cssSelector);
	},
}