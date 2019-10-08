
$(function(){
    'use strict';
    $('form').submit(function(e){
        e.preventDefault();
        var button = $(this).find('button[type=submit]');
        button.attr('disabled', true);
        button.append('\t<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>')
        $(this).unbind('submit').submit()
    });
    if($('.toast').length){
        $('.toast').toast('show')
    }
    if($('.form-error').length){
        $('.form-error').prev('input, textarea, select').focus(function(){
            $(this).next('.form-error').fadeOut('slow');
            return false;
        });
    }


});
