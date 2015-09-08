/**
 * Created by developer on 09.04.15.
 */

$( document ).ready(function() {
    function insert_in_hidden(){
        var value = [];
        $('#os_select .col-md-6 .dropdown-menu .active').each(function(){
            value.push($(this).find('input').val());
        });

        $('#os-hidden').val(JSON.stringify(value));



        value = [];
        $('#device_type_select .col-md-6 .dropdown-menu .active').each(function(){
            value.push($(this).find('input').val());
        });

        $('#device_type-hidden').val(JSON.stringify(value));



        value = [];
        $('#opsos_select .col-md-6 .dropdown-menu .active').each(function(){
            value.push($(this).find('input').val());
        });

        $('#opsos-hidden').val(JSON.stringify(value));



        value = [];
        $('#browser_select .col-md-6 .dropdown-menu .active').each(function(){
            value.push($(this).find('input').val());
        });

        $('#browser-hidden').val(JSON.stringify(value));



        value = [];
        $('#vendor_select .col-md-6 .dropdown-menu .active').each(function(){
            value.push($(this).find('input').val());
        });

        $('#vendor-hidden').val(JSON.stringify(value));



        value = [];
        $('#country_select .col-md-6 .dropdown-menu .active').each(function(){
            value.push($(this).find('input').val());
        });

        $('#country-hidden').val(JSON.stringify(value));
    }

    $('#landing-form').on('submit',insert_in_hidden);
});



