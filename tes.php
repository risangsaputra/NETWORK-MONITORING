<!DOCTYPE html>
<html>
<head>
    <title>Simple Leaflet Map</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

    <script
        src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js">
    </script>

  

<div id="map" style="width: 1250px; height: 500px; position: relative;"></div>
        <script>
            var map = L.map('map').setView([-0.789275, 113.92132700000002], 5);
        mapLink = 
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
            }).addTo(map);
            var LeafIcon = L.Icon;

            var konek = new LeafIcon({iconUrl: "img/konek.png",iconAnchor: [13, 39],popupAnchor: [0, -33]}),
                fail = new LeafIcon({iconUrl: "img/fail.png",iconAnchor: [13, 39],popupAnchor: [0, -33]});
                
            <?php 
                        include "koneksi.php";  
                        $sql="SELECT * FROM router ";
                        $qry=mysql_query($sql);
                        while ($data=mysql_fetch_array($qry)) {
                        $id_router  =$data['id_router'];
                        $lokasi     =$data['lokasi'];
                        $lat        =$data['lat'];
                        $lng        =$data['lng'];
                        $cabang     =$data['cabang'];
                        $ip         =$data['ip'];
                        $keterangan  =$data['keterangan'];
                        ?>    
            
             // L.marker([<?php echo "$lat"; ?>, <?php echo "$lng"; ?>]).bindPopup('<?php echo "$ip"; ?>').addTo(map);

        <?php 
        exec("ping -t 1 " . $ip, $output, $result);

        if ($result == 0)

        echo  "L.marker([$lat, $lng],{icon:konek}).bindPopup('$ip').addTo(map);";
        else
        echo  "L.marker([$lat, $lng],{icon:fail}).bindPopup('$ip').addTo(map);";
        ?>

             var polyline = L.polyline([
            [<?php echo "$lat"; ?>, <?php echo "$lng"; ?>],[<?php echo "$cabang"; ?>],],
            {
                color: 'green',
                weight: 2,
                opacity: .7,
                lineJoin: 'round'
            }
            ).addTo(map);
             <?php } ?>
            
        </script>
      
                          

    </body>
</html>