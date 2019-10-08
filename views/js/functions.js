/**
 * Created by aleksey on 08.10.19.
 */

$('.stress-form__htaccess').hide();

$('input#public').click(function() {
    $('.stress-form__htaccess').hide();
    //$(this).closest('.stress-form__htaccess').show();
});

$('#htaccess').click(function() {
    $('.stress-form__htaccess').show();
});