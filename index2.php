<!DOCTYPE html>
<html>
<head>
    <title>Simple Leaflet Map</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

    <div id="map"></div>

    <script
        src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js">
    </script>

    <script>



    

              

var map = L.map('map').setView([-0.789275, 113.92132700000002], 5);
        mapLink = 
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
            }).addTo(map);

var userLocation = new L.LatLng(-6.1744651, 106.82274499999994);
var marker = new L.Marker(userLocation);
map.addLayer(marker);


var items = [
{    
    lat: "-6.9174639",
    lon: "107.61912280000001"
}
];

drawData();

//draw all the data on the map
function drawData() {
    var item, o;
    //draw markers for all items
    for (item in items) {
        o = items[item];
        var loc = new L.LatLng(o.lat, o.lon);
        createPolyLine(loc, userLocation);
    }
}

//draw polyline
function createPolyLine(loc1, loc2) {

    var latlongs = [loc1, loc2];
    var polyline = new L.Polyline(latlongs, {
        color: 'green',
        opacity: 1,
        weight: 2,
        clickable: false
    }).addTo(map);

    //distance
    var s = 'About ' + (loc1.distanceTo(loc2) / 1000).toFixed(0) + 'km away from you.</p>';

    var marker = L.marker(loc1).addTo(map);
    if (marker) {
        marker.bindPopup(s);
    }
} 
    </script>
</body>
</html>