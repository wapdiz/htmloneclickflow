/**
 * Created by developer on 04.06.15.
 */
function get_stats_group_by_split(element){

    var name_stats = $(element).attr('name_stats');
    var link = $(element);
    var tr = $(element).parent().parent();
    var start = $('#statistic_date_start_'+name_stats).val();
    var end = $('#statistic_date_end_'+name_stats).val();
    
    if(link.attr('loaded') == 1){
        if(link.attr('show') == 1){
            $('.split_info_'+$(element).attr('stream_id')).hide();
            link.attr('show','0');
            link.text('Подробнее');
            
        } else{
            $('.split_info_'+$(element).attr('stream_id')).show();
            link.attr('show','1');
            link.text('Свернуть');
        }

    } else{

        $.ajax({
            url: '/statistic_grupped/get_stats_group_by_split',
            type: 'GET',
            data: 'stream_id='+$(element).attr('stream_id')+'&start='+start+'&end='+end,
            success: function(msg){
                tr.after(msg);
                link.text('Свернуть');
                link.attr('loaded','1');
                link.attr('show','1');
            },
            error: function(){
                link.after(' <span style="color: #ff0000">Ошибка!</span>');
            }
        });
    }

    return false;
}

function get_stats_group_by_param(element){

    var name_stats = $(element).attr('name_stats');
    var start = $('#statistic_date_start_'+name_stats).val();
    var end = $('#statistic_date_end_'+name_stats).val();       

    var url = '/statistic_grupped/get_stats_group_by_param_by_date_range';
    if(name_stats == 'subscribe'){
        url = '/statistic_subscribe/get_stats_group_by_param_by_date_range';
    }

    if($(element).attr('customWhereParams') == 1){

        var TDSStream = $('#customFilter_'+name_stats+'_TDSStream').val();
        var Operators = $('#customFilter_'+name_stats+'_Operators').val();
        var OSList = $('#customFilter_'+name_stats+'_OSList').val();
        var BrowserList = $('#customFilter_'+name_stats+'_BrowserList').val();
        var DeviceModelList = $('#customFilter_'+name_stats+'_DeviceModelList').val();
        var Agregators = $('#customFilter_'+name_stats+'_Agregators').val();
        var Categories = $('#customFilter_'+name_stats+'_Categories').val();
        var CountryList = $('#customFilter_'+name_stats+'_CountryList').val();
        var Landings = $('#customFilter_'+name_stats+'_Landings').val();
        var Credit = $('#customFilter_'+name_stats+'_Credit').val();

        $.ajax({
            url: url,
            type: 'GET',
            data: '&name_stats='+name_stats+'&start='+start+'&end='+end
            +'&TDSStream='+TDSStream+'&Operators='+Operators+'&OSList='+OSList
            +'&BrowserList='+BrowserList+'&DeviceModelList='+DeviceModelList+
            '&Agregators='+Agregators+'&Categories='+Categories+'&CountryList='+CountryList
            +'&Landings='+Landings+'&Credit='+Credit,
            beforeSend: function(){
                $('#stats_content_'+name_stats).html('<tr><td colspan="14" style="text-align:center;"><img src="/assets/images/load.gif"></td></tr>');
            },
            success: function(msg){
                $('#stats_content_'+name_stats).html(msg);
            },
            error: function(){
                console.log('error!')
            }
        });

    }else{

        $.ajax({
            url: '/statistic_grupped/get_stats_group_by_param_by_date_range',
            type: 'GET',
            data: '&name_stats='+name_stats+'&start='+start+'&end='+end,
            beforeSend: function(){
                $('#stats_content_'+name_stats).html('<tr><td colspan="14" style="text-align:center;"><img src="/assets/images/load.gif"></td></tr>');
            },
            success: function(msg){
                $('#stats_content_'+name_stats).html(msg);
            },
            error: function(){
                console.log('error!')
            }
        });
    }
}

function get_stats_tab_content(element, name_stats){

    if(name_stats == null){
        var name_stats = $(element).attr('name_stats_link');
    }   

    var url = '/statistic_grupped/get_stats_tab_content';
    if(name_stats == 'subscribe'){
        url = '/statistic_subscribe/get_stats_tab_content';
    }

    $.ajax({
        url: url,
        type: 'GET',
        data: '&name_stats='+name_stats,
        beforeSend: function(){
            $('#'+name_stats).html('<div style="text-align:center;"><img src="/assets/images/load.gif"></div>');
        },
        success: function(msg){            
            $('#'+name_stats).html(msg);
        },
        error: function(){            
            console.log('error!')
        },        
        complete: function(){
            get_stats_group_by_param($('[name_stats = '+name_stats+']'));
        }
    });
}

$( document ).ready(function() {
    var name_stats = 'day';
    get_stats_tab_content($('[name_stats_link = '+name_stats+']'), name_stats);

    $(document).ajaxSuccess(function() {
        (function( $ ) {

            'use strict';

            if ( $.isFunction($.fn[ 'datepicker' ]) ) {

                $(function() {
                    $('[data-plugin-datepicker]').each(function() {
                        var $this = $( this ),
                            opts = {};

                        var pluginOptions = $this.data('plugin-options');
                        if (pluginOptions)
                            opts = pluginOptions;

                        $this.themePluginDatePicker(opts);
                    });
                });

            }

        }).apply(this, [ jQuery ]);
    });
});