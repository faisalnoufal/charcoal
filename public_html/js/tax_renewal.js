
function change_tax_renewal_date(id)
{
    
    var confirm_msg='Do You Want to Change Tax Renewal Date?';
    var path_root=$("#path_root").val();
    var date=$("#tax_renew_date"+id).val();
    date=date.replace("/", "-");
    date=date.replace("/", "-");

    if(confirm(confirm_msg))
    {
        document.location.href=path_root+'Drivers/Tax_renewal/'+id+'/'+date;
    }
}


