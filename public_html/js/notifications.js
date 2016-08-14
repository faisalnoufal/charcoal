$('input').on('ifChecked', function(event){
    var val = $(this).val();

    if(val == 'all') {
        document.getElementById('user_select').style.display = "none";
    } else if(val == 'select') {
        document.getElementById('user_select').style.display = "";    
    }
});       

var FormsPickers = {
    dateRangePicker: function () {
        $('.bootstrap-daterangepicker-basic').daterangepicker({
            singleDatePicker: true
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        }
        );
    },
    init: function () {
        this.dateRangePicker();
    }
}

var FormsIcheck = {
    minimal: function () {
        $('.icheck-minimal').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal'
        });
    },

    flat: function () {
        $('.icheck-flat').iCheck({
        checkboxClass: 'icheckbox_flat',
        radioClass: 'iradio_flat'
        });
    },

    init: function () {
        this.minimal();
        this.flat();
    }
} 

function view_details(id)
{
  
   var strURL= $("#path_root").val() + 'Coupon/get_used_user_list';
   
   $.post( strURL, { id: id }, function( data ) {
      if(data) {
        document.getElementById('content').innerHTML=trim(data);      
      }
    });
}   

function view_users(id)
{
  
   var strURL= $("#path_root").val() + 'Trips/call_reject_report';
   
   $.post( strURL, { id: id }, function( data ) {
      if(data) {
        document.getElementById('content').innerHTML=trim(data);      
      }
    });
}   
    