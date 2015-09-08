
$(document).ready(function(){	

	dom.addListeners();

});


var form = {

	queryType: 'get',

	analyze: function(){
		var id_click = parseInt(dom.elem(dom.cssAnalyzeIdClick).val());

		dom.log(id_click);

		if(isNaN(id_click)){

	        new PNotify({
                title: 'Ошибка',
                text: 'Не валидный id click',
                addclass: 'stack-topleft',
                delay: 1000,
                type: 'error'
            });
            
		}else{

			$.ajax({
	            url: '/admin/analyze/get_stats_id_click',
	            type: form.queryType,
	            data: 'id_click='+id_click,
	            beforeSend: function(){
	            	dom.elem(dom.cssAnalyzeResult).html(dom.loadIcon);
	            },
	            success: function(msg){
					dom.elem(dom.cssAnalyzeResult).html(msg);           	
	            },
	            complete: function(){
					form.addTitleColumtRightAlign();
	            },
	            error: function(){
                    var notice = new PNotify({
                        title: 'Ошибка',
                        type: 'error',
                        text: 'Ошибка AJAX!',
                        addclass: 'stack-topleft',
                        delay: 1000,
                    });
	                console.log('error!');
	            }
	        });
		}
	},

	addTitleColumtRightAlign: function(){
		var env = dom.findBootstrapEnvironment();
		dom.log('env: '+env);

		if(env != 'xs'){
			dom.elem(dom.cssTitleColumn).addClass("text-right");
			dom.log('addClass(text-right)');
		}else{
			dom.elem(dom.cssTitleColumn).removeClass("text-right");
			dom.log('removeClass(text-right)');			
		}
	}
}


var dom = {

	cssAnalyzeButton: '#analize_button',
	cssAnalyzeIdClick: '#id_click',
	cssAnalyzeResult: '#analyze_result',
	cssTitleColumn: '.title_column',

	loadIcon: '<div><img src="/assets/images/load.gif"></div>',

	consoleLog: 0,

	addListeners: function(){
		$(document).on('click', dom.cssAnalyzeButton, function(){
			form.analyze();
		});

		$(window).resize(function(){
			form.addTitleColumtRightAlign();
		});

		$(document).keypress(function( event ) {
		  if ( event.which == 13 ) {
		     event.preventDefault();
		     form.analyze();
		  }
		});
	},

	log: function(msg){

		if(this.consoleLog == 1){
			console.log(msg);
		}

	},

	elem: function(cssSelector){
		return $(cssSelector);
	},

	findBootstrapEnvironment: function() {
	    var envs = ['xs', 'sm', 'md', 'lg'];

	    $el = $('<div>');
	    $el.appendTo($('body'));

	    for (var i = envs.length - 1; i >= 0; i--) {
	        var env = envs[i];

	        $el.addClass('hidden-'+env);
	        if ($el.is(':hidden')) {
	            $el.remove();
	            return env
	        }
	    }
	}
}

