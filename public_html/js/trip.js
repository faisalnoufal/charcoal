$(document).ready(function ()
{
    $("#user_type").change(function () {
        var user_type = $('#user_type').val();
        var path_root = $("#path_temp").val();
        
        if (user_type != '')
        {     
            document.location = path_root + user_type;            
        }
    });
});
