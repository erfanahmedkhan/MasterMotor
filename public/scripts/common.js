$(function(){
    $(document).ajaxStart(function(){
        $('#ajax-loader').css('display', 'block');
    });

    $(document).ajaxComplete(function(){
        $('#ajax-loader').css('display', 'none');
    });
})

function baseurl()
{
    return "http://localhost/MasterMotor/public/";
}
