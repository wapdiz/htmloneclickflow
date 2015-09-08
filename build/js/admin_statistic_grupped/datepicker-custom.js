
var datepickerCustom = {

	name: '',
	startOrEnd: '',
	buttons: "<button onclick=\"$('#statistic_date_end_stream').datepicker('setDate','-1y');\" class='btn btn-default'>вчера</button>",

	getButtons: function(startOrEnd){

		this.startOrEnd = startOrEnd;

		var buttons = '';

		buttons += "<div style='margin-top:10px;margin-bottom:10px;'>";
		buttons += this.getButtonHtml('-0d', '-0d', 'сегодня');

		buttons += this.getButtonHtml('-1d', '-1d', 'вчера');
		buttons += this.getButtonHtml(this.getFirstDayOfWeek('last'), '-0d', 'с начала недели');
		buttons += this.getButtonHtml(this.getFirstDayOfWeek('prev'), this.getLastDayOfWeek('prev'), 'прошлая неделя');
		buttons += this.getButtonHtml(this.getFirstDayOfMonth('last'), '-0d', 'c начала месяца');
		buttons += this.getButtonHtml(this.getFirstDayOfMonth('prev'), this.getLastDayOfMonth('prev'), 'прошлый месяц');
		//buttons += this.getButtonHtml(this.firstDayOfYear(), '-0d', 'с начала года');

		buttons += "</div>";

		buttons += "<style>.btn-datepicker{margin-right:5px;margin-bottom:5px;}</style>";

		return buttons;
	},

	getButtonHtml: function(dateStrStart, dateStrEnd, buttonText){

		var cssSelector = "#statistic_date_"+this.startOrEnd+"_"+this.name;

		var cssSelectorStart = "#statistic_date_start_"+this.name;
		var cssSelectorEnd = "#statistic_date_end_"+this.name;

		var html = '';
		html = '<button onclick=\'\
			$("'+cssSelectorStart+'").datepicker("setDate", "'+dateStrStart+'");\
			$("'+cssSelectorEnd+'").datepicker("setDate", "'+dateStrEnd+'");\
			$("'+cssSelector+'").datepicker("hide");\'\
			class="btn-datepicker btn btn-default">'+buttonText+'</button>';

		return html;
	},


	firstDayOfYear: function(){

		var toDay = new Date();

		return '01.01.'+toDay.getFullYear();
	},

	getLastDayOfMonth: function(lastOrPrev){

		var today = new Date();

		if(lastOrPrev == 'last'){

			return '-0d';

		}else if(lastOrPrev == 'prev'){
						
			var year = today.getFullYear();
			var month = today.getMonth();
			month++;
		    month--; //находим предыдущий		    
		    if(month < 1){
		    	month = 12;
		    	year--;
		    }

		    var date = new Date(year, month, 0);

			var day = '';
		    if(date.getDate() < 10){
		    	day = '0'+date.getDate();
		    }else{
		    	day = date.getDate();
		    }

		    if(month < 10){
		    	month = '0'+month;
		    }
		    
			return day+'.'+month+'.'+year;
		}
	},

	getFirstDayOfMonth: function(lastOrPrev){

		var today = new Date();

		if(lastOrPrev == 'last'){

		   	var month = '';
		    if(today.getMonth() < 10){
		    	month = '0'+today.getMonth();
		    }else{
		    	month = today.getMonth();
		    }

		    month++; //getMonth даёт месяцы от 0 до 11 поэтому инкрементируем
		    
			return '01'+'.'+month+'.'+today.getFullYear();

		}else if(lastOrPrev == 'prev'){

		   	var month = '';
		    if(today.getMonth() < 10){
		    	month = '0'+today.getMonth();
		    }else{
		    	month = today.getMonth();
		    }

		    month++; //getMonth даёт месяцы от 0 до 11 поэтому инкрементируем
		    
		    var year = today.getFullYear();
		    month--; //находим предыдущий		    
		    if(month < 1){
		    	month = 12;
		    	year--;
		    }
			

			return '01'+'.'+month+'.'+year;
		}
	},

	getLastDayOfWeek: function(week){

		var days = 0;
		if(week == 'last'){
			days = 0;
		}else if(week == 'prev'){
			days = 7;
		}

	    var today = new Date();
		var day = today.getDay() || 7; // Get current day number, converting Sun. to 7
		var daysAdd = 7 - day;

		if( day !== 7 ){                // Only manipulate the date if it isn't Mon.
		    today.setHours(24 * daysAdd);   // Set the hours to day number minus 1
			//today.setHours(24 * daysAdd - days * 24 );   // Set the hours to day number minus 1
		}             
		today.setHours(- days * 24); 
		             
		var day = '';
	    if(today.getDate() < 10){
	    	day = '0'+today.getDate();
	    }else{
	    	day = today.getDate();
	    }

	   	var month = '';
	    if(today.getMonth() < 10){
	    	month = '0'+today.getMonth();
	    }else{
	    	month = today.getMonth();
	    }
	    month++;

		return day+'.'+month+'.'+today.getFullYear();

	},

	getFirstDayOfWeek: function(week){

		var days = 0;
		if(week == 'last'){
			days = 0;
		}else if(week == 'prev'){
			days = 7;
		}

	    var today = new Date();
		var day = today.getDay() || 7; // Get current day number, converting Sun. to 7

		if( day !== 1 ){                // Only manipulate the date if it isn't Mon.
		    today.setHours(-24 * (day - 1));   // Set the hours to day number minus 1
		}             
		today.setHours(-24 * days); 

		var day = '';
	    if(today.getDate() < 10){
	    	day = '0'+today.getDate();
	    }else{
	    	day = today.getDate();
	    }

	   	var month = '';
	    if(today.getMonth() < 10){
	    	month = '0'+today.getMonth();
	    }else{
	    	month = today.getMonth();
	    }
	    month++;

	    //console.log('date: '+day+'.'+month+'.'+today.getFullYear());

		return day+'.'+month+'.'+today.getFullYear();

	},

	init: function(name){

		this.name = name;

		$('#dpFastButtonsPanel_'+this.name ).html(datepickerCustom.getButtons('start'));

		
	    $("#statistic_date_start_"+name).datepicker({
	    	/*
	        showButtonPanel: false,
	        beforeShow: function (){
	            setTimeout(function() {
	             
	            $("#ui-datepicker-div")
	                
	                .append(datepickerCustom.getButtons('start'));
	            }, 1)
	        }
	        */
	    });

	    $("#statistic_date_end_"+name).datepicker({
	    	/*
	        showButtonPanel: false,
	        beforeShow: function (){
	            setTimeout(function() {
	             
	            $("#ui-datepicker-div")
	                
	                .append(datepickerCustom.getButtons('end'));
	            }, 1)
	        }
	        */
	    });
		
	},

	addListeners: function() {

	},


}                    
                    