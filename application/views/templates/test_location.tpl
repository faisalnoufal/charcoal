
{include file="header.tpl"  name=""}  

{include file="page_header.tpl"  name=""}  

<div class="container">
    <div class="col-md-6">
        <h1 class="font1" style="font-size: 36px;line-height: 50px;">

        </h1>
        <hr>



        <head>
            <meta charset="utf-8" />
            <title>Google Maps Example</title>

        </head>
        <body onload="init();">
            <section id="sidebar">
                <div id="directions_panel"></div>
            </section>

            <section id="main">
                <div id="map_canvas" style="width: 100%; height: 350px;"></div>
            </section>

        </body>
    </div>
    {include file="page_footer.tpl"  name=""}  
    {include file="layer.tpl"  name=""}  
    {include file="footer.tpl"  name=""}  
    <script src="http://maps.google.com/maps/api/js?sensor=true&amp;libraries=weather,traffic"></script>
    <script src="{$plugin_path}gmaps/gmaps.js"></script>
    <!-- END PLUGINS AREA -->
    <!-- PLUGINS INITIALIZATION AND SETTINGS -->
    <script src="{$js_path}maps-google.js"></script>
    <style type="text/css">
        body { font: normal 14px Verdana; }
        h1 { font-size: 24px; }
        h2 { font-size: 18px; }
        #sidebar { float: right; width: 30%; }
        #main { padding-right: 15px; }
        .infoWindow { width: 220px; }
    </style>
    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="markerclusterer.js" type="text/javascript"></script>


    <script type="text/javascript">
            
    //<![CDATA[
         
    var map;
    var mc;
        
         
    // Ban Jelačić Square - Center of Zagreb, Croatia
    var center = new google.maps.LatLng(45.812897, 15.97706);
        
        
        
         
    function init() {
            
            
             
        var mapOptions = {
            zoom: 1,
            center: center,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
         var getaddress='soft/login/get_adress';
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
         $.post(getaddress,function(data)
    {
  
var array = JSON.parse(data);
array.forEach(function(entry) {
getCountry(entry.address,entry.name);
 
});




     });



    }
        
        
        
        
        
        
    geocoder = new google.maps.Geocoder();

function getCountry(country,title) {
var add=title + ',' + country;    
geocoder.geocode( { 'address': country, }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
       map.setCenter(results[0].geometry.location);
       var marker = new google.maps.Marker({
           map: map,
           position: results[0].geometry.location,
           title:add
               
       });
    } 
});
}


        
        
    </script>


    <script>
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();
                MapsGoogle.init();

            });
    </script>
    {include file="page_close.tpl"  name=""} 
