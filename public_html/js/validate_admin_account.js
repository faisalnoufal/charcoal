function validateEmail(mail)   
{  
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
  {  
    return true;
  } 
    return false;
}

function validateFormEmail() {    
    var sEmail = $('#email').val();

    if ($.trim(sEmail).length == 0) {
        $('#error_email').html('Please enter valid email address!!');
        // $('#msg_email').html('');
        return false;
    }

    if (validateEmail(sEmail)) {
        // $('#msg_email').html('Email is valid');
        // $('#error_email').html('');
        return true;
    }

    else {
        $('#error_email').html('Invalid Email Address!!');
        // $('#msg_email').html('');
        return false;
    }
}

function validateFormPassword() {    
    var old_password = $('#old_password').val();
    var new_password = $('#new_password').val();
    var confirm_password = $('#confirm_password').val();
    var status = true;

    if ($.trim(old_password).length < 5 || $.trim(old_password).length > 100) {
        $('#error_old_password').html('Current Password not valid!!');
        status = false;
    }

    if ($.trim(new_password).length < 5 || $.trim(new_password).length > 100) {
        $('#error_new_password').html('New password must be 5-100 charactor long!!');
        status = false;
    }

    if ($.trim(confirm_password).length < 5 || $.trim(confirm_password).length > 100) {
        $('#error_confirm_password').html('Confirm password not valid!!');
        status = false;
    }

    return status;
}

// $("#old_password").blur(function() {
//     alert('fdsf');
//     var old_password    = $('#old_password').val();
//     var path_root       = $("#path_root").val();
//     var password_check  = path_root + "Settings/password_check_js";

//     $.post(password_check, {old_password: old_password}, function (data)
//     {
//         if(data = 'yes')
//             $('#msg_old_password').html('Password Verified.');
//             $('#error_old_password').html('');
//         else
//             $('#error_old_password').html('Password Error!.');
//             $('#msg_old_password').html('');
//     });
    
// });

// $( "#new_password" ).blur(function() {
//   alert( "Handler for .blur() called." );
// });