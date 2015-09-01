/**
 * Created by vdenchyk on 01.09.2015.
 */
$(document).ready(function(){
    $(document).delegate('.small','click',function(){
        $(this).removeClass('small').addClass('big');
    });

    $(document).delegate('.big','click',function(){
        $(this).removeClass('big').addClass('small');
    });

    $(document).delegate('.dismiss','click',function(){
        $('#view-modal').removeData('bs.modal');
    });

});