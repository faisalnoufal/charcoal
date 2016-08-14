(function () {
    var circle;
    //var infoWindow;

    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(21.7679,78.8718),
            zoom: 6
        };


        var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
        //infoWindow = new google.maps.InfoWindow();
        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [
                    google.maps.drawing.OverlayType.CIRCLE
                    //google.maps.drawing.OverlayType.POLYGON
                ]
            },
            circleOptions: {
                fillColor: 'green',
                fillOpacity: 0.2,
                strokeWeight: 1,
                clickable: false,
                editable: true,
                zIndex: 1
            },
//            polygonOptions: {
//                fillColor: 'green',
//                fillOpacity: 0.2,
//                strokeWeight: 1,
//                clickable: false,
//                editable: true,
//                zIndex: 1
//            }
        });
        drawingManager.setMap(map);
        google.maps.event.addListener(drawingManager, 'circlecomplete', onCircleComplete);
//        google.maps.event.addListener(drawingManager,'polygoncomplete',function(polygon){
//    openInfoWindowPolygon(polygon);
//  });
    }

    function onCircleComplete(shape) {
        if (shape == null || (!(shape instanceof google.maps.Circle)))
            return;

        if (circle != null) {
            circle.setMap(null);
            circle = null;
        }

        circle = shape;

        $("#map-radius").val(circle.getRadius()+" m");
        $("#map-lat").val(circle.getCenter().lat());
        $("#map-lng").val(circle.getCenter().lng());
//        console.log('radius', circle.getRadius());
//        console.log('lat', circle.getCenter().lat());
//        console.log('lng', circle.getCenter().lng());
    }


//function openInfoWindowPolygon(polygon) {
//    var vertices = polygon.getPath();
//    var contents = 'New Surge';
//	var bounds = new google.maps.LatLngBounds();
//    vertices.forEach(function(xy,i){
//        bounds.extend(xy);
//    });
//    infoWindow.setContent(contents);
//    infoWindow.setPosition(bounds.getCenter());
//	drawingManager.setDrawingMode(null);
//	infoWindow.open(map);
//}


    google.maps.event.addDomListener(window, 'load', initialize);
})();