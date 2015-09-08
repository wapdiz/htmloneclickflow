/**
 * Created by developer on 25.03.15.
 */

/**
 * Скрипт для управления формами при создании/редактировании
 */
$( document ).ready(function() {
    console.log( "ready!" );
    $('#theme_option').on('change',function(){
        if($('#theme_option option:selected').val() == 'custom')
            $('#userThemeContainer').show();
        else $('#userThemeContainer').hide();
    })
});
