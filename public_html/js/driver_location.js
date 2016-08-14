
function get_drivers()
{
    var path_root=$("#path_root").val();
    var driver_details = path_root + "Location/Get_drivers";
    
    $.post(driver_details, {input_search: $('#input_search').val()}, function (data)
    {
        $("#user_list").html(data);
        $("#page_link").html("");
    });
}

function get_drivers_profile()
{
    var path_root=$("#path_root").val();
    var driver_details = path_root + "Profile/Get_drivers";
    
    $.post(driver_details, {input_search: $('#input_search').val()}, function (data)
    {
        $("#user_list").html(data);
        $("#page_link").html("");
    });
}

function get_passenger_profile()
{
    var path_root=$("#path_root").val();
    var driver_details = path_root + "Customer/Get_customers";
    
    $.post(driver_details, {input_search: $('#input_search').val()}, function (data)
    {
        $("#user_list").html(data);
        $("#page_link").html("");
    });
}