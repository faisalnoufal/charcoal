
function validateFormSelect() {    
    var user_type = $('#user_type').val();
    var user = $('#user').val();    
    var status = true;

    if ($.trim(user_type).length == 0) {
        $('#error_user_type').html('User Type Not Selected!!');
        status = false;
    }

    if ($.trim(user).length == 0) {
        $('#error_user').html('User Not Selected!!');
        status = false;
    }

    return status;
}