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


