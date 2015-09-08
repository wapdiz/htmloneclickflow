
$(document).ready(function(){
	dom.log('dom_ready');
	dom.addListeners();
});


var popup = {

	queryType: 'post',

	loadIcon: '<div><img src="/assets/images/load.gif"></div>',


	openOsPopup: function(){

		dom.log('openOsPopup');

		dom.getElem(dom.cssSelectorOsModal).modal('show');
		var contentModal = dom.getElem(dom.cssSelectorOsModalContent);

		$.ajax({
			url: '/admin/landings/os_modal',
			type: popup.QueryType,
			data: '',

			beforeSend: function(){
				contentModal.html(popup.loadIcon);
			},

			success: function(msg){
				//contentModal.html(msg);
				dom.loadContentPopup(contentModal, msg, dom.cssSelectorOsStorageIds, dom.cssSelectorOsCheckbox);
			},

			error: function(msg){
				contentModal.html(msg);
				dom.log('error!');
			}
		});
	},

	openBrowserPopup: function(){

		dom.log('openBrowserPopup');

		dom.getElem(dom.cssSelectorBrowserModal).modal('show');
		var contentModal = dom.getElem(dom.cssSelectorBrowserModalContent);

		$.ajax({
			url: '/admin/landings/browser_modal',
			type: popup.QueryType,
			data: '',

			beforeSend: function(){
				contentModal.html(popup.loadIcon);
			},

			success: function(msg){
				//contentModal.html(msg);
				dom.loadContentPopup(contentModal, msg, dom.cssSelectorBrowserStorageIds, dom.cssSelectorBrowserCheckbox);

			},

			error: function(msg){
				contentModal.html(msg);
				dom.log('error!');
			}
		});
	},

}

var dom = {

	consoleLog: 1,

	cssSelectorOs: '#os',
	cssSelectorBrowser: '#browser',
	cssSelectorOsModal: '#osModal',
	cssSelectorBrowserModal: '#browserModal',
	cssSelectorOsModalContent: '#osModalContent',
	cssSelectorBrowserModalContent: '#browserModalContent',
	cssSelectroOsModalClose: '#osModalClose',
	cssSelectroBrowserModalClose: '#browserModalClose',
	cssSelectroOsModalSave: '#osModalSave',
	cssSelectroBrowserModalSave: '#browserModalSave',
	cssSelectorOsCheckbox: '.osCheckbox',
	cssSelectorBrowserCheckbox: '.browserCheckbox',
	cssSelectorOsStorageIds: '#osStorageIds',
	cssSelectorBrowserStorageIds: '#browserStorageIds',
	cssSelectorOsLastState: '#osLastState',
	cssSelectorBrowserLastState: '#browserLastState',

	addListeners: function(){

		dom.log('addListeners');

		$(document).on('focus', dom.cssSelectorOs, function(){

			dom.log('os_click');
			dom.getElem(dom.cssSelectorOsLastState).val( dom.getElem(dom.cssSelectorOs).val() );

		});

		$(document).on('focus', dom.cssSelectorBrowser, function(){

			dom.log('os_click');
			dom.getElem(dom.cssSelectorBrowserLastState).val( dom.getElem(dom.cssSelectorBrowser).val() );

		});

		$(document).on('click', dom.cssSelectroBrowserModalClose, function(){
			dom.getElem(dom.cssSelectorBrowserModal).modal('hide');
			dom.getElem(dom.cssSelectorBrowser).val( dom.getElem(dom.cssSelectorBrowserLastState).val() );
		});

		$(document).on('click', dom.cssSelectroOsModalClose, function(){
			dom.getElem(dom.cssSelectorOsModal).modal('hide');
			dom.getElem(dom.cssSelectorOs).val( dom.getElem(dom.cssSelectorOsLastState).val() );
		});

		$(document).on('change', dom.cssSelectorOs, function(){

			dom.log('os_change');

			var osSelect = dom.getElem(dom.cssSelectorOs).val();
			if(osSelect == 'equal' || osSelect == 'not_equal'){
				popup.openOsPopup();
			}
			
		});

		$(document).on('change', dom.cssSelectorBrowser, function(){

			dom.log('browser_change');

			var browserSelect = dom.getElem(dom.cssSelectorBrowser).val();
			if(browserSelect == 'equal' || browserSelect == 'not_equal'){
				popup.openBrowserPopup();
			}

		});

		$(document).on('click', dom.cssSelectroOsModalSave, function(){

			dom.log('OsModalSave');

			var storageIds = dom.getCheckedIds(dom.cssSelectorOsCheckbox);

			dom.log('CheckedIds');
			dom.log(storageIds);

			dom.osStorageIds(storageIds);

			dom.getElem(dom.cssSelectorOsModal).modal('hide');

		});

		$(document).on('click', dom.cssSelectroBrowserModalSave, function(){

			dom.log('BrowserModalSave');
			
			var storageIds = dom.getCheckedIds(dom.cssSelectorBrowserCheckbox);

			dom.log('CheckedIds');
			dom.log(storageIds);

			dom.browserStorageIds(storageIds);

			dom.getElem(dom.cssSelectorBrowserModal).modal('hide');

		});

	},	

	log: function(msg){

		if(this.consoleLog == 1){
			console.log(msg);
		}

	},

	getElem: function(cssSelector){
		return $(cssSelector);
	},

	getCheckedIds: function(cssSelectorCheckbox){

		var сheckboxChecked = $(cssSelectorCheckbox+':checked');

		var checkedIds = сheckboxChecked.map(function(){
			return $(this).val();
		}).get();

		return checkedIds;
	},

	osStorageIds: function(ids){
		dom.log('osStorageIds');
		dom.log(ids);
		$(dom.cssSelectorOsStorageIds).val(ids);
	},

	browserStorageIds: function(ids){
		dom.log('browserStorageIds');
		dom.log(ids);
		$(dom.cssSelectorBrowserStorageIds).val(ids);
	},
	
	loadContentPopup: function(contentModal, content, cssSelectorIdsStorage, cssSelectorCheckbox){
	    contentModal.html(content); 
	    contentModal.queue(function (next) {              
	        var checkedIds = $(cssSelectorIdsStorage).val();
	        var checkedIdsArr = checkedIds.split(',');
	        var checkBox;
	        for (key in checkedIdsArr){
	        	checkBox = $(cssSelectorCheckbox+'[value='+checkedIdsArr[key]+']');
	        	$(checkBox).prop('checked', true);	
			}    	
			next();
	    });  
	}

}