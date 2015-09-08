$( document ).ready(function() {    
    var value = $("input:checked[name=public]").val(); 
    switch(value){
        case '0':
            console.log('faq_public_0');
            $('#faq_hidden_menu').show();
            break;
        case '1':
            console.log('faq_public_1');
            $('#faq_hidden_menu').hide();
            break;
    }
    
    $("input[name=public]").change(function(){
        var value = $("input:checked[name=public]").val();  
        switch(value){
            case '0':
                console.log('faq_public_0');
                $('#faq_hidden_menu').show();
                break;
            case '1':
                console.log('faq_public_1');
                $('#faq_hidden_menu').hide();
                break;
        }
    })
});
