function validateEmail(mail)   
{  
 	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
  	{  
    	return true;
  	} 
	return false;
}

function validateMobile(phone)
{	
    if (/^[0-9 +-\s]+$/.test(phone))
    {
    	return true;
	}
	return false;	
}

function validateAlphaNumericSpacesText(text)
{	
    if (/^[a-zA-Z0-9 \s]+$/.test(text))
    {
    	return true;
	}
	return false;	
}

function validateAlphaNumeric(text)
{	
    if (/^[a-zA-Z0-9\s]+$/.test(text))
    {
    	return true;
	}
	return false;	
}

function validateIsNumber(number)
{	
    if (/^[0-9\s]+$/.test(number))
    {
    	return true;
	}
	return false;	
}

$("#mobile1 ,#mobile2").keydown(function(event) {
    // Allow only backspace and delete,left, right,decimal(.)in number part, decimal(.) in alphabet
    if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 32 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 107 || event.keyCode == 187 || event.keyCode == 61) {
        // let it happen, don't do anything
    }
    else {
        // Ensure that it is a number and stop the keypress
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
            event.preventDefault(); 
        }   
    }
});

$("#cab_seat").keydown(function(event) {
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

function validateFormRegister() {    
    var f_name 			= $('#f_name').val();
    var l_name 			= $('#l_name').val();
    var nationality 	= $('#nationality').val();
    var address1 		= $('#address1').val();
    var address2 		= $('#address2').val();
    var address3 		= $('#address3').val();
    var address_proof 	= $('#address_proof').val();
    var email 			= $('#email').val();
    var mobile1 		= $('#mobile1').val();
    var mobile2 		= $('#mobile2').val();
    var licence 		= $('#licence').val();
    var licence_proof 	= $('#licence_proof').val();
    var cab_num 		= $('#cab_num').val();
    var tax_renew_date 	= $('#tax_renew_date').val();
    var ins_renew_date 	= $('#ins_renew_date').val();
    var cab_name 		= $('#cab_name').val();
    var cab_model 		= $('#cab_model').val();
    var cab_seat 		= $('#cab_seat').val();
    var profile_pic 	= $('#profile_pic').val();
    var user_name 		= $('#user_name').val();
    var password 		= $('#password').val();
    var bank_name 		= $('#bank_name').val();
    var acc_number 		= $('#acc_number').val();
    var branch_code 	= $('#branch_code').val();
    var swift_code 		= $('#swift_code').val();
    var status 			= true;

    if ($.trim(f_name).length < 5 || $.trim(f_name).length > 100 || !validateAlphaNumericSpacesText(f_name)) {
        $('#error_f_name').html('First Name must be 5-200 charactor long!!');
        status = false;
    }
    if ($.trim(l_name).length > 100 || !validateAlphaNumericSpacesText(l_name)) {
        $('#error_l_name').html('Last Name must be 5-200 charactor long!!');
        status = false;
    }
    if ($.trim(nationality).length < 4 || $.trim(nationality).length >100  || !validateAlphaNumericSpacesText(nationality)) {
        $('#error_nationality').html('Nationality is invalid!!');
        status = false;
    }
    if ($.trim(address1).length < 5 || $.trim(address1).length > 200 || !validateAlphaNumericSpacesText(address1)) {
        $('#error_address1').html('Address must be 5-200 charactor long!!');
        status = false;
    }
    if ($.trim(address2).length > 200 || !validateAlphaNumericSpacesText(address2)) {
        $('#error_address2').html('Address2 must be less than 200 charactor!!');
        status = false;
    }
    if ($.trim(address3).length > 200 || !validateAlphaNumericSpacesText(address3)) {
        $('#error_address3').html('Address3 must be less than 200 charactor!!');
        status = false;
    }
    if ($.trim(email).length < 6 || $.trim(email).length > 100 || !validateEmail(sEmail)) {
        $('#error_email').html('Email not valid!!');
        status = false;
    }
    if ($.trim(mobile1).length < 10 || $.trim(mobile1).length > 20 || !validateMobile(mobile1)) {
        $('#error_mobile1').html('Mobile Number not valid!!');
        status = false;
    }
    if($.trim(mobile2) != '') {
	    if ($.trim(mobile2).length < 10 || $.trim(mobile2).length > 20 || !validateMobile(mobile2)) {
	        $('#error_mobile2').html('Mobile Number 2 not valid!!');
	        status = false;
	    }
	}
	if ($.trim(licence).length < 5 || $.trim(licence).length > 50  || !validateAlphaNumericSpacesText(licence)) {
        $('#error_licence').html('License must be 5-50 charactors!!');
        status = false;
    }
    if ($.trim(cab_num).length < 5 || $.trim(cab_num).length > 20  || !validateAlphaNumericSpacesText(cab_num)) {
        $('#error_cab_num').html('Cab Number must be 5-20 charactors!!');
        status = false;
    }
    if ($.trim(cab_model).length < 10 || $.trim(cab_model).length > 25  || !validateAlphaNumericSpacesText(cab_model)) {
        $('#error_cab_model').html('Cab Model must be 5-25 charactors!!');
        status = false;
    }
    if ($.trim(cab_seat).value < 0 || $.trim(cab_seat).value > 60  || !validateIsNumber(cab_seat)) {
        $('#error_cab_seat').html('Cab Seat must be between 1-60!!');
        status = false;
    }
    if ($.trim(user_name).length < 5 || $.trim(user_name).length > 20  || !validateAlphaNumeric(user_name)) {
        $('#error_user_name').html('Username must be between 5-20 charactors!!');
        status = false;
    }
    if ($.trim(password).length < 5 || $.trim(password).length > 50) {
        $('#error_password').html('Password must be between 5-50 charactors!!');
        status = false;
    }
    if ($.trim(bank_name).length < 5 || $.trim(bank_name).length > 100  || !validateAlphaNumericSpacesText(bank_name)) {
        $('#error_bank_name').html('Bank Name must be between 5-100 charactors!!');
        status = false;
    }
    if ($.trim(acc_number).length < 10 || $.trim(acc_number).length > 100  || !validateAlphaNumericSpacesText(acc_number)) {
        $('#error_acc_number').html('Account Number must be between 10-100 charactors!!');
        status = false;
    }
    if ($.trim(branch_code).length < 5 || $.trim(branch_code).length > 100  || !validateAlphaNumericSpacesText(branch_code)) {
        $('#error_branch_code').html('Branch Code must be between 5-100 charactors!!');
        status = false;
    }
    if ($.trim(swift_code).length < 5 || $.trim(swift_code).length > 100  || !validateAlphaNumericSpacesText(swift_code)) {
        $('#error_swift_code').html('Swift Code must be between 5-100 charactors!!');
        status = false;
    }
    if ($.trim(ins_renew_date).length < 8 || $.trim(ins_renew_date).length > 10) {
        $('#error_ins_renew_date').html('Insurance Renewal Date is invalid!!');
        status = false;
    }
    if ($.trim(tax_renew_date).length < 8 || $.trim(tax_renew_date).length > 10) {
        $('#error_tax_renew_date').html('Tax Renewal Date is invalid!!');
        status = false;
    }

    return status;
}