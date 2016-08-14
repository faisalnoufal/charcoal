var MapsGoogle = {
    geolocation: function () {
        var map = new GMaps({
            el: '#gmaps_4',
            lat: 0,
            lng: 0
        });

        GMaps.geolocate({
            success: function (position) {                      
                
                var counter = '';
                var langitude = '';
                var longitude = '';
                var title = '';
                var i = '';
                var icon = '';
                var path_root = $("#path_root").val();
                var driver = $("#driver_array").val();
                var obj = jQuery.parseJSON(driver);
                var markers = [];
                var latlng = '';
                
                map.setCenter(position.coords.latitude, position.coords.longitude);

                for (i = 0; i < obj.length; i++) {
                    counter = obj[i];
                    latitude = counter['current_loc']['latitude'];
                    longitude = counter['current_loc']['longitude'];
                    content = '<p>' + counter['current_loc']['user_name'] + '</p><p>' + counter['current_loc']['status_text'];

                    if(counter['current_loc']['status'] == 0) {
                        icon = path_root + 'public_html/images/gmaps/green_MarkerR.png';
                    } else if(counter['current_loc']['status'] == 1) {
                        icon = path_root + 'public_html/images/gmaps/red_MarkerO.png';
                    } else if(counter['current_loc']['status'] == 2) {
                        icon = path_root + 'public_html/images/gmaps/paleblue_MarkerR.png';
                    } else if(counter['current_loc']['status'] == 3) {
                        icon = path_root + 'public_html/images/gmaps/yellow_MarkerW.png';
                    } else if(counter['current_loc']['status'] == 4) {
                        icon = path_root + 'public_html/images/gmaps/blue_MarkerP.png';
                    }

                    if(obj.length == 1) {
                        map.setCenter(latitude, longitude);
                    }

                    if(counter['running'] != 0) {
                        latitude1 = counter['running']['start_point_latitude'];
                        longitude1 = counter['running']['start_point_longitude'];
                        
                        latitude2 = counter['running']['end_point_latitude'];
                        longitude2 = counter['running']['end_point_longitude'];
                        content = content + '<p> Customer : ' + counter['running']['fullname'] + '</p>';//<p>' +  counter['current_loc']['location'] + '</p>';
                        content1 = '<p> Picked At </p><p>' + counter['running']['trip_from'];                        
                        content2 = '<p> Droping At </p><p>' + counter['running']['trip_to'];

                        // map.drawRoute({origin:[latitude1, longitude1], destination:[latitude, longitude], travelMode:'driving', strokeColor:'blue'});
                        // map.drawRoute({origin:[latitude, longitude], destination:[latitude2, longitude2], travelMode:'driving', strokeColor:'red'});
                        map.drawRoute({origin:[latitude1, longitude1], destination:[latitude2, longitude2], travelMode:'driving', strokeColor:'green'});
                        map.addMarker({lat: latitude1, lng: longitude1, infoWindow: {content: content1}, icon : path_root + 'public_html/images/gmaps/green_MarkerA.png'});
                        map.addMarker({lat: latitude2, lng: longitude2, infoWindow: {content: content2}, icon : path_root + 'public_html/images/gmaps/green_MarkerB.png'});
                        
                    }
                    latlng = map.addMarker({lat: latitude, lng: longitude, infoWindow: {content: content}, alpha: '0.7f', icon: icon});
                    markers.push(latlng);
                }                               
            },
            error: function (error) {
                alert('Geolocation failed: ' + error.message);
            },
            not_supported: function () {
                alert("Your browser does not support geolocation");
            },
            always: function () {
                //alert("Done!");
            }
        });
    },    
    init: function () {      
        this.geolocation();
        // setTimeout(MapsGoogle.init(), 10000);
        localStorage.setItem("_MapsGoogle", MapsGoogle);
    }
}

function reload_javascript_location() {        
    var driver = $('#driver').val();  
    var path_root = $("#path_root").val();
    var get_details = path_root + 'Location/get_javascript_location';    
    $.post(get_details, {driver: driver}, function (data) 
    {
        $("#driver_array").val(data);
        MapsGoogle.init();
        // var map = new GMaps({el: '#gmaps_4',lat: 0,lng: 0});
        // var obj = jQuery.parseJSON(data);
        // var MapsGoogle = localStorage.getItem('_MapsGoogle');
        // // var map = localStorage.getItem('_map');
        // var counter = '';
        // var marker = '';       

        // for (i = 0; i < markers.length; i++) {
        //     counter = obj[i];
        //     marker = markers[i];
        //     latitude = counter['current_loc']['latitude'];
        //     longitude = counter['current_loc']['longitude'];
        //     title = counter['current_loc']['user_name'] + ', ' + counter['current_loc']['status_text'];

        //     if(counter['current_loc']['status'] == 0) {
        //         icon = path_root + 'public_html/images/gmaps/green_MarkerR.png';
        //     } else if(counter['current_loc']['status'] == 1) {
        //         icon = path_root + 'public_html/images/gmaps/red_MarkerO.png';
        //     } else if(counter['current_loc']['status'] == 2) {
        //         icon = path_root + 'public_html/images/gmaps/paleblue_MarkerR.png';
        //     } else if(counter['current_loc']['status'] == 3) {
        //         icon = path_root + 'public_html/images/gmaps/yellow_MarkerW.png';
        //     } else if(counter['current_loc']['status'] == 4) {
        //         icon = path_root + 'public_html/images/gmaps/blue_MarkerP.png';
        //     }

        //     map.panTo({lat:latitude, lng:longitude});
        //     marker.setPosition({lat:latitude, lng:longitude});
        //     // latlng = map.addMarker({lat: latitude, lng: longitude, title: title, alpha: '0.7f', icon: icon});
        //     markers.push(latlng);
                
        // }
          
    });
}

function reload_javascript_location_passenger() {        
    var passenger = $('#driver').val();  
    var path_root = $("#path_root").val();
    var get_details = path_root + 'Location/get_javascript_location_passenger';    
    $.post(get_details, {passenger: passenger}, function (data) 
    {
        $("#driver_array").val(data);
        MapsGoogle.init();    
    });
}




