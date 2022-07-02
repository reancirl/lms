$(document).ready(function()
{
    // Modal Multiple Popup
    var modal_lv = 0;
    $('.modal').on('shown.bs.modal', function(e) 
    {
        $('.modal-backdrop:last').css('zIndex', 1051 + modal_lv);
        $(e.currentTarget).css('zIndex', 1052 + modal_lv);
        modal_lv++;
    });

    $('.modal').on('hidden.bs.modal', function(e) 
    {
        modal_lv--;
    });

});