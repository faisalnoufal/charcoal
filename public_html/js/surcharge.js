function edit_surcharge(id)
{
    var confirm_msg='Do you want to Edit this Surcharge ?';
    var path_root=$("#path_root").val();
    
    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Surcharge/Surcharge_Management/edit/'+id;
    }
}
function deact_surcharge(id)
{
   var confirm_msg='Do you want to Deactivate this Surcharge ?';
    var path_root=$("#path_root").val();
    
    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Surcharge/Surcharge_Management/deactivate/'+id;
    } 
}
function act_surcharge(id)
{
   var confirm_msg='Do you want to Activate this Surcharge ?';
    var path_root=$("#path_root").val();
    
    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Surcharge/Surcharge_Management/activate/'+id;
    } 
}
function cancel_trip(id)
{
   var confirm_msg='Do You Want To Cancel This Trip ?';
    var path_root=$("#path_root").val();
    
    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Bookedtrip/Booked_Trip/cancel/'+id;
    } 
}
function allocate_trip(id)
{
   //var confirm_msg='Do You Want To Cancel This Trip ?';
    var path_root=$("#path_root").val();
    
//    if(confirm(confirm_msg))
//    {
        document.location.href=path_root+'Bookedtrip/Booked_Trip/allocate/'+id;
    //} 
}