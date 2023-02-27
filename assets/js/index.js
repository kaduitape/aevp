$(function() {

var form = $('#formulario');

form.submit(function() {
    e = $(this);
    // loading.show();
        $.ajax({
        type: 'post',
        url: script_ajax.ajax_url,
        data: e.serialize(),
        success: function(msg) {
            e[0].reset();
            alert("ok");
            console.log(msg);
            // loading.hide();
            // $('.msg_form').css('display','block');
            // $('.sForm').css('display','none');
        },
        error: function() {
            console.log('erro');
        }
    });
}); 


});

$(document).ready(function() {
    let qtd = $('#qtd_campos').val();
    for (var i = 0; i < qtd; i++) {
        let concat = '#aevp_'+i;
        $(concat).select2();     
     }
});


