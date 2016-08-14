var ArrivalNotification = {
    notification: function () {
        var path_root = $('#path_root').val();

        var get_details = path_root + 'Home/Active_trips';
        $.post(get_details, {}, function (data) {
            
            if(data)
                $('#active_trip_array').html(data);
            else
                $('#active_trip_array').html('<h4>NO TRIPS FOUND!</h4>');

        });

    },
    init: function () {
        this.notification();
    }
}
function call_init(){
     ArrivalNotification.init();
}