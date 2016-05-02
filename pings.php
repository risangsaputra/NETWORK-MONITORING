

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
                        
exec("ping -t 1 " . $ip, $output, $result);



if ($result == 0)

echo "L.marker([$lat, $lng, {icon: konek}).bindPopup($ip.).addTo(map);";

else 

echo "ok";

}
?>