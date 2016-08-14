var MapsGoogle = {
//    var circle;
//    var arr = new Array();

    geolocation: function (Locations,rad,lat,lon) {

        var mapOptions = {
            center: new google.maps.LatLng(lat, lon),
            zoom: 12
        };

        var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

        var infowindow = new google.maps.InfoWindow({
            content: ''
        });

        for (i = 0; i < Locations.length; i++) {
//            size = 15;
//            var img = new google.maps.MarkerImage('marker.png',
//                    new google.maps.Size(size, size),
//                    new google.maps.Point(0, 0),
//                    new google.maps.Point(size / 2, size / 2)
//                    );

            var marker = new google.maps.Marker({
                map: map,
                title: Locations[i].title,
                position: new google.maps.LatLng(Locations[i].lat, Locations[i].lon),
                // icon: img
            });


            bindInfoWindow(marker, map, infowindow, "<p>" + Locations[i].descr + "</p>", Locations[i].title);


        }

        var circle = new google.maps.Circle({
            center: new google.maps.LatLng(lat, lon),
            clickable: false,
            fillColor: "green",
            fillOpacity: 0.25,
            map: map,
            radius: rad,
            strokeColor: "black",
            strokeOpacity: 0.3,
            strokeWeight: 2,
            // title: Locations[i].title,
            // position: new google.maps.LatLng(Locations[i].lat, Locations[i].lon),
            // icon: img
        });

        function bindInfoWindow(marker, map, infowindow, html, Ltitle) {
            google.maps.event.addListener(marker, 'mouseover', function () {
                infowindow.setContent(html);
                infowindow.open(map, marker);

            });
            google.maps.event.addListener(marker, 'mouseout', function () {
                infowindow.close();

            });
        }

    },
    //google.maps.event.addDomListener(window, 'load', initialize);
    init: function (Locations,rad,lat,lon) {
       // alert(Locations)
        var circle;
        var arr = new Array();
        this.geolocation(Locations,rad,lat,lon);
        // setTimeout(MapsGoogle.init(), 10000);
    }
}