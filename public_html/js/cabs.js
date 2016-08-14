//Edit Cab

function edit_cabs(id)
{
    var confirm_msg='Do you want to Edit this Cab Type ?';
    var path_root=$("#path_root").val();
    
    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Cabs/Cab_Management/edit/'+id;
    }
}

//Deactivate Cab

function deact_cabs(id, status)
{
    if(status == 0)
        var confirm_msg='Do you want to Deactivate this Cab Type ?';
    else
        var confirm_msg='Do you want to Activate this Cab Type ?';
    
    var path_root=$("#path_root").val();

    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Cabs/Cab_management/deactivate/'+id;
    }
}

function deact_cab_model(id)
{
    var confirm_msg='Do you want to Deactivate this Cab Model ?';
    var path_root=$("#path_root").val();
    
    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Cabs/Cab_Details/deactivate/'+id;
    }
}

function act_cab_model(id)
{
    var confirm_msg='Do you want to Activate this Cab Model ?';
    var path_root=$("#path_root").val();
    
    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Cabs/Cab_Details/activate/'+id;
    }
}

function edit_cab_model(id)
{
    var confirm_msg='Do you want to Edit this Cab Model ?';
    var path_root=$("#path_root").val();
    
    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Cabs/Cab_Details/edit/'+id;
    }
}

$(document).ready(function () 
{
    $("#fare_per_km").keydown(function(event) {
        // Allow only backspace and delete,left, right,decimal(.)in number part, decimal(.) in alphabet
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 110 || event.keyCode == 190) 
        {
            // let it happen, don't do anything
        }
        else 
        {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) 
            {
                event.preventDefault(); 
            }   
        }
    });

    $("#waiting_charge").keydown(function(event) {
        // Allow only backspace and delete,left, right,decimal(.)in number part, decimal(.) in alphabet
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 110 || event.keyCode == 190) 
        {
            // let it happen, don't do anything
        }
        else 
        {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) 
            {
                event.preventDefault(); 
            }   
        }
    });

    $("#minimum_charge").keydown(function(event) {
        // Allow only backspace and delete,left, right,decimal(.)in number part, decimal(.) in alphabet
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 110 || event.keyCode == 190) 
        {
            // let it happen, don't do anything
        }
        else 
        {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) 
            {
                event.preventDefault(); 
            }   
        }
    });

    $("#minimum_later").keydown(function(event) {
        // Allow only backspace and delete,left, right,decimal(.)in number part, decimal(.) in alphabet
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 110 || event.keyCode == 190) 
        {
            // let it happen, don't do anything
        }
        else 
        {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) 
            {
                event.preventDefault(); 
            }   
        }
    });

    $("#minimum_distance").keydown(function(event) {
        // Allow only backspace and delete,left, right,decimal(.)in number part, decimal(.) in alphabet
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 110 || event.keyCode == 190) 
        {
            // let it happen, don't do anything
        }
        else 
        {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) 
            {
                event.preventDefault(); 
            }   
        }
    });

    $("#cab_id").change(function(event) {
        
        var cab_id = $('#cab_id').val();  
        var path_root = $("#path_root").val();
        var get_details = path_root + 'Cabs/get_cab_details';
        
        if (cab_id != '') 
        {            
            $.post(get_details, {cab_id: cab_id}, function (data) 
            {
                if(data != 'no')
                {
                    var result = jQuery.parseJSON(data);

                    if (result.fare_per_km > -1 && result.waiting_charge > -1 && result.minimum_charge > -1) 
                    {                           
                        $('#fare_per_km').val(result.fare_per_km);
                        $('#waiting_charge').val(result.waiting_charge);
                        $('#minimum_charge').val(result.minimum_charge);
                        $('#minimum_later').val(result.minimum_later);
                        $('#minimum_distance').val(result.minimum_distance);
                    }
                }
            });
        } 
        else 
        {
            $('#fare_per_km').val(0);
            $('#waiting_charge').val(0);
            $('#minimum_charge').val(0);
            $('#minimum_later').val(0);
            $('#minimum_distance').val(0);
        }            
    });
    
});
