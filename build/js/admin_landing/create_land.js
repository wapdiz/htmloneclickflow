$( document ).ready(function() {

    if($('input[name="type_url"]:radio:checked').val() == 'simple'){
        $('.curl-url').each(function(){
            $(this).hide();
        });
        //console.log(33333);
    } else{
        $('#simple_url').hide();
        //console.log(44444);
    }

    $('input[name="type_url"]:radio').on('change',function(){
        if($(this).val() == 'simple'){
            $('.curl-url').each(function(){
                $(this).hide(100);
            });
            $('#simple_url').show(100);
        } else{
            $('.curl-url').each(function(){
                $(this).show(100);
            });
            $('#simple_url').hide(100);
        }
    });

    //зависимость операторов от стран
    $("#country_select").on('change',function(){
        var country_id = $("#country_select :selected").val();
        console.log(country_id);
        $('.operator_option').hide();
        $('option[country_id='+country_id+']').show();
        $('#empty_operator').attr('selected','selected')
    });



    $('#trial-period-checkbox').on('change',function(){
        if($(this).prop("checked") == true){
            $('#trial-period-number').show(200);
        } else{
            $('#trial-period-number').hide(200);
        }
    });


    $('#alerts_flag_checkbox').on('change',function(){
        console.log($(this).prop("checked"));
        if($(this).prop("checked") == true){
            $('.alert_phrase_form').show(200);
        } else{
            $('.alert_phrase_form').hide(200);
        }
    });

    $('input[name="auto_buyout_type"]:radio').on('change',function(){
        if($(this).val() == 'time'){
            $('#auto_buyout_time').show(150)
        } else{
            $('#auto_buyout_time').hide(150)
        }

        if($(this).val() != 'off'){
            $('#auto_buyout_price').show(150);
        } else{
            $('#auto_buyout_price').hide(150);
        }
    });

    $('#credit_enable_checkbox').on('change',function(){
        //console.log($(this).prop("checked"));
        if($(this).prop("checked") == true){
            $('#credit_price_input').show(200);
        } else{
            $('#credit_price_input').hide(200);
        }
    });

    var country_id = $("#country_select :selected").val();
    console.log(country_id);
    $('.operator_option').hide();
    $('option[country_id='+country_id+']').show();
    $('#empty_operator').attr('selected','selected');

    $('#trial-period-number').hide();
    $('.alert_phrase_form').hide();

    $('#operator_select').on('change', function () {


        var operator_id = $(this).val();
        var category_id = $('#category_select').val();

        console.log('category_id: '+ category_id);
        console.log('operator_id: '+ operator_id);

        $('.replace_landing_option').hide();
        $('.replace_landing_option[operator_id ='+ operator_id +' ][category_id = '+ category_id +'] ').show();


        var currentReplaceLadingId = $('#replace_landing_id').val();
        var currentReplaceLanding = $('.replace_landing_option[value = '+ currentReplaceLadingId +' ]');

        if(currentReplaceLanding.attr('operator_id') != operator_id || currentReplaceLanding.attr('category_id') != category_id){
            $('#replace_landing_none_select').attr('selected','selected');
        }


    });

    $('#category_select').on('change',function(){
        var category_id = $(this).val();
        var operator_id = $('#operator_select').val();

        console.log('category_id: '+ category_id);
        console.log('operator_id: '+ operator_id);

        $('.replace_landing_option').hide();
        $('.replace_landing_option[operator_id ='+ operator_id +' ][category_id = '+ category_id +'] ').show();

        var currentReplaceLadingId = $('#replace_landing_id').val();
        var currentReplaceLanding = $('.replace_landing_option[value = '+ currentReplaceLadingId +' ]');

        if(currentReplaceLanding.attr('operator_id') != operator_id || currentReplaceLanding.attr('category_id') != category_id){
            $('#replace_landing_none_select').attr('selected','selected');
        }
    });

    //setDefaultReplaceValues();

});

function setDefaultReplaceValues(){

    var category_id = $('#category_select').val();
    var operator_id = $('#operator_select').val();

    $('.replace_landing_option').hide();
    $('.replace_landing_option[operator_id ='+ operator_id +' ][category_id = '+ category_id +'] ').show();

    if(currentReplaceLanding.attr('operator_id') != operator_id || currentReplaceLanding.attr('category_id') != category_id){
        $('#replace_landing_none_select').attr('selected','selected');
    }

}
