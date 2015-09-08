/**
 * Created by developer on 30.03.15.
 * Хак для WYSIWYG редактора
 */
$( document ).ready(function() {
    console.log( "ready!" );
    $('#create-form').on('submit',function(){
        $('#hidden-text-input').val($('.note-editable').html());
        return true;
    })
});
