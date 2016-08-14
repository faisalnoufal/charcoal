
function getAllDetails(){
      var path_root = document.search_form.path_root.value;
  
//      var search_key_word = $("#input_search").val();  
      var driver_details = path_root + "Search/getAllDriverDetails";
      $.post(driver_details, {input_search: $('#input_search').val()}, function (data)
        {
            
        document.getElementById('list_drivers').innerHTML = data;
        var user_details = path_root + "Search/getAllUserDetails";
        $.post(user_details, {input_search: $('#input_search').val()}, function (data)
        {
            document.getElementById('list_users').innerHTML = data;
        });
        
        
        });
        
      
    }
    
    function trim(a)

{
    return a.replace(/^\s+|\s+$/, '');

}