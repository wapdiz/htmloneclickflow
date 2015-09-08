$( document ).ready(function() {

    $('#filter_submit').on('click',function(){

        var token = $('#csrf_token').val();
        var country = $('#land_country').val();
        var operator = $('#land_operator').val();
        var category = $('#land_category').val();
        var agregator = $('#land_agregator').val();

        $.ajax({
            url: '/admin/landings/filter',
            type: 'POST',
            data: {_token: token ,country: country,operator: operator,category: category,agregator: agregator },
            success: function(msg){
                $('#tbody_container').html(msg);
                setNewElementsForFilters();
            },

            error: function(){
                var notice = new PNotify({
                    title: 'Ошибка',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'error'
                });
            }
        });
    });

    $('#landingReplaceModalClose').on('click',function(){
        $('#landingReplaceModal').modal('hide');
        return false;
    });

    $('#landingReplaceModalApply').on('click',function(){
        $('#landingReplaceModal').modal('hide');

        var token = $('#csrf_token').val();
        var landing_id = $('#replaceFormLandingId').val(); // взять из формы

        var action = $('input[name="replaceFormAction"]:checked').val();
        var replaceLandingId = $('#replaceFormLandingForReplace').val();

        //ajax запрос
        $.ajax({

            url: '/admin/landings/replace_landing',
            type: 'POST',
            data: {_token: token , landing_id: landing_id,action:action,replaceLandingId: replaceLandingId },
            success: function(msg){
                var notice = new PNotify({
                    title: 'Успешно!',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'info'
                });
            },

            error: function(){
                var notice = new PNotify({
                    title: 'Ошибка',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'error'
                });
            }
        });


        return false;
    });

    $('#landingDisableModalClose').on('click',function(){
        $('#landingDisableModal').modal('hide');
    });

    $('#landingDisableModalApply').on('click',function(){

        $('#landingDisableModal').modal('hide');

        var token = $('#csrf_token').val();
        var landing_id = $('#disableLandingId').val();
        var replaceLandingId = $('#disableLandingReplaceId').val();

        var button = $(this);

        console.log($(this));

        $.ajax({
            url: '/admin/landings/disable_landing',
            type: 'POST',

            data: {_token: token , landing_id: landing_id,replace_landing_id: replaceLandingId, status: 'disableLanding' },
            success: function(msg){

                $("td[landing_id="+landing_id+"]").html('<span class="label label-danger">Выключен</span>');

                $('.landing_enable_button[landing_id="'+landing_id+'"]').show();
                $('.landing_disabled_button[landing_id="'+landing_id+'"]').hide();

                var notice = new PNotify({
                    title: 'Успешно',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'info'
                });

                console.log('Вызов раз!');
            },

            error: function(){
                var notice = new PNotify({
                    title: 'Ошибка',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'error'
                });
            }
        });



    });


    setNewElementsForFilters();

});

function setNewElementsForFilters(){
    var container = $("#landing_preview_container");
    var img = $('#landing_preview_img');

    $('.landing_name').hover(function(){

        var size = window.innerHeight/3;
        var td = $(this).parent();

        var img_name = $(this).attr('land_img');
        if(img_name == '') return false;

        var position = $(this).offset();

        img.attr('src','/files/landImages/'+img_name);
        img.width(size);

        container.css({top:position.top - window.pageYOffset,left:position.left + td.width()});
        container.width(size);
        container.height(size);

        container.show();

    },function(){
        container.hide();
    });

    $('a.landing_name').on('click',function(){
        return false;
    });


    $('.landing_enable_button').on('click',function(){
        var token = $('#csrf_token').val();
        var landing_id = $(this).attr('landing_id');

        var button = $(this);

        $.ajax({
            url: '/admin/landings/enable_land',
            type: 'POST',
            data: {_token: token , landing_id: landing_id },
            success: function(msg){
                button.hide();
                $('.landing_disabled_button[landing_id="'+landing_id+'"]').show();
                $("td[landing_id="+landing_id+"]").html('<span class="label label-success">Включен</span>');
                var notice = new PNotify({
                    title: 'Успешно',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'info'
                });
            },

            error: function(){
                var notice = new PNotify({
                    title: 'Ошибка',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'error'
                });
            }
        });

    });

    $('.landing_disabled_button').on('click',function(){
        var token = $('#csrf_token').val();
        var landing_id = $(this).attr('landing_id');

        var button = $(this);

        $.ajax({
            url: '/admin/landings/disable_landing',
            type: 'POST',
            data: {_token: token , landing_id: landing_id,status: 'getModalView' },
            success: function(msg){

                $('#landingDisableModalForm').html(msg);
                $('#landingDisableModal').modal('show');
            },

            error: function(){
                var notice = new PNotify({
                    title: 'Ошибка',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'error'
                });
            }
        });

    });

    $('.landing_replace_button').on('click',function(){
        var token = $('#csrf_token').val();
        var landing_id = $(this).attr('landing_id');

        var button = $(this);

        $.ajax({
            url: '/admin/landings/get_landing_replace_form',
            type: 'POST',
            data: {_token: token , landing_id: landing_id },
            success: function(msg){
                console.log(msg);
                $('#landingReplaceModalForm').html(msg);
                $('#landingReplaceModal').modal('show');
            },

            error: function(){
                var notice = new PNotify({
                    title: 'Ошибка',
                    //text: text,
                    addclass: 'stack-topleft',
                    delay: 1000,
                    type: 'error'
                });
            }
        });

        return false;
    });





}
