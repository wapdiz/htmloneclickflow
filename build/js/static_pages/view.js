/**
 * Created by developer on 30.03.15.
 * Скрипт с общей визуалкой
 * (скрытие элементов в зависимости от радиобаттонов и тд)
 */

$( document ).ready(function() {
    console.log( "ready for this!!" );
    $("input[name=type]").change(function(){
        var value = $("input:checked[name=type]").val();
        //console.log(value);
        switch(value){
            case 'link':
                console.log('link');
                $('#form-container-element').hide();
                $('#form-header-element').show();
                $('#form-editor-element').show();
                break;
            case 'parent':
                console.log('parent');
                $('#form-container-element').hide();
                $('#form-header-element').hide();
                $('#form-editor-element').hide();

                break;
            case 'children':
                console.log('child');
                $('#form-container-element').show();
                $('#form-header-element').show();
                $('#form-editor-element').show();
                break;
        }
    })
});
