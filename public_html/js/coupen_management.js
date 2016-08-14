function validateForm() {
    var path = document.forms["send_form"]["path_root"].value + 'Coupon/get_user_send';
    var user_all = document.forms["send_form"]["user_all"].value;
    var user_id = document.forms["send_form"]["user_id"].value;
    
    $.post( path, { user_all: user_all, user_id: user_id }, function( data ) {
      if(data = 'yes') {
        return confirm('Alredy informed user(s),Are you sure you want continue ?');
      
      } else {
        return true;
      }
    });      
} 