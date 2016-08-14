function archive_user(id)
{
	var path_root=$("#path_root").val();
	var user_type=$("#user_type").val();
	
	var confirm_msg='Do you want to Archive this ' + user_type + ' ?';
            
    if(confirm(confirm_msg))
    {
        if(user_type == 'Passenger')
        	document.location.href=path_root+'Customer/Archive_user/' + id + '/0';
    	else
    		document.location.href=path_root+'Drivers/Archive_user/' + id + '/0';
    }
}

function unarchive_user(id)
{
	var path_root=$("#path_root").val();
	var user_type=$("#user_type").val();

    var confirm_msg='Do you want to Unarchive this ' + user_type + ' ?';
        
    if(confirm(confirm_msg))
    {
    	if(user_type == 'Passenger')
        	document.location.href=path_root+'Customer/Archive_user/' + id + '/1';
    	else
    		document.location.href=path_root+'Drivers/Archive_user/' + id + '/1';
    }
}