
function validateIsNumber(number)
{   
    if (/^[0-9\s]+$/.test(number))
    {
        return true;
    }
    return false;   
}

$("#amount").keydown(function(event) {
    // Allow only backspace and delete,left, right,decimal(.)in number part, decimal(.) in alphabet
    if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 37 || event.keyCode == 39) {
        // let it happen, don't do anything
    }
    else {
        // Ensure that it is a number and stop the keypress
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
            event.preventDefault(); 
        }   
    }
});

function validateFormSelect() {    
    var amount = $('#amount').val();    
    var status = true;

    if ($.trim(amount).value < 0 || !validateIsNumber(amount)) {
        $('#error_amount').html('Wallet Amount invalid!!');
        status = false;
    }
    return status;
}

//Edit Wallet Amount

function edit_wallet_amount(id)
{
    var confirm_msg='Do you want to Edit this Wallet Amount ?';
    var path_root=$("#path_root").val();
    
    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Settings/Wallet_amount/edit/'+id;
    }
}

//Deactivate Wallet Amount

function deact_wallet_amount(id, status)
{
    if(status == 0)
        var confirm_msg='Do you want to Deactivate this Wallet Amount ?';
    else
        var confirm_msg='Do you want to Activate this Wallet Amount ?';

    var path_root=$("#path_root").val();

    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Settings/Wallet_amount/deactivate/'+id;
    }
}